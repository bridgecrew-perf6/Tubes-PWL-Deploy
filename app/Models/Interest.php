<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interest extends Model
{
    use HasFactory;
    protected $table = 'interests';

    protected $fillable = ['sport','vegetable','gym'];

    public function users(){
        $this->belongsTo(User::class);
    }

    public function articles(){
        $this->belongsTo(Article::class);
    }
    
}
