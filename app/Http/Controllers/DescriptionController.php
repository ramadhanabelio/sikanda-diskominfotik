<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\SubSubtitle;
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
        $sub_subtitles = SubSubtitle::all();
        return view('descriptions.create', compact('sub_subtitles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sub_subtitle_id' => 'required|exists:sub_subtitles,id',
            'uraian' => 'required|string|max:255',
        ]);

        Description::create($validated);

        return redirect()->route('descriptions.index')->with('success', 'Uraian berhasil ditambahkan.');
    }

    public function edit(Description $description)
    {
        $sub_subtitles = SubSubtitle::all();
        return view('descriptions.edit', compact('description', 'sub_subtitles'));
    }

    public function update(Request $request, Description $description)
    {
        $validated = $request->validate([
            'sub_subtitle_id' => 'required|exists:sub_subtitles,id',
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
