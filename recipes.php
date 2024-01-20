<?php
include 'templates/header.php';
include 'app/functions.php';

$allRecipes = getAllRecipes();

?>

<h1>Liste des Recettes :</h1>
<ul>
    <?php
    foreach ($allRecipes as $recipe) {
        $recipeId = $recipe['id'];
        $recipeName = htmlspecialchars($recipe['title']);
        echo "<li><a class='recipe_link' href='recipe.php?id=$recipeId'>$recipeName</a></li>";
    }
    ?>
</ul>

<?php
include 'templates/footer.php';
?>