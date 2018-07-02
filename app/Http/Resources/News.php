<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\NewsCategory as NewsCategoryResource;

class News extends JsonResource
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
            'news_category_id' => $this->category_id,
            'news_category_title' => $this->news_category->title,
            'title' => $this->title,
            'headline' => $this->headline,
            'content' => $this->content,
            'published' => $this->published,
            'published_by' => $this->published_by,
            // 'published_by_name' => $this->publish_by->name,
            'published_at' => $this->published_at,
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
