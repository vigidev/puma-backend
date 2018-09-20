<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DownloadCategory as DownloadCategoryResource;

class Download extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'download_category_id' => $this->category_id,
            'download_category_title' => $this->download_category->title,
            'title' => $this->title,
            'url' => $this->url,
            'featured' => $this->featured,
            'created_by' => $this->created_by,
            'created_by_name' => $this->create_by->name,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_by_name' => $this->update_by->name,
            'updated_at' => $this->updated_at,
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://rakha.arvipi.com')
        ];
    }
}
