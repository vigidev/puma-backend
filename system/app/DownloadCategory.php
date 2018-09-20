<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    protected $table = 'download_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'created_by', 'updated_by',
    ];

    public function download()
    {
        return $this->hasMany('App\Download', 'category_id');
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
