<?php
require('../connexion/db.php');

// Get the product ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the existing product details
$product_query = mysqli_query($conn, "SELECT * FROM produit WHERE id=$id");
$product = mysqli_fetch_assoc($product_query);

// Fetch all categories for dropdown
$categories = mysqli_query($conn, "SELECT * FROM categorie");

// Handle the update form submission
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['nomProduit']);
    $category_id = intval($_POST['idCategorie']);

    $update_query = "UPDATE produit SET nomProduit='$name', idCategorie='$category_id' WHERE id=$id";
    
    if (mysqli_query($conn, $update_query)) {
        echo "Product updated successfully! <a href='index.php'>Go back</a>";
        exit;
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>

<h2>Update Product</h2>
<form action="" method="POST">
    <input type="text" name="nomProduit" value="<?= htmlspecialchars($product['nomProduit']) ?>" required>
    <select name="idCategorie">
        <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $row['id'] ?>" <?= ($row['id'] == $product['idCategorie']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nomCategorie']) ?>
            </option>
        <?php } ?>
    </select>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
