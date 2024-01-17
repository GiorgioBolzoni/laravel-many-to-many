<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $categories = Type::all();

        return view('home', compact('projects', 'types'));
    }
}
