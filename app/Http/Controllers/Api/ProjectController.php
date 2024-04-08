<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        // $Projects = Project::all();

        //edger loading
        // $Projects = Project::with( 'content', 'types')->get();

        //edger loading + pagination
         $Projects = Project::with( 'type', 'technologies' )->paginate(4);

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'California'
        //     ]);

        return response()->json([
            'success' => true,
            'projects' => $Projects
        ]);
    }

    public function show( $slug ){
        $project = Project::with('type', 'technologies')->where( 'slug', $slug )->first();

        if( $project ){
            return response()->json([
                'success' => true,
                'projects' => $project
            ]);
        } else{
            return response()->json([
                'success' => false,
                'error' => "il progetto non esiste"
            ]);
        }
    }
}
