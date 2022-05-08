<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

    protected $fillable = ['article_id','user_id','komentar'];
    
    protected $guarded=['id'];

    public function users(){
        $this->belongsTo(User::class, 'user_id');
    }

    public function articles(){
        $this->belongsTo(Article::class, 'article_id');
    }
}