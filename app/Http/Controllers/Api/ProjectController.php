<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $Projects = Project::all();

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'California'
        //     ]);
        return response()->json([
            'success' => true,
            'projects' => $Projects
        ]);
    }
}
