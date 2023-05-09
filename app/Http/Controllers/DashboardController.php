<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insta;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'instapp' => Insta::latest(),
        ]);
    }
}
