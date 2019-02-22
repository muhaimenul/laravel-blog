<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $primaryKey = 'id';

    use Searchable;

    protected $fillable = [
        'post_title', 'post_description',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function searchableAs()
    {
        return 'post_title';
    }
}
