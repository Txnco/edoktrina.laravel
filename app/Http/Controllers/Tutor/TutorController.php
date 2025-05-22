<?php
namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subject;
use App\Models\TutorApplication;
use App\Models\TutorApplicationEducation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class TutorController extends Controller
{
    public function showBecomeTutor() {  
        $user = Auth::user();
        $existingApplication = $user->tutorApplication()
            ->whereIn('status', ['pending', 'under_review'])
            ->first();
            
        if ($existingApplication) {
            return redirect()->route('tutor.application.status')
                ->with('info', 'Već imate poslanu prijavu koja je na čekanju.');
        }
        
        return view('tutor.become-tutor');
    }

    public function showFindTutor() {  
        return view('tutor.find-tutor');
    }

    public function store(Request $request){
        $user = Auth::user();        
        // Validate the request
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string|max:50',
            'biography' => 'required|string|min:5|max:1000',
            'education' => 'required|array|min:1',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|in:srednja,vss,vss_mag,doktorat',
            'education.*.field' => 'required|string|max:255',
            'education.*.start_date' => 'required|date',
            'education.*.end_date' => 'nullable|date|after:education.*.start_date',
            'education.*.current' => 'nullable',
            'experience_years' => 'required|numeric|min:0|max:50',
            'experience_description' => 'required|string|min:5|max:1000',
            'online_experience' => 'nullable',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'diploma' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'id_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create user folder for documents
        $username = $user->username;
        $userFolder = "applications/{$username}";
       
        
        // Ensure directory exists
        $fullPath = public_path($userFolder);
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }



        try {
            // Handle file uploads
            $cvPath = $this->handleFileUpload($request->file('cv'), $userFolder, 'cv');
            $diplomaPath = $this->handleFileUpload($request->file('diploma'), $userFolder, 'diploma');
            $idCardPath = $this->handleFileUpload($request->file('id_card'), $userFolder, 'id_card');
            

            // Create tutor application
            $application = TutorApplication::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'biography' => $request->biography,
                'experience_years' => $request->experience_years,
                'experience_description' => $request->experience_description,
                'online_experience' => $request->has('online_experience'),
                'cv' => $cvPath,
                'diploma' => $diplomaPath,
                'id_card' => $idCardPath,
                'status' => 'pending',
            ]);


            // Save education entries
            foreach ($request->education as $education) {
                TutorApplicationEducation::create([
                    'tutor_application_id' => $application->id,
                    'institution' => $education['institution'],
                    'degree' => $education['degree'],
                    'field' => $education['field'],
                    'start_date' => $education['start_date'],
                    'end_date' => $education['end_date'] ?? null,
                    'current' => isset($education['current']),
                ]);
            }

            // Send success response
            return redirect()->route('tutor.application.status')
                ->with('success', 'Vaša prijava je uspješno poslana! Kontaktirati ćemo vas uskoro.');

        } catch (\Exception $e) {
            // Clean up files if something went wrong
            if (isset($cvPath)) File::delete(public_path($cvPath));
            if (isset($diplomaPath)) File::delete(public_path($diplomaPath));
            if (isset($idCardPath)) File::delete(public_path($idCardPath));

            // Log the error
            \Log::error('Error saving tutor application: ' . $e->getMessage());

            return back()->with('error', 'Došlo je do greške prilikom slanja prijave. Pokušajte ponovno.')
                ->withInput();
        }
    }

    private function handleFileUpload($file, $folder, $prefix)
    {
        if (!$file) {
            return null;
        }

        // Generate unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = $prefix . '_' . time() . '_' . uniqid() . '.' . $extension;
        
        // Store file in public folder
        $path = $folder . '/' . $filename;
        $file->move(public_path($folder), $filename);
        
        return $path;
    }

    public function applicationStatus()
    {
        $user = Auth::user();
        $application = $user->tutorApplication()
            ->with(['education'])
            ->latest()
            ->first();

        return view('tutor.application-status', compact('application', 'user'));
    }

    public function downloadDocument(TutorApplication $application, $documentType)
    {
        // Authorize - only admin can download or the application owner
        if (!auth()->user()->hasRole('admin') && auth()->id() !== $application->user_id) {
            abort(403);
        }

        $path = null;
        $filename = null;
        
        switch($documentType) {
            case 'cv':
                $path = public_path($application->cv);
                $filename = "CV_{$application->user->username}.pdf";
                break;
            case 'diploma':
                $path = public_path($application->diploma);
                $extension = pathinfo($application->diploma, PATHINFO_EXTENSION);
                $filename = "Diploma_{$application->user->username}.{$extension}";
                break;
            case 'id_card':
                $path = public_path($application->id_card);
                $extension = pathinfo($application->id_card, PATHINFO_EXTENSION);
                $filename = "ID_Card_{$application->user->username}.{$extension}";
                break;
            default:
                abort(404);
        }

        if (!file_exists($path)) {
            abort(404, 'Document not found');
        }

        return response()->download($path, $filename);
    }
    
    // public function showApplications(){

    //     $applications = TutorApplication::with([
    //         'user:id,first_name,last_name,username', 
    //         'education'               
    //     ])
    //     ->get();

    //     return view('admin.tutor-applications', compact('applications'));
    // }

    public function showApplications(Request $request)
    {
        $status = $request->query('status');

        $query = TutorApplication::with([
            'user:id,first_name,last_name,username',
            'education',
        ]);

        if (in_array($status, ['pending','approved','rejected'], true)) {
            $query->where('status', $status);
        }

        $applications = $query->get();

        return view('admin.tutor-applications', compact('applications', 'status'));
    }

    public function approveApplication($id)
    {
        $application = TutorApplication::findOrFail($id);
        $application->status = 'approved';
        $application->save();
        $application->user->assignRole('tutor');    

        return redirect()->route('admin.tutors.applications')
            ->with('success', 'Prijava je uspješno odobrena!');
    }

    public function rejectApplication($id)
    {
        $application = TutorApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->route('admin.tutors.applications')
            ->with('success', 'Prijava je uspješno odbijena!');
    }
}