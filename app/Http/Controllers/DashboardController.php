<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Patient;
use App\Models\Regency;
use App\Models\Worker;

class DashboardController extends Controller
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

  public function index()
  {
    // Hash::check('password', auth()->user()->password) ? alert('Ndang ganti password') : '';
    $info = Article::where('category_id', 1)->get()->count();
    $article = Article::where('category_id', 2)->get()->count();
    $action = Article::where('category_id', 3)->get()->count();
    $workers = Worker::get()->count();
    $patients = Patient::get()->count();

    $regency = Regency::count('status')->get();

    return view('admin.dashboard', [
      'info' => $info,
      'artikel' => $article,
      'kegiatan' => $action,
      'ps' => $workers,
      'pasien' => $patients,
      'kabupaten' => $regency,
    ]);
  }
}
