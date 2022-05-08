<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($article_id)
    {
        $like = Like::where('article_id', $article_id)->where('user_id', Auth::user()->id)->first();

        if ($like) {
            Like::where('article_id', $article_id)->where('user_id', Auth::user()->id)->delete();
            // $like->delete();
            return back();
        } else {
            Like::create([
                'article_id' => $article_id,
                'user_id' => Auth::user()->id
            ]);
            return back();
        }

        return back();
        
    }

    public function show()
    {
        $title = 'liked';
        return view('home.liked', compact('title'));
    }

    public function fetch()
    {
        $likes = Like::where('user_id', Auth::user()->id)->get();
        $article = [];
        foreach ($likes as $like) {
            $temp = Article::where('id', $like->article_id)->first();
            $temp->author = User::find($temp->user_id);
            array_push($article, $temp);
        }
        
        return response()->json($article);
    }
    
}