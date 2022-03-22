<?php

require "../admin.php";

$id = request('id');
$name = request('name');










if (empty($id)) {
    die("Please provide ID");
}

$product = find('products', $id);
if (empty($product)) {
    die("Product not found!");
}

if (empty($name)) {
    setError("Please provide Name!");
    header("Location: index.php");
    die;
}





update('products', $id, compact('name'));

setSuccess('Product updated!');
header("Location: index.php");
