<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;


class KomentarController extends Controller
{
    public function send(Request $request, $article_id)
    {
        $request->validate([
            'komentar' => 'required',
        ]);

        $data_komentar = array(
            'article_id' => $article_id,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar,
        );

        $savedData = Komentar::create($data_komentar);

        return redirect()->route('article.show', $article_id);
    }
}