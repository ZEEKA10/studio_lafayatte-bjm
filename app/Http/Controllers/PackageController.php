<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class PackageController extends Controller
{
    // Menampilkan daftar paket (Dikelompokkan berdasarkan kategori)
    public function index()
    {
        // Mengambil semua paket dan mengelompokkannya berdasarkan kolom 'kategori'
        $groupedPackages = Package::orderBy('kategori')->orderBy('harga', 'asc')->get()->groupBy('kategori');
        
        // Mengirim data yang sudah dikelompokkan ke View
        return view('admin.packages.index', compact('groupedPackages'));
    }

    // Menampilkan form tambah paket
    public function create()
    {
        return view('admin.packages.create');
    }

    // Menyimpan data paket baru ke database
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'kategori' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'jumlah_slot' => 'required|numeric|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validasi['gambar'] = $request->file('gambar')->store('packages', 'public');
        }

        dd($validasi);
        
        Package::create($validasi);

        return redirect()->route('packages.index')->with('success', 'Paket foto berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    // Menyimpan perubahan data paket
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'kategori' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'jumlah_slot' => 'required|numeric|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $package = Package::findOrFail($id);

        if ($request->hasFile('gambar')) {

            if ($package->gambar && Storage::disk('public')->exists($package->gambar)) {
                Storage::disk('public')->delete($package->gambar);
             }

             $validasi['gambar'] = $request->file('gambar')->store('packages', 'public');
        }

        $package->update($validasi);
        return redirect()->route('packages.index')
            ->with('success', 'Paket foto berhasil diperbarui!');
}

    // Menghapus data paket
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Paket foto berhasil dihapus!');
    }
}