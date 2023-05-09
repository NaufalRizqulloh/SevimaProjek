<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function insta()
    {
        return $this->belongsTo(Insta::class);
    }

    protected $fillable = ['user_id', 'insta_id'];
}
