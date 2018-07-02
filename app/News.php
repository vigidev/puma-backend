<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'title', 'headline', 'content', 'published', 'published_by', 'published_at', 'created_by', 'updated_by',
    ];

    public function news_category()
    {
        return $this->belongsTo('App\NewsCategory', 'category_id');
    }

    public function publish_by()
    {
        return $this->belongsTo('App\User', 'published_by');
    }

    public function create_by()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function update_by()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
