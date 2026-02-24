<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048', 
            'caption' => 'nullable|string|max:255',
        ], [
            'images.required' => 'Harap pilih setidaknya satu foto untuk diunggah.',
            'images.*.image' => 'Terdapat berkas yang bukan merupakan format gambar valid.',
            'images.*.max' => 'Ukuran salah satu foto melebihi batas maksimal 2MB. Harap lakukan kompresi.'
        ]);

        foreach ($request->file('images') as $file) {
            $imagePath = $file->store('gallery-images', 'public');

            Gallery::create([
                'image' => $imagePath,
                'caption' => $request->caption,
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Seluruh foto berhasil diunggah dan ditambahkan ke galeri.');
    }

    public function destroy(Gallery $gallery)
    {
        // Hapus file fisik dari storage
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Foto berhasil dihapus!');
    }
}