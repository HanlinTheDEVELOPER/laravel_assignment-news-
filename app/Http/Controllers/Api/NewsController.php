<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Models\NewsRegion;
use Exception;
use Illuminate\Http\Request;
use Throwable;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag = $request->tag;
        try {
            $news = News::when($tag, function ($query) use ($tag) {
                $query->where('tag', $tag);
            })->with('regions')->get();
            return response()->json([
                'data' => NewsResource::collection($news),
                'message' => 'News Fetch Successfully'
            ], 200);
        } catch (Throwable $e) {
            return response()->json(
                ['message' => $e->getMessage()],
                500
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {

        $news = $request->toArray();
        $photo_name = $request->file('photo')->getClientOriginalName();
        $result = $request->file('photo')->storeOnCloudinaryAs('NewsImage', rand() . $photo_name);
        $photo_id = $result->getPublicId();

        $data = News::create([
            'title' => $news['title'],
            'tag' => $news['tag'],
            'photo' => $photo_id,
            'body' => $news['body'],
        ]);
        if ($data->tag == "breaking") {
            for ($i = 1; $i < 15; $i++) {
                if (isset($news[$i])) {
                    NewsRegion::create([
                        'news_id' => $data->id,
                        'region_id' => $i,
                    ]);
                }
            }
        }
        $news = News::with('regions')->find($data->id);
        return response()->json([
            'data' => NewsResource::make($news),
            'message' => 'Upload News Successfully'
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::with('regions')->find($id);
        if ($news == null) {
            return response()->json(['message' => 'News Not Found'], 404);
        }
        return response()->json([
            'data' => NewsResource::make($news),
            'message' => 'Get News Successfully'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $oldNews = News::find($id);
        if ($oldNews == null) {
            return response()->json(["message" => "News Not Found"], 404);
        }
        NewsRegion::where('news_id', $request->id)->delete();

        if ($request->hasFile('photo')) {
            Cloudinary::destroy($oldNews->photo);
            $photo_name = $request->file('photo')->getClientOriginalName();
            $result = $request->file('photo')->storeOnCloudinaryAs('NewsImage', rand() . $photo_name);
            $photo_id = $result->getPublicId();
        } else {
            $photo_id = $oldNews->photo;
        }
        News::find($request->id)->update([
            'title' => $request->title,
            'tag' => $request->tag,
            'photo' => $photo_id,
            'body' => $request->body,
        ]);

        if ($request->tag == "breaking") {
            $news = $request->toArray();
            for ($i = 1; $i < 15; $i++) {
                if (isset($news[$i])) {
                    NewsRegion::create([
                        'news_id' => $request->id,
                        'region_id' => $i,
                    ]);
                }
            }
        }
        $news = News::with('regions')->find($id);
        return response()->json([
            'data' => NewsResource::make($news),
            'message' => 'Update News Successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $news = News::find($id);
        if ($news == null) {
            return response()->json(['message' => 'News Not Found'], 404);
        }
        if ($news->tag == "breaking") {
            NewsRegion::where('news_id', $news->id)->delete();
        };
        Cloudinary::destroy($news->photo);
        News::find($request->id)->delete();
        return response()->json(['message' => 'News Delete Successfully'], 200);
    }
}
