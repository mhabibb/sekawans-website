<?php

namespace App\Http\Controllers;

use App\Models\StaticElement;
use App\Http\Requests\UpdateStaticElementRequest;

class StaticElementController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(StaticElement $sekawans)
  {
    $sekawans = $sekawans->get();
    return view('admin.sekawans.index', compact('sekawans'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\StaticElement  $staticElement
   * @return \Illuminate\Http\Response
   */
  public function show(StaticElement $staticElement)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\StaticElement  $staticElement
   * @return \Illuminate\Http\Response
   */
  public function edit(StaticElement $staticElement)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateStaticElementRequest  $request
   * @param  \App\Models\StaticElement  $staticElement
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateStaticElementRequest $request, StaticElement $staticElement)
  {
    return $request;
  }
}
