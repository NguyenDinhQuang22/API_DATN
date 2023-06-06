<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evaluate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return Evaluate::all();
        } catch (\Exception $e) {
           return response()->json([
            // dd($e),
            'message' => 'Mở thất bại!',
        ], 200);
        }
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
     * @param  \App\Models\Evaluate  $evaluate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Evaluate::findOrFail($id);
        return response()->json([
            'brands'=>$brands
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluate  $evaluate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluate $evaluate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluate  $evaluate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = Evaluate::findOrFail($id);
        $brands->delete();
        return response()->json([
            'messege' => 'Xóa thành công!',
        ], 200);
    }
}
