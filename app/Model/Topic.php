<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name_topic', 'slug_name', 'tag_name', 'description', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
}
