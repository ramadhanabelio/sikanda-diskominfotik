<?php

namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescriptionController extends Controller
{
    public function index()
    {
        $descriptions = Description::all();
        return view('descriptions.index', compact('descriptions'));
    }

    public function create()
    {
        return view('descriptions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uraian' => 'required|string|max:255',
        ]);

        Description::create($validated);

        return redirect()->route('descriptions.index')->with('success', 'Uraian berhasil ditambahkan.');
    }

    public function edit(Description $description)
    {
        return view('descriptions.edit', compact('description'));
    }

    public function update(Request $request, Description $description)
    {
        $validated = $request->validate([
            'uraian' => 'required|string|max:255',
        ]);

        $description->update($validated);

        return redirect()->route('descriptions.index')->with('success', 'Uraian berhasil diperbarui.');
    }

    public function destroy(Description $description)
    {
        $description->delete();

        return redirect()->route('descriptions.index')->with('success', 'Uraian berhasil dihapus.');
    }
}
