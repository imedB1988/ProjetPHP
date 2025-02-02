<?php
include "../connexion/db.php";

// Insert Product
if (isset($_POST['submit'])) {
    $id=$_POST['id'];
    $name = $_POST['nomProduit'];
    $category_id = $_POST['idCategorie'];
    $sql = "INSERT INTO produit (id, nomProduit, idCategorie) VALUES ('$id', '$name', '$category_id')";
    mysqli_query($conn, $sql);
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM produit WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Get Categories for Dropdown
$categories = mysqli_query($conn, "SELECT * FROM categorie");

// Fetch Products
$products = mysqli_query($conn, "SELECT produit.id, produit.nomProduit, categorie.nomCategorie AS category 
                                 FROM produit JOIN categorie ON produit.idCategorie = categorie.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with Dropdown</title>
</head>
<body>

<h2>Add Product</h2>
<form action="" method="POST">
    <input type="text" name="id" placeholder="id" required>
    <input type="text" name="nomProduit" placeholder="Product Name" required>
    <select name="idCategorie">
        <option value="">Select Category</option>
        <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['nomCategorie'] ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="submit">Add</button>
</form>

<h2>Product List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($products)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nomProduit'] ?></td>
        <td><?= $row['category'] ?></td>
        <td>
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
