<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentSearchController extends Controller
{
    public function search(Request $request)
    {
        // Take input data ($request->input) and search database table movies
        $search = $request->input;
        $results = '';

        // MySql handles case sensitive from lower case string with LIKE
        if (env('DB_CONNECTION') !== 'pgsql') {
            $results = DB::table('movies')
                ->where('title', 'LIKE', "%$search%")
                ->get();
        } else {
            // PgSql needs ILIKE to match case insensitive
            $results = DB::table('movies')
                ->where('title', 'ILIKE', "%$search%")
                ->get();
        }

        return $results;

        // // If we wantet to search content (e.g. description) as well we could continue with
        // ->orwhere('description', 'LIKE', "%$search%")
    }
}
