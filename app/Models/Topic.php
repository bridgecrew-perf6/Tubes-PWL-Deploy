<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',   
        'food',
        'sports',
        'yoga',
        'therapy',
        'workout',
        'nature',
        'diet',
        'lifestyle',
        'psychology',
    ];

    protected $guarded=['id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}