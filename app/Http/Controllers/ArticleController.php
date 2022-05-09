<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Topic;
use App\Models\Like;
use App\Models\User;
use App\Models\komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{

    public function create(){
        $title="Membuat Artikel";

        return view('article.create', compact('title'));
    }

    public function store(Request $request)
    {
        // $id = $request->session()->get('id');
        $id = Auth::user()->id;
        $request->validate([
            // 'topic' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|max:2000|mimes:jpeg,png,jpg,doc,docx,xls,xlsx,ppt,pptx,pdf',
        ]);

        $gambar = $request->file('gambar');
        $new_gambar = rand().'.'.$gambar->getClientOriginalExtension();

        $data_artikel = array(
            'user_id' => $id,
            // 'topic' => $request->topic,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'total_like' => 0,
            'gambar' => $new_gambar,
        );

        $gambar->move(public_path('gambar'), $new_gambar);
        $savedData = Article::create($data_artikel);

        $data_topic = array(
            'article_id' => $savedData->id,
            'food' => $request->has('food') ? 1 : 0,
            'sports' => $request->has('sports') ? 1 : 0,
            'yoga' => $request->has('yoga') ? 1 : 0,
            'therapy' => $request->has('therapy') ? 1 : 0,
            'workout' => $request->has('workout') ? 1 : 0,
            'nature' => $request->has('nature') ? 1 : 0,
            'diet' => $request->has('diet') ? 1 : 0,
            'lifestyle' => $request->has('lifestyle') ? 1 : 0,
            'psychology' => $request->has('psychology') ? 1 : 0,
        );

        $savedTopic = Topic::create($data_topic);

        // return response()->json([
        //     'success' => 'data berhasil disimpan',
        //     'data' => $savedData,
        //     'topic' => $savedTopic
        // ]);

        return redirect('/')->with('success', 'data has been created');
    }

    public function show($id)
    {
        $title = 'preview';
        $data = Article::find($id);
        $getEx = $data->gambar;
        $ext = substr($getEx, strpos($getEx, ".") + 1);
        $komentar = Komentar::where('article_id', $id)->get();
        for ($i=0; $i < count($komentar); $i++) { 
            $komentar[$i]->user = User::find($komentar[$i]->user_id);
            $komentar[$i]->userNama = $komentar[$i]->user->name;
        }

        $topic = Topic::where('article_id', $id)->first();

        
        $data->author = User::where('id', $data->user_id)->first();

        
        $like = Like::where('article_id',$id)->count();
        
        $data->total_like = $like;
        
        return view('article.detail', compact('data','title','ext', 'topic', 'komentar'));  
    }

    public function edit($id)
    {
        if(Auth::user()->id ===  Article::find($id)->user_id){
            $data = Article::find($id);
            $topic = Topic::where('article_id', $id)->first();
            $title = 'Edit';
            return view('article.edit', compact('data','title', 'topic'));
        }else{
            return redirect('/')->with('error', 'You are not authorized to edit this article');
        }
    }

   
    public function update(Request $request, $id)
    {
        if(Auth::user()->id === Article::find($id)->user_id){
            
            
            $gambar_lama = Article::find($id)->gambar;
            // $gambar_lama = $request->hidden_gambar;
            
            $gambar = $request->file('gambar');
            if($gambar != ''){
                $request->validate([
                    'judul' => 'required',
                    'isi' => 'required',
                    'gambar' => 'required|max:2000|mimes:jpeg,png,jpg,doc,docx,xls,xlsx,ppt,pptx,pdf',
                ]);
    
                $new_gambar = $gambar_lama;
                $gambar->move(public_path('gambar'), $new_gambar);
            }else{
                $request->validate([
                    'judul' => 'required',
                    'isi' => 'required'
                ]);
                $new_gambar = $gambar_lama;
            }
            
    
            $data_article = array(
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $new_gambar,
            );
            

            $data_topic = array(
                // 'article_id' => $id,
                'food' => $request->has('food') ? 1 : 0,
                'sports' => $request->has('sports') ? 1 : 0,
                'yoga' => $request->has('yoga') ? 1 : 0,
                'therapy' => $request->has('therapy') ? 1 : 0,
                'workout' => $request->has('workout') ? 1 : 0,
                'nature' => $request->has('nature') ? 1 : 0,
                'diet' => $request->has('diet') ? 1 : 0,
                'lifestyle' => $request->has('lifestyle') ? 1 : 0,
                'psychology' => $request->has('psychology') ? 1 : 0,
            );

    
            $data = Article::find($id);
            $data->update($data_article);

            $topic = Topic::where('article_id', Article::find($id)->id)->first();
            // dd($topic);
            $topic->update($data_topic);
            

            // return response()->json([
            //     'success' => 'data berhasil diupdate',
            //     'data' => $data_article,
            //     'topic' => $data_topic
            // ]);

            return redirect('/article/edit/id/'.$id)->with('success', 'data has been updated');

        }else{
            return redirect('/')->with('error', 'data has been updated');
        }
        
    }

    public function destroy($id)
    {
        if(Auth::user()->id === Article::find($id)->user_id){
            $data = Article::find($id);
            $topic = Topic::where('article_id', $id)->first();
            $like = Like::where('article_id', $id);
            // dd($like);
            
            File::delete('gambar/'.$data->gambar);
            $data->delete($data);
            $topic->delete($topic);
            $like->delete($like);
            
            return redirect('/')->with('Success','data berhasil dihapus');
        }else{
            return redirect('/')->with('error', 'You are not authorized to delete this article');
        }
        
    }

    public function search()
    {

        $search_text = $_GET['search'];
        $data = Article::where('topic', 'LIKE','%'.$search_text.'%')->orWhere('judul', 'LIKE','%'.$search_text.'%')->latest()->simplepaginate(5);
        $title = 'search';
        return view('search', compact('data','title','search_text'));
    }

    public function komentar(Request $request, $article_id){
        $request->validate([
            'komentar' => 'required',
        ]);

        $data_komentar = array(
            'article_id' => $article_id,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar,
        );

        $savedData = Komentar::create($data_komentar);

        return back();
    }

    public function get_myarticle(){
        $user_id = Auth::user()->id;
        $data = Article::where('user_id',$user_id)->simplepaginate(5);
        // $like = Like::where('article_id', $data->id)->count();
        foreach($data as $d){
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
        
        return response()->json([
            'success' => 'artikel user',
            'data' => $data
        ]);
    }

    public function my_article(){
        // dd($user_id);
        $user_id = Auth::user()->id;
        // $compactData = array('user_id');
        // dd($user_id);
        return view('user.index',compact('user_id'));
    }

}

