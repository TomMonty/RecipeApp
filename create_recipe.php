<?php
include 'templates/header.php';
include 'app/functions.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>

    <?php
    include 'templates/header.php';
    include 'app/functions.php';

    global $pdo;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $ingredients = implode(",", $_POST['ingredients']);
        $steps = implode(",", $_POST['steps']);

        // Exclude 'id' from the columns to insert
        $sql = "INSERT INTO recipes (title, description, ingredients, steps) VALUES (:title, :description, :ingredients, :steps)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'description' => $description, 'ingredients' => $ingredients, 'steps' => $steps]);

        header("Location: index.php");
    }
    ?>

    <h1 class="title">Création de Recette :</h1>
    <form method="post">
        <div class="form_container">
            <label for="title">Titre:</label>
            <input type="text" id="title" name="title">

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <label for="ingredients">Ingrédients:</label>
            <textarea id="ingredients" name="ingredients[]" rows="4"></textarea>

            <label for="steps">Étapes:</label>
            <textarea id="steps" name="steps[]" rows="4"></textarea>

            <input class="submit_button" type="submit" value="Submit">
        </div>
    </form>

    <?php
    include 'templates/footer.php';
    ?>

</body>

</html>