<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::with('technology', 'type')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $projects = Project::with('type', 'technology')->where('slug', $slug)->first();
        // $projects = Project::all();

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
