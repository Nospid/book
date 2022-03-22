<?php

require "../admin.php";

$id = request('id');
$categorie_name = request('categorie_name');








if (empty($id)) {
    die("Please provide ID");
}

$category = find('categories', $id);
if (empty($category)) {
    die("Category not found!");
}

if (empty($categorie_name)) {
    setError("Please provide Name!");
    header("Location: index.php");
    die;
}





update('categories', $id, compact('categorie_name'));

setSuccess('Category updated!');
header("Location: index.php");
