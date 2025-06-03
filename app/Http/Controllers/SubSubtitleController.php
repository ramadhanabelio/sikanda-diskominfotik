<?php

namespace App\Http\Controllers;

use App\Models\Subtitle;
use App\Models\SubSubtitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubSubtitleController extends Controller
{
    public function index()
    {
        $sub_subtitles = SubSubtitle::all();
        return view('sub-subtitles.index', compact('sub_subtitles'));
    }

    public function create()
    {
        $subtitles = Subtitle::all();
        return view('sub-subtitles.create', compact('subtitles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtitle_id' => 'required|exists:subtitles,id',
            'sub_sub_judul' => 'required|string|max:255',
        ]);

        SubSubtitle::create($validated);

        return redirect()->route('sub-subtitles.index')->with('success', 'Sub Sub Kegiatan berhasil ditambahkan.');
    }

    public function edit(SubSubtitle $sub_subtitle)
    {
        $subtitles = Subtitle::all();
        return view('sub-subtitles.edit', compact('sub_subtitle', 'subtitles'));
    }

    public function update(Request $request, SubSubtitle $sub_subtitle)
    {
        $validated = $request->validate([
            'subtitle_id' => 'required|exists:subtitles,id',
            'sub_sub_judul' => 'required|string|max:255',
        ]);

        $sub_subtitle->update($validated);

        return redirect()->route('sub-subtitles.index')->with('success', 'Sub Sub Kegiatan berhasil diperbarui.');
    }

    public function destroy(SubSubtitle $sub_subtitle)
    {
        $sub_subtitle->delete();

        return redirect()->route('sub-subtitles.index')->with('success', 'Sub Sub Kegiatan berhasil dihapus.');
    }
}
