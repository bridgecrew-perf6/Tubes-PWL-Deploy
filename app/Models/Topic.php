<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',   
        'healthy', 
        'sports', 
        'politics', 
        'entertainment', 
        'technology', 
        'science'
    ];

    protected $guarded=['id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}