<!DOCTYPE html>
<html>
<head>
    <title>Recipe Search</title>
</head>
<body>
    <h1>Recipe Search</h1>

    <form action="/search" method="GET">
        <input type="text" name="ingredients" placeholder="食材を入力してください">
        <button type="submit">検索</button>
    </form>

    <h2>検索結果</h2>
    <ul>
        @foreach ($recipes as $recipe)
            <li>{{ $recipe['recipeTitle'] }}</li>
        @endforeach
    </ul>
</body>
</html>
