<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleSearchResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ArticleService extends Controller
{
    public function search(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Article::query();

        $query->with('categories:id,name');

        if ($request->has('q'))
            $query->filterByText($request->q);

        if ($request->has('categories'))
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('id', $request->categories);
            });


        $field = $request->orderBy ?? 'created_at';
        $sort = $request->sortDesc === "true" ? 'DESC' : 'ASC';


        $articles = $query->orderBy($field, $sort)->paginate($request->paginate);

        ArticleSearchResource::collection($articles);

        return $articles;
    }

    public function store($data)
    {
        return Article::create($data);
    }
}
