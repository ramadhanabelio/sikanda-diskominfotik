<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Subtitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubtitleController extends Controller
{
    public function index()
    {
        $subtitles = Subtitle::all();
        return view('subtitles.index', compact('subtitles'));
    }

    public function create()
    {
        $titles = Title::all();
        return view('subtitles.create', compact('titles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_id' => 'required|exists:titles,id',
            'sub_judul' => 'required|string|max:255',
        ]);

        Subtitle::create($validated);

        return redirect()->route('subtitles.index')->with('success', 'Sub Kegiatan berhasil ditambahkan.');
    }

    public function edit(Subtitle $subtitle)
    {
        $titles = Title::all();
        return view('subtitles.edit', compact('subtitle', 'titles'));
    }

    public function update(Request $request, Subtitle $subtitle)
    {
        $validated = $request->validate([
            'title_id' => 'required|exists:titles,id',
            'sub_judul' => 'required|string|max:255',
        ]);

        $subtitle->update($validated);

        return redirect()->route('subtitles.index')->with('success', 'Sub Kegiatan berhasil diperbarui.');
    }

    public function destroy(Subtitle $subtitle)
    {
        $subtitle->delete();

        return redirect()->route('subtitles.index')->with('success', 'Sub Kegiatan berhasil dihapus.');
    }
}
