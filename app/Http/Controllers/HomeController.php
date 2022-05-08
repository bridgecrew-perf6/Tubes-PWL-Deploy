<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Home";
        return view('home.index', compact('title'));
    }

    public function fetch(){
        $data = Article::latest()->simplepaginate(5);
        // $like = Like::where('article_id', $data->id)->count();
        foreach($data as $d){
            $d->author = User::find($d->user_id);
            $like = Like::where('article_id', $d->id)->count();
            $d->total_like = $like;
            $likeCheck = Like::where('article_id', $d->id)->where('user_id',auth()->user()->id)->first();
            if($likeCheck){
                $d->status_like = "Sudah like";

            }
            else{
                $d->status_like = "Belum like";
            }
        
        }

        $title="Home";
        $id_latest = Article::latest()->first();
        

        if($id_latest == null){
            return response()->json($data);
            // return view('home.index', compact('data','title'));
        }else{
            $id = $id_latest->id;
            return response()->json($data);
            // return view('home.index', compact('data','title','id'));
        }

        // return view('home.index');
    }

    public function search($id){
        $data = Article::where('judul', 'like', '%'.$id.'%')->simplepaginate(5);
        // $like = Like::where('article_id', $data->id)->count();
        foreach($data as $d){
            $d->author = User::find($d->user_id);
            $like = Like::where('article_id', $d->id)->count();
            $d->total_like = $like;
            $likeCheck = Like::where('article_id', $d->id)->where('user_id',auth()->user()->id)->first();
            if($likeCheck){
                $d->status_like = "Sudah like";

            }
            else{
                $d->status_like = "Belum like";
            }
        
        }

        $title="Home";
        $id_latest = Article::latest()->first();
        

        if($id_latest == null){
            return response()->json($data);
            // return view('home.index', compact('data','title'));
        }else{
            $id = $id_latest->id;
            return response()->json($data);
            // return view('home.index', compact('data','title','id'));
        }
    }

}