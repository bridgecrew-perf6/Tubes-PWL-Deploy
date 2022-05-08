<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    // protected $fillable = ['topic','judul','isi','total_like','user_id', 'gambar'];

    protected $fillable = ['judul','isi','user_id', 'gambar'];

    protected $guarded=['id'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function komentars(){
        return $this->hasMany(Komentar::class, 'article_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'article_id');
    }

    public function topics(){
        return $this->belongsTo(Topic::class, 'article_id');
    }
}
 