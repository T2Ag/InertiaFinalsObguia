<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function show()
    {
       
        $user = auth()->user();
        $userName = $user ? $user->name : null;
    
        return Inertia::render('Dashboard', [
            'userName' => $userName,
        ]);
    }
}
