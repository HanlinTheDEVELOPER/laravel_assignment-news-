<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsRegion;
use App\Models\Region;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getNews($tag = 'all')
    {
        $regions = Region::get();
        return view('Table.all')->with(['data' => $tag, 'regions' => $regions]);
    }
    public function uploadNews(Request $request)
    {
        $news = $request->toArray();

        $data = News::create([
            'title' => $news['title'],
            'tag' => $news['tag'],
            'photo' => "photo",
            'body' => "body",
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
        return redirect('/news/all');
    }
}