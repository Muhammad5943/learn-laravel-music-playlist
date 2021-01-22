<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Lyric;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $keyword = $request->keyword;

        if (!$keyword) {
            return redirect()->back();
        } else {
            $lyrics = Lyric::where("title", "LIKE", "%{$keyword}%")
                        ->orWhereHas("band", function ($query) use ($keyword){
                            return $query->where("name", "LIKE", "%{$keyword}%");
                        })
                            ->orWhereHas("album", function ($query) use ($keyword){
                            return $query->where("name", "LIKE", "%{$keyword}%");
                        })
                            ->paginate(2);
        }

        return view('search', [
            'lyrics' => $lyrics,
            'keyword' => $keyword
        ]);
    }
}
