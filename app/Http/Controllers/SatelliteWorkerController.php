<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatelliteWorkerController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::orderBy('name', 'asc')->get();
        return view('admin.supporter.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supporter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('name'), [
            'name' => 'required|string|max:64|unique:workers',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $worker = Worker::create(['name' => $request->name]);

        if ($worker) {
            return response()->json([
                'success' => true,
                'message' => 'Patient Supporter berhasil dibuat'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan Patient Supporter.'
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::findOrFail($id);
        return view('admin.supporter.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);

        $validator = Validator::make($request->only('name'), [
            'name' => 'required|string|max:64|unique:workers,name,' . $id . ',' . $worker->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $updated = $worker->update(['name' => $request->name]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Patient Supporter berhasil di update'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate Patient Supporter.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::findOrFail($id);
        $deleted = $worker->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Patient Supporter berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus Patient Supporter.'
            ], 500);
        }
    }
}