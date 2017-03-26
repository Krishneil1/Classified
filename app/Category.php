<?php

namespace App;


use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use NodeTrait;

    protected $fillable=['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
