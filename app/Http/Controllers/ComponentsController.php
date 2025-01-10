<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function showComponents() {
        return view('design.components');
    }
}