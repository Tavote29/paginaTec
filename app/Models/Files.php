<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['url', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
