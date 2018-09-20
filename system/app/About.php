<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'content', 'created_by', 'updated_by',
    ];

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
