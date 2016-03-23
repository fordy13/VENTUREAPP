<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Company extends Model
{
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
