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

    //modello con i collegamenti delle tabelle type e technologies dove viene visualizzato con lo slug e prende il primo risultato
    public function show( $slug ){
        $project = Project::with('type', 'technologies')->where( 'slug', $slug )->first();

        //se trova il risultato allora lo manda a visualizzare
        if( $project ){
            return response()->json([
                'success' => true,
                'projects' => $project
            ]);
        } else{
            //altrimenti da il messaggio di errore
            return response()->json([
                'success' => false,
                'error' => "il progetto non esiste"
            ]);
        }
    }
}
