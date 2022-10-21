<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    protected mixed $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }


    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->articleService->search($request);

        return response()->json($data);
    }

    public function store(ArticleStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        $response = $this->articleService->store($data);

        return response()->json($response, 201);
    }
}
