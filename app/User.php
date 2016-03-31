<?php

namespace App;

use App\Conversation;
use App\Company;
use App\Answer;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'company_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
