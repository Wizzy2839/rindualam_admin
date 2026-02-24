<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index()
    {
        // Ambil data menu sekalian sama nama kategorinya (biar gak lemot)
        $items = MenuItem::with('menuCategory')->latest()->get();
        return view('admin.menu-items.index', compact('items'));
    }

    public function create()
    {
        // Lempar data kategori ke form biar bisa dipilih di Dropdown (Select)
        $categories = MenuCategory::orderBy('sort_order')->get();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi gila-gilaan biar data lu gak berantakan
        $data = $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB ya bos!
            'is_available' => 'boolean',
        ], [
            'menu_category_id.required' => 'Pilih kategorinya woy!',
            'image.image' => 'File harus berupa gambar (JPG/PNG)!',
            'image.max' => 'Ukuran gambar maksimal 2MB aja, server lu jebol ntar!'
        ]);

        // Kalo centang "Tersedia" gak dicentang, anggap false (Habis)
        $data['is_available'] = $request->has('is_available');

        // Urusan nyimpen foto
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menu-images', 'public');
        }

        MenuItem::create($data);
        return redirect()->route('menu-items.index')->with('success', 'Menu kopi lu berhasil diracik!');
    }

    public function destroy(MenuItem $menuItem)
    {
        // Kalo dihapus, fotonya di folder storage juga harus dibuang dong, biar gak menuhin harddisk
        if ($menuItem->image) {
            Storage::disk('public')->delete($menuItem->image);
        }
        
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu sukses dihapus dari peradaban!');
    }
    
    // Fungsi Edit & Update gw kosongin dulu ya, lu kerjain index sama create-nya dulu aja biar gak mabok.
    public function edit(MenuItem $menuItem) {}
    public function update(Request $request, MenuItem $menuItem) {}
}