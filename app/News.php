<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   /**
     * Обратная связь с категориями
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // атрибут доступен по имени ->category_name
    public function getCategoryNameAttribute(){
        if(!empty($this->category))
            return $this->category->name;
        return '';
    }

    public function getHasImageAttribute(){
        return !empty($this->image);
    }
    // preview_url
    public function getPreviewUrlAttribute(){
        return '/image/preview/'.str_replace('/images/', '', $this->image);
    }
    // detail_url
    public function getDetailUrlAttribute(){
        return '/image/detail/'.str_replace('/images/', '', $this->image);
    }
}
