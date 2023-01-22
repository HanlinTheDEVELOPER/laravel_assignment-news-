<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Region;
use App\Models\NewsRegion;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews($tag = 'all')
    {
        $regions = Region::get();
        $news = News::get();
        return view('Table.all')->with(['data' => $tag, 'regions' => $regions, 'news' => $news]);
    }
    public function uploadNews(NewsRequest $request)
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
        return redirect('/news/all');
    }
}