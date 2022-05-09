<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Like;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show($topic)
    {
        $title = 'Topic';

        $hasil = Topic::where($topic, '1')->get();
        for ($i = 0; $i < count($hasil); $i++) {
            $article[$i] = Article::where('id', $hasil[$i]->article_id)->first();
            $article[$i]->creator = User::where('id', $article[$i]->user_id)->first();
            $article[$i]->total_like = Like::where('article_id', $article[$i]->id)->count();
        }
        // dd($article);

        // return response()->json($article);
        if(isset($article) == false){
            return view('home.topic', compact('title'));
        } else {
            return view('home.topic', compact('title', 'article'));
        }
    }

    public function fetch($topic)
    {
        $hasil = Topic::where($topic, '1')->get();
        for ($i = 0; $i < count($hasil); $i++) {
            $article[$i] = Article::where('id', $hasil[$i]->article_id)->first();
        }
        
        return response()->json($article);
    }
}