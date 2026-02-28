<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teams = TeamMember::latest()->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:15360',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            
            // Ubah ekstensi keluaran menjadi .webp
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'teams/' . $filename;

            if (!Storage::disk('public')->exists('teams')) {
                Storage::disk('public')->makeDirectory('teams');
            }

            $absolutePath = public_path('uploads/' . $path);

            $manager = new ImageManager(new Driver());
            $img = $manager->read($imageFile->getRealPath());
            $img->cover(500, 500);
            
            // Konversi ke format WebP dengan kualitas 80%
            $img->toWebp(80)->save($absolutePath);

            $imagePath = $path;
        }

        TeamMember::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imagePath,
        ]);

        return redirect()->route('team-members.index')
                         ->with('success', 'Data profil berhasil didaftarkan dan foto telah dikonversi ke format WebP.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.teams.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:15360',
        ]);

        $imagePath = $teamMember->image;

        if ($request->hasFile('image')) {
            
            if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
                Storage::disk('public')->delete($teamMember->image);
            }
            
            $imageFile = $request->file('image');
            
            // Ubah ekstensi keluaran menjadi .webp
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'teams/' . $filename;

            if (!Storage::disk('public')->exists('teams')) {
                Storage::disk('public')->makeDirectory('teams');
            }

            $absolutePath = public_path('uploads/' . $path);

            $manager = new ImageManager(new Driver());
            $img = $manager->read($imageFile->getRealPath());
            $img->cover(500, 500);
            
            // Konversi ke format WebP dengan kualitas 80%
            $img->toWebp(80)->save($absolutePath);

            $imagePath = $path;
        }

        $teamMember->update([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imagePath,
        ]);

        return redirect()->route('team-members.index')
                         ->with('success', 'Data profil berhasil diperbarui.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
            Storage::disk('public')->delete($teamMember->image);
        }
        
        $teamMember->delete();
        
        return redirect()->route('team-members.index')
                         ->with('success', 'Data profil berhasil dihapus dari direktori sistem.');
    }
}