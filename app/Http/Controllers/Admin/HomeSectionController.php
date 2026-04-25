<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    public function create()
    {
        $pageTitle = 'Tambah Seksi Beranda';
        $actionRoute = route('admin.pages.home-sections.store');
        $section = new HomeSection();
        return view('admin.pages.home-sections.form', compact('pageTitle', 'actionRoute', 'section'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label'          => 'nullable|string|max:255',
            'title'          => 'required|string',
            'content'        => 'nullable|string',
            'image_position' => 'required|in:left,right',
            'sort_order'     => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('page-images', 'public');
        }

        HomeSection::create($data);
        return redirect()->route('pages.home')->with('success', 'Seksi konten beranda berhasil ditambahkan.');
    }

    public function edit(HomeSection $homeSection)
    {
        $pageTitle = 'Edit Seksi Beranda';
        $actionRoute = route('admin.pages.home-sections.update', $homeSection->id);
        $section = $homeSection;
        $isEdit = true;
        return view('admin.pages.home-sections.form', compact('pageTitle', 'actionRoute', 'section', 'isEdit'));
    }

    public function update(Request $request, HomeSection $homeSection)
    {
        $data = $request->validate([
            'label'          => 'nullable|string|max:255',
            'title'          => 'required|string',
            'content'        => 'nullable|string',
            'image_position' => 'required|in:left,right',
            'sort_order'     => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($homeSection->image) Storage::disk('public')->delete($homeSection->image);
            $data['image'] = $request->file('image')->store('page-images', 'public');
        }

        $homeSection->update($data);
        return redirect()->route('pages.home')->with('success', 'Seksi konten beranda berhasil diperbarui.');
    }

    public function destroy(HomeSection $homeSection)
    {
        if ($homeSection->image) Storage::disk('public')->delete($homeSection->image);
        $homeSection->delete();
        return redirect()->route('pages.home')->with('success', 'Seksi konten beranda berhasil dihapus.');
    }
}
