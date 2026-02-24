<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::orderBy('sort_order')->get();
        return view('admin.menu-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.menu-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'required|integer',
        ]);

        MenuCategory::create($request->all());
        return redirect()->route('menu-categories.index')->with('success', 'Kategori sukses ditambah!');
    }

    public function edit(MenuCategory $menuCategory)
    {
        return view('admin.menu-categories.edit', compact('menuCategory'));
    }

    public function update(Request $request, MenuCategory $menuCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'required|integer',
        ]);

        $menuCategory->update($request->all());
        return redirect()->route('menu-categories.index')->with('success', 'Kategori sukses diupdate!');
    }

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
        return redirect()->route('menu-categories.index')->with('success', 'Kategori udah dihapus!');
    }
}