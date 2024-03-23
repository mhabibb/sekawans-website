@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h1>Data Member</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Member</h3>
                            <div class="card-tools">
                                <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Member</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nomor WhatsApp</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($members as $member)
                                        <tr>
                                            <td>{{ $member->nama }}</td>
                                            <td>{{ $member->no_wa }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
