<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\savenews;
use Illuminate\Http\Request;

class SavenewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\savenews  $savenews
     * @return \Illuminate\Http\Response
     */
    public function show(savenews $savenews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\savenews  $savenews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savenews $savenews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\savenews  $savenews
     * @return \Illuminate\Http\Response
     */
    public function destroy(savenews $savenews)
    {
        //
    }
}
