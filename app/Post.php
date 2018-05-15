<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
use SoftDeletes;

    protected $fillable = [
        'name', 'fetured', 'description','category_id','slug'
    ];

    protected $dates=['deleted_at'];


    public function getFeturedAttribute($fetured)
    {
        return asset($fetured);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
