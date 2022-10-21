<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleSearchResource extends JsonResource
{
    public function toArray($request)
    {
        $article = $this;

        return [
            'name' => $article->name,
            'description' => $article->description,
            'categories' => $article->categories->pluck('name')
        ];
    }
}
