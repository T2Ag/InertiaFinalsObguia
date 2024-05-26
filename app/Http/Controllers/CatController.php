<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id ?? null;
    
        $cats = Cat::where('user_id', $user_id)
                    ->orderBy('id')
                    ->get();
    
        return Inertia::render('Cats', ['cats' => $cats]);
    }
    
    public function create()
    {
        return Inertia::render('Create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'image' => 'required|string|max:1000',
        ]);

        $user = auth()->user();

        if ($user) {
            Cat::create([
                'name' => $request->name,
                'breed' => $request->breed,
                'image' => $request->image,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('cat')->with('success', 'Cat added successfully.');
    }

    public function edit($id)
    {
        $cats = Cat::findOrFail($id);
        return Inertia::render('Edit', ['cats' => $cats]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'image' => 'required|string|max:1000',
        ]);

        $cat = Cat::findOrFail($id);
        $user = auth()->user();

        if ($cat->user_id === $user->id) {
            $cat->update([
                'name' => $request->name,
                'breed' => $request->breed,
                'image' => $request->image,
            ]);
        }

        return redirect()->route('cat')->with('success', 'Cat updated successfully.');
    }

    public function destroy($id)
    {
        $cat = Cat::findOrFail($id);
        $cat->delete();

        return redirect()->route('cat')->with('success', 'Cat deleted successfully.');
    }
}
