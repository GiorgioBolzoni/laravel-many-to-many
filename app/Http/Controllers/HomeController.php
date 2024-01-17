<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();
        $technologies = Technology::all();

        return view('home', compact('projects', 'types', 'technologies'));
    }
}
