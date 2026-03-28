<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        if (!$query) {
            return view('search', ['results' => collect(), 'query' => '']);
        }

        // Search in Users (membership_id) and Applications (legal_name)
        $results = User::where('membership_id', 'LIKE', "%{$query}%")
            ->orWhereHas('application', function($q) use ($query) {
                $q->where('legal_name', 'LIKE', "%{$query}%");
            })
            ->with('application')
            ->paginate(12)
            ->appends(['q' => $query]);

        return view('search', compact('results', 'query'));
    }
}
