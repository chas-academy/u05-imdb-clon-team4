<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentSearchController extends Controller
{
    public function results(Request $request)
    {
        // Take input data ($request->input) and search database table movies
        $search = $request->input;
        $results = DB::table('movies')
            ->where('title', 'LIKE', "%$search%")
            ->get();

        return $results;

        // // If we wantet to search content (e.g. description) as well we could continue with
        // ->orwhere('description', 'LIKE', "%$search%")
    }
}
