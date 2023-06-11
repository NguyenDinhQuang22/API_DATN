<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\savenews;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SavenewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $save_news = auth()->user()->save_news;
        if (!$save_news) {
            return response()->json([
                'message' => 'Bạn chưa lưu tin nào!'
            ]);
        }
        // 'brand',
        // 'customer',
        // 'ward',
        // 'district',
        // 'category',
        // 'images'
        $save_news->load(
            'news.brand',
            'news.ward',
            'news.district',
            'news.category',
            'news.images',
            'customer'
        );
            // $save_news= savenews::with('customer','news')->get();
        return response()->json($save_news);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Xác nhận dữ liệu đầu vào
            $data = $request->validate([
                'news_id' => 'required'
            ]);
            $staffId = $request->user()->id;
            $existingNews = savenews::where('news_id', $data['news_id'])->where('user_id', $staffId)->first();

            // Kiểm tra xem bài viết đã được lưu trước đó hay chưa
            if ($existingNews) {
                return response()->json(['message' => 'Bài viết đã được lưu trước đó'], 409);
            }
            $save_news = new savenews();
            $save_news->news_id = $request->news_id;
            $save_news->user_id = $staffId;
            $save_news->save();
            // dd($data);
            // Tạo một đối tượng News mới với dữ liệu đã xác nhận
            // $news = savenews::create($data);

            // Trả lại dữ liệu JSON và mã trạng thái HTTP 201 để chỉ ra một tài nguyên mới đã được tạo
            return response()->json($save_news, 201);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function delete(Request $request)
    {
        try {
            // Xác nhận dữ liệu đầu vào
            $data = $request->validate([
                'news_id' => 'required'
            ]);

            $staffId = $request->user()->id;

            // Tìm kiếm bài viết có thể bỏ lưu
            $news = savenews::where('user_id', $staffId)->where('news_id', $data['news_id'])->first();

            if ($news) {
                // Bỏ lưu bài viết
                $news->delete();
                return response()->json(['message' => 'Bỏ lưu bài viết thành công'], 200);
            } else {
                return response()->json(['message' => 'Bài viết không tồn tại hoặc không được lưu trước đó'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
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
