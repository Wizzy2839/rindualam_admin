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
        // Ambil data menu urut berdasarkan kategori (sort_order) baru nama item
        $items = MenuItem::select('menu_items.*')
            ->join('menu_categories', 'menu_items.menu_category_id', '=', 'menu_categories.id')
            ->orderBy('menu_categories.sort_order', 'asc')
            ->orderBy('menu_items.name', 'asc')
            ->with('menuCategory')
            ->get();

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
        ], [
            'menu_category_id.required' => 'Pilih kategorinya woy!'
        ]);

        MenuItem::create($data);
        return redirect()->route('menu-items.index')->with('success', 'Data item menu berhasil ditambahkan ke dalam katalog.');
    }

    public function destroy(MenuItem $menuItem)
    {

        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Data item menu berhasil penghapusan dari sistem.');
    }
    
    public function edit(MenuItem $menuItem)
    {
        $categories = MenuCategory::orderBy('sort_order')->get();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $menuItem->update($data);
        return redirect()->route('menu-items.index')->with('success', 'Perubahan data item menu berhasil disimpan.');
    }
}