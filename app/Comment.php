<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id";

    protected $fillable = [
         'article_id',
         'user',
         'comment'
    ];
    protected $dates = [
         'creaated_at',
         'updated_at'
    ];
}
