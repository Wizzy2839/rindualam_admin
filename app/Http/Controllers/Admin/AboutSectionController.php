<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function create()
    {
        $pageTitle = 'Tambah Seksi Cerita Kami';
        $actionRoute = route('admin.pages.about-sections.store');
        $section = new AboutSection();
        return view('admin.pages.about-sections.form', compact('pageTitle', 'actionRoute', 'section'));
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

        AboutSection::create($data);
        return redirect()->route('pages.about')->with('success', 'Seksi konten cerita berhasil ditambahkan.');
    }

    public function edit(AboutSection $aboutSection)
    {
        $pageTitle = 'Edit Seksi Cerita Kami';
        $actionRoute = route('admin.pages.about-sections.update', $aboutSection->id);
        $section = $aboutSection;
        $isEdit = true;
        return view('admin.pages.about-sections.form', compact('pageTitle', 'actionRoute', 'section', 'isEdit'));
    }

    public function update(Request $request, AboutSection $aboutSection)
    {
        $data = $request->validate([
            'label'          => 'nullable|string|max:255',
            'title'          => 'required|string',
            'content'        => 'nullable|string',
            'image_position' => 'required|in:left,right',
            'sort_order'     => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($aboutSection->image) Storage::disk('public')->delete($aboutSection->image);
            $data['image'] = $request->file('image')->store('page-images', 'public');
        }

        $aboutSection->update($data);
        return redirect()->route('pages.about')->with('success', 'Seksi konten cerita berhasil diperbarui.');
    }

    public function destroy(AboutSection $aboutSection)
    {
        if ($aboutSection->image) Storage::disk('public')->delete($aboutSection->image);
        $aboutSection->delete();
        return redirect()->route('pages.about')->with('success', 'Seksi konten cerita berhasil dihapus.');
    }
}
