<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        Document::create($request->all());

        return redirect()->route('documents.index')
            ->with('success', 'Document created successfully.');
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $document->update($request->all());

        return redirect()->route('documents.index')
            ->with('success', 'Document updated successfully');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')
            ->with('success', 'Document deleted successfully');
    }
}
