<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'created_by', 'updated_by',
    ];

    public function news()
    {
        return $this->hasMany('App\News', 'category_id');
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
