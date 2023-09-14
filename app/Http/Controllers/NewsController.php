<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\Region;
use App\Models\NewsRegion;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($tag = 'all')
    {
        if ($tag == "breaking") {
            $news = News::where('tag', "breaking")->get();
        } elseif ($tag == "normal") {
            $news = News::where('tag', "normal")->get();
        } else {
            $news = News::get();
        }

        $regions = Region::get();
        return view('Table.all')->with(['data' => $tag, 'regions' => $regions, 'news' => $news]);
    }
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
        return redirect('/news/all');
    }

    public function edit($id)
    {
        $item = News::with('regions')->find($id);
        $tag = 'all';
        $regions = Region::get();
        $relatedRegionsId = NewsRegion::where('news_id', $id)->pluck('region_id')->toArray();

        return view('Page.editNews')->with(['data' => $tag, 'item' => $item, 'regions' => $regions, 'relatedRegions' => $relatedRegionsId]);
    }

    public function update(NewsUpdateRequest $request)
    {
        $oldNews = News::find($request->id);

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
        return redirect('/news/all');
    }

    public function destroy(Request $request)
    {
        $news = News::find($request->id);
        if ($news->tag == "breaking") {
            NewsRegion::where('news_id', $news->id)->delete();
        };
        Cloudinary::destroy($news->photo);
        News::find($request->id)->delete();
        return redirect('/news/all');
    }
}
