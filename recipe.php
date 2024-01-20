<?php
include 'templates/header.php';
include 'app/functions.php';

$recipeId = isset($_GET['id']) ? $_GET['id'] : die('ID de la recette non spécifié.');

$recipe = getRecipe($recipeId);

if ($recipe) {
    echo '<div class="recipe_section">';
    echo '<h1>' . htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8') . '</h1>';
    echo '<p>' . htmlspecialchars($recipe['description'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<h2>Ingrédients</h2>';
    echo '<ul class="recipe-list">';
    $ingredients = explode(";", $recipe['ingredients']);
    foreach ($ingredients as $ingredient) {
        echo '<li class="recipe-item">' . htmlspecialchars($ingredient, ENT_QUOTES, 'UTF-8') . '</li>';
    }
    echo '</ul>';
    echo '<h2>Étapes de préparation</h2>';
    echo '<ol class="recipe-list">';
    if (isset($recipe['steps'])) {
        $steps = explode(";", $recipe['steps']);
        foreach ($steps as $step) {
            echo '<li class="recipe-item">' . htmlspecialchars($step, ENT_QUOTES, 'UTF-8') . '</li>';
        }
    }
    echo '</ol>';
    echo '</div>';
} else {
    echo "<p>Recette introuvable.</p>";
}

include 'templates/footer.php';
