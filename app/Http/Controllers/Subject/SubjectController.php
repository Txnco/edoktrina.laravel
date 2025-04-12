<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function showSubjects() {
        $subjects = Subject::select(['id', 'public_id', 'name', 'description', 'color', 'image'])->latest()->paginate(10);

        return view('admin.subjects', compact('subjects'));
    }

    



}
