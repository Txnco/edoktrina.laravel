<?php

namespace App\Http\Controllers\Script;

use App\Http\Controllers\Controller;
use App\Models\Subject;

use Illuminate\Http\Request;

class ScriptController extends Controller
{


    public function index()
    {
        $subjects = Subject::all(); // Get all subjects from the database
        $scripts = collect([
            (object)[
                'id' => 1,
                'title' => 'Matematička analiza - Kompletan tečaj derivacije',
                'description' => 'Kompletna skripta koja pokriva sve koncepte derivacije s primjerima i zadacima. Uključuje teorijske osnove, primjere iz prakse i rješenja.',
                'educational_level' => 'university',
                'type' => 'lecture',
                'subject' => (object)[
                    'id' => 1,
                    'name' => 'Matematika'
                ],
                'author' => (object)[
                    'first_name' => 'Marko',
                    'last_name' => 'Horvat'
                ],
                'created_at' => now()->subDays(5),
                'downloads_count' => 247,
                'avg_rating' => 4.8,
                'reviews_count' => 15
            ],
            (object)[
                'id' => 2,
                'title' => 'Programiranje u C++ - Osnove i napredni koncepti',
                'description' => 'Iscrpna skripta koja obrađuje C++ programiranje od osnovnih tipova podataka do naprednih koncepata poput pokazivača i objektno orijentiranog programiranja.',
                'educational_level' => 'university',
                'type' => 'lecture',
                'subject' => (object)[
                    'id' => 3,
                    'name' => 'Programiranje'
                ],
                'author' => (object)[
                    'first_name' => 'Ana',
                    'last_name' => 'Babić'
                ],
                'created_at' => now()->subDays(12),
                'downloads_count' => 342,
                'avg_rating' => 4.6,
                'reviews_count' => 28
            ],
            (object)[
                'id' => 3,
                'title' => 'Vježbe iz organike - Priprema za kolokvij',
                'description' => 'Zbirka riješenih zadataka iz organske kemije posebno prilagođena za pripremu kolokvija. Sadrži detaljne postupke rješavanja.',
                'educational_level' => 'university',
                'type' => 'exercise',
                'subject' => (object)[
                    'id' => 5,
                    'name' => 'Kemija'
                ],
                'author' => (object)[
                    'first_name' => 'Petra',
                    'last_name' => 'Novak'
                ],
                'created_at' => now()->subDays(3),
                'downloads_count' => 156,
                'avg_rating' => 4.3,
                'reviews_count' => 8
            ],
            (object)[
                'id' => 4,
                'title' => 'Povijest 20. stoljeća - Sažetak materijala',
                'description' => 'Koncizni sažetak povijesti 20. stoljeća s naglaskom na ključne događaje, osobe i procese. Idealno za brzu pripremu ispita.',
                'educational_level' => 'high-school',
                'type' => 'summary',
                'subject' => (object)[
                    'id' => 7,
                    'name' => 'Povijest'
                ],
                'author' => (object)[
                    'first_name' => 'Ivan',
                    'last_name' => 'Jurić'
                ],
                'created_at' => now()->subDays(7),
                'downloads_count' => 189,
                'avg_rating' => 4.2,
                'reviews_count' => 12
            ],
            (object)[
                'id' => 5,
                'title' => 'Mehanika točke i krutog tijela - Ispitni zadaci',
                'description' => 'Zbirka ispitnih zadataka iz mehanike točke s riješenjenjem korak po korak. Pokriva sve modelske primjere koji se pojavljuju na ispitima.',
                'educational_level' => 'university',
                'type' => 'exam',
                'subject' => (object)[
                    'id' => 2,
                    'name' => 'Fizika'
                ],
                'author' => (object)[
                    'first_name' => 'Luka',
                    'last_name' => 'Petrović'
                ],
                'created_at' => now()->subDays(1),
                'downloads_count' => 78,
                'avg_rating' => 4.7,
                'reviews_count' => 5
            ],
            (object)[
                'id' => 6,
                'title' => 'Engleska gramatika - Potpuni pregled',
                'description' => 'Sveobuhvatni pregled engleske gramatike s jasnim objašnjenjima i primjerima. Uključuje vježbe za samostalno učenje.',
                'educational_level' => 'high-school',
                'type' => 'lecture',
                'subject' => (object)[
                    'id' => 4,
                    'name' => 'Engleski jezik'
                ],
                'author' => (object)[
                    'first_name' => 'Maja',
                    'last_name' => 'Kovač'
                ],
                'created_at' => now()->subDays(9),
                'downloads_count' => 209,
                'avg_rating' => 4.5,
                'reviews_count' => 17
            ],
            (object)[
                'id' => 7,
                'title' => 'Baze podataka - SQL i relacijski model',
                'description' => 'Skripta koja pokriva osnovne i napredne SQL naredbe, normalizaciju, indekse i optimizaciju upita. Sadržava praktične primjere.',
                'educational_level' => 'university',
                'type' => 'lecture',
                'subject' => (object)[
                    'id' => 6,
                    'name' => 'Informatika'
                ],
                'author' => (object)[
                    'first_name' => 'Tomislav',
                    'last_name' => 'Car'
                ],
                'created_at' => now()->subDays(14),
                'downloads_count' => 398,
                'avg_rating' => 4.9,
                'reviews_count' => 22
            ],
            (object)[
                'id' => 8,
                'title' => 'Osnove biokemije - Sažetak pojmova',
                'description' => 'Pregled osnovnih pojmova biokemije uključujući proteine, nukleinske kiseline, enzime i metaboličke putove.',
                'educational_level' => 'university',
                'type' => 'summary',
                'subject' => (object)[
                    'id' => 8,
                    'name' => 'Biologija'
                ],
                'author' => (object)[
                    'first_name' => 'Josipa',
                    'last_name' => 'Tomić'
                ],
                'created_at' => now()->subDays(6),
                'downloads_count' => 167,
                'avg_rating' => 4.1,
                'reviews_count' => 9
            ],
            (object)[
                'id' => 9,
                'title' => 'Hrvatska književnost - Romantizam i realizam',
                'description' => 'Analiza ključnih djela hrvatskog romantizma i realizma s biološkim crtama autora i kontekstualnim informacijama.',
                'educational_level' => 'high-school',
                'type' => 'summary',
                'subject' => (object)[
                    'id' => 9,
                    'name' => 'Hrvatski jezik'
                ],
                'author' => (object)[
                    'first_name' => 'Kristina',
                    'last_name' => 'Brkić'
                ],
                'created_at' => now()->subDays(4),
                'downloads_count' => 145,
                'avg_rating' => 4.0,
                'reviews_count' => 10
            ],
            (object)[
                'id' => 10,
                'title' => 'Elektricitet i magnetizam - Rješeni kolokviji',
                'description' => 'Kompletna rješenja kolokvijskih zadataka iz elektricstva i magnetizma sa FER-a uključujući detaljne postupke i dodatna objašnjenja.',
                'educational_level' => 'university',
                'type' => 'exam',
                'subject' => (object)[
                    'id' => 2,
                    'name' => 'Fizika'
                ],
                'author' => (object)[
                    'first_name' => 'Filip',
                    'last_name' => 'Matić'
                ],
                'created_at' => now()->subDays(8),
                'downloads_count' => 276,
                'avg_rating' => 4.6,
                'reviews_count' => 18
            ]
        ]);

        return view('learning.scripts', compact('scripts', 'subjects'));
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
