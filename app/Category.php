<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=
    [
        'name'
    ];

    //belongs to many books
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
