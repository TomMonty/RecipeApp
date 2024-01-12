<?php
include 'templates/header.php';
include 'app/functions.php';

// 📝 Ici je récupère pour vous l'ID de la recette, depuis la requête GET
$recipeId = isset($_GET['id']) ? $_GET['id'] : die('ID de la recette non spécifié.');

// 📝  On récupère ensuite les détails de la recette dans une variable
$recipe = gotRecipe($recipeId);

// 📝 Si la recette correspond à l'ID existe belle et bien alors....
if ($recipe) {
    // 👩‍💻 Affichez le titre de la recette en utilisant une balise <h1>. Par exemple : <h1>Spaghetti Bolognaise</h1>.
    echo '<h1>' . htmlspecialchars($recipe['titre']) . '</h1>';
    // 👩‍💻 Affichez la description de la recette dans un paragraphe <p>. Par exemple : <p>Un classique italien savoureux et facile à préparer.</p>.
    echo '<p>' . htmlspecialchars($recipe['description']) . '</p>';
    // 👩‍💻 Listez les Ingrédients :
    //Commencez par afficher le titre "Ingrédients" en utilisant une balise <h2>.
    // Créez une liste non ordonnée <ul> pour les ingrédients.
    // Pour chaque ingrédient de la recette, ajoutez un élément de liste <li>. Par exemple, si l'un des ingrédients est "400g de spaghetti", ajoutez : <li>400g de spaghetti</li>.
    echo '<h2>Ingrédients</h2>';
    echo '<ul>';
    foreach ($recipe['ingredients'] as $ingredient) {
        echo '<li>' . htmlspecialchars($ingredient) . '</li>';
    }
    echo '</ul>';
    // 👩‍💻 Décrivez les Étapes de Préparation :
    // Affichez le titre "Étapes de préparation" en utilisant une balise <h2>.
    // Utilisez une autre liste non ordonnée <ul> pour les étapes de préparation.
    // Ajoutez chaque étape de la recette comme un élément de liste <li>. Par exemple, une étape peut être : <li>Faire chauffer l'huile dans une poêle et y ajouter l'oignon et l'ail hachés.</li>.
    echo '<h2>Étapes de préparation</h2>';
    echo '<ul>';
    if (isset($recipe['etapes'])) {
        foreach ($recipe['etapes'] as $etapes) {
            echo '<li>' . htmlspecialchars($etapes) . '</li>';
        }
    }
    echo '</ul>';
} else {
    echo "<p>Recette introuvable.</p>";
}

include 'templates/footer.php';
