<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        $title = "Daftar Dokumen"; 
        return view('admin.document.index', compact('documents', 'title'));
    }


    public function create()
    {
        return view('admin.document.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:10240',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName);

        Document::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function show(Document $document)
    {
        return view('admin.document.show', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('admin.document.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $document->update($request->all());

        return redirect()->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Document $document)
    {
        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('admin.documents.index')
                        ->with('success', 'Dokumen berhasil dihapus.');
    }


}
