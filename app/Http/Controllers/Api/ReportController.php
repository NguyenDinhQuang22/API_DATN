<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
        //     return Report::all();
        // } catch (\Exception $e) {
        //    return response()->json([
            
        //     'message' => 'Mở thất bại!',
        // ], 200);
        // }
        try {
            $reports = DB::table('reports')
        ->join('da5_product', 'reports.news_id', '=', 'da5_product.id')
        ->select('reports.content', 'da5_product.name as news_name','da5_product.id as news_id')
        ->get();
        return response()->json([
            
            'reports'=>$reports,    
           
           
        ], 200);
        } catch (\Exception $e) {
            dd($e);
        }
        // dd('test');
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
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $brands = Report::findOrFail($id);
        return response()->json([
            'brands'=>$brands
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = Report::findOrFail($id);
        $brands->delete();
        return response()->json([
            'messege' => 'Xóa thành công!',
        ], 200);
    }
}
