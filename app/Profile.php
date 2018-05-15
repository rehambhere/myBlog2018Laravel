<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
       'about','avater','facebook','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
