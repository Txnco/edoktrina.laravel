<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{


    public function index()
    {
        return response()->json(Subject::all());
    }


    public function showSubjects() {
        $subjects = Subject::select(['id', 'public_id', 'name', 'description', 'color', 'image'])->latest()->get();

        return view('admin.subjects', compact('subjects'));
    }

    public function create() { //Create a new subject
        return view('admin.subjects.create');
    }

    public function store(){ //Store that subject in database
        $data = request()->validate([
            'public_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $destinationPath = public_path('assets/images/subjects'); 
            $imageName = uniqid() . '_' . $image->getClientOriginalName(); 
            $image->move($destinationPath, $imageName); 
            $data['image'] = 'assets/images/subjects/' . $imageName; 
        }
    

        $subject = Subject::create($data);
        if ($subject) {
            return redirect()->back()->with('success', 'Predmet je uspješno dodan!');
        } else {
            return redirect()->back()->with('error', 'Greška prilikom dodavanja predmeta!');
        }
    }

    public function edit($id){ //Show the edit form
        
    }

    public function update($id){ //Update the subject with id
        $data = request()->validate([
            'public_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $destinationPath = public_path('assets/images/subjects'); 
            $imageName = uniqid() . '_' . $image->getClientOriginalName(); 
            $image->move($destinationPath, $imageName); 
            $data['image'] = 'assets/images/subjects/' . $imageName; 
        }
        
        $subject = Subject::find($id);
        if ($subject) {
            $subject->update($data);
            return redirect()->back()->with('success', 'Predmet je uspješno spremljen!');
        } else {
            return redirect()->back()->with('error', 'Greška prilikom spremanja predmeta!');
        }
    }

    //create a function to soft delete subject 
    public function delete($id) {
        $subject = Subject::find($id);
        if ($subject) {
            $subject->delete();
            return redirect()->back()->with('success', 'Predmet je uspješno izbrisan!');
        } else {
            return redirect()->back()->with('error', 'Greška prilikom brisanja predmeta!');
        }
    }
    



}
