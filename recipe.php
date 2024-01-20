<?php
include 'templates/header.php';
include 'app/functions.php';

$recipeId = isset($_GET['id']) ? $_GET['id'] : die('ID de la recette non spécifié.');

$recipe = getRecipe($recipeId);

if ($recipe) {
    echo '<div class="recipe_section">';
    echo '<h1>' . htmlspecialchars($recipe['title']) . '</h1>';
    echo '<p>' . htmlspecialchars($recipe['description']) . '</p>';
    echo '<h2>Ingrédients</h2>';
    echo '<ul>';
    $ingredients = explode(";", $recipe['ingredients']);
    foreach ($ingredients as $ingredient) {
        echo '<li>' . htmlspecialchars($ingredient) . '</li>';
    }
    echo '</ul>';
    echo '</ul>';
    echo '<h2>Étapes de préparation</h2>';
    echo '<ul>';
    if (isset($recipe['steps'])) {
        $steps = explode(";", $recipe['steps']);
        foreach ($steps as $step) {
            echo '<li>' . htmlspecialchars($step) . '</li>';
        }
    }
    echo '</ul>';
    echo '</div>';
} else {
    echo "<p>Recette introuvable.</p>";
}

include 'templates/footer.php';
