<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  
        'healthy' => 'boolean', 
        'sports' => 'boolean', 
        'politics' => 'boolean', 
        'entertainment' => 'boolean', 
        'technology' => 'boolean', 
        'science' => 'boolean'
    ];

    public function article()
    {
        return $this->belongsTo(User::class);
    }
}