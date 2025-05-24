<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TitleController extends Controller
{
    public function index()
    {
        $titles = Title::all();
        return view('titles.index', compact('titles'));
    }

    public function create()
    {
        return view('titles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        Title::create($validated);

        return redirect()->route('titles.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Title $title)
    {
        return view('titles.edit', compact('title'));
    }

    public function update(Request $request, Title $title)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $title->update($validated);

        return redirect()->route('titles.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Title $title)
    {
        $title->delete();

        return redirect()->route('titles.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
