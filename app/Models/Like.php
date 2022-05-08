<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = ['article_id', 'user_id'];

    protected $guarded=['id'];

    public function users(){
        $this->belongsTo(User::class, 'user_id');
    }

    public function articles(){
        $this->belongsTo(Article::class, 'article_id');
    }
}