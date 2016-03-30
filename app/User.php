<?php

namespace App;

use App\Conversation;
use App\Company;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
     */
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
