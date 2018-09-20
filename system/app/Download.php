<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'title', 'url', 'featured', 'created_by', 'updated_by',
    ];

    public function download_category()
    {
        return $this->belongsTo('App\DownloadCategory', 'category_id');
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
