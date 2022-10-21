<?php

namespace Database\Seeders;

use App\Http\Controllers\ArticleService;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleService = new ArticleService();
        $categories = Category::all();

        $api_url = "https://dummyjson.com/products";

        $response = Http::get($api_url);
        $articles = $response->json()['products'];

        foreach ($articles as $article) {

            $data = [
                'name' => $article['title'],
                'description' => $article['description'],
                'status' => false
            ];

            $article = $articleService->store($data);

            $article->categories()->sync($categories->random());
        }

    }
}
