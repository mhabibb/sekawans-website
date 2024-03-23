<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'no_wa' => 'required|unique:members|regex:/^\+[0-9]{10,15}$/',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama' => 'required|string',
            'no_wa' => 'required|unique:members,no_wa,' . $member->id . '|regex:/^\+[0-9]{10,15}$/',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
