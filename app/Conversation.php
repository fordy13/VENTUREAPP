<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Conversation extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

