<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        // Mengambil data dokumen dari database
        $dokumens = Dokumen::all();
        
        // Mengirim data dokumen ke view 'admin.dokumens.index'
        return view('admin.dokumens.index', compact('dokumens'));
    }

    public function create()
    {
        // Menampilkan halaman form untuk membuat dokumen baru
        return view('admin.dokumens.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|max:150',
            'file' => 'required|mimes:pdf,doc,docx|max:10240', // Maksimal 10MB
        ]);

        // Upload file
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/documents', $filename);

        // Simpan data dokumen ke database
        Dokumen::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
        ]);

        return redirect()->route('dokumens.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function show(Dokumen $dokumen)
    {
        // Menampilkan halaman detail dokumen
        return view('admin.dokumens.show', compact('dokumen'));
    }

    public function edit(Dokumen $dokumen)
    {
        // Menampilkan halaman form untuk mengedit dokumen
        return view('admin.dokumens.edit', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'nullable|max:150',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240', // Maksimal 10MB
        ]);

        // Jika ada file yang diunggah, perbarui file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/documents', $filename);
            $dokumen->update([
                'file' => $filename,
            ]);
        }

        // Perbarui data dokumen
        $dokumen->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('dokumens.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Dokumen $dokumen)
    {
        // Hapus file terkait jika ada
        if ($dokumen->file) {
            Storage::delete('public/documents/' . $dokumen->file);
        }

        // Hapus data dokumen
        $dokumen->delete();

        return redirect()->route('dokumens.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
