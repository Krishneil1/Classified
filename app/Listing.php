<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\SoftDeletes;

class Listing extends Model
{
    //
    use SoftDeletes;

    public function live()//Check if a listing is live
    {
        return $this->live;
    }

    public function cost()
    {
        return $this->category->price;//price of listing.Can extend on this e.g one time fee

    }
    public function user()
    {
        return $this->belongsTo(User::class);//listing will belong to a user.
    }
    public function category()
    {
        return $this->belongsTo(Category::class);//listing will belong to a Category.   
    }
    public function area()
    {
        return $this->belongsTo(Area::class);//listing will belong to a Area.   
    }

}
