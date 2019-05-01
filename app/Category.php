<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the news.
     */
    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function parent_category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function children()
    {
        return $this->hasMany('App\Category');
    }
    public function getHasChildrenAttribute(){

        return $this->children()->count() > 0;
    }
    public function getParentNameAttribute(){
        // dd($this->category_id);
        if(!empty($this->parent_category))
            return $this->parent_category->name;
        return '';
    }
}
