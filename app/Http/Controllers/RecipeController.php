<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function search(Request $request)
    {
        $ingredients = $request->input('ingredients');
        
        // 楽天レシピAPIのURLとパラメータを設定
        $url = 'https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426';
        $params = [
            'format' => 'json',
            'applicationId' => env('RAKUTEN_APP_ID'),
            'categoryId' => '0',
            'categoryType' => 'recipeTitle',
            'keyword' => $ingredients,
        ];


        
        $response = Http::get($url, $params);
        $recipes = [];

        if ($response->successful()) {
            $recipes = $response['result'];
        }

        // dd($recipes);

        return view('search', compact('recipes'));

    }
}
