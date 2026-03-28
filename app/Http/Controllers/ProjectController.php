<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreProjectRequest;
//use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));

    }
}
