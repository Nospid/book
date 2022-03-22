<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$category = find('products', $id);
if (empty($category)) {
    die("Category not found!");
}


delete('products', $id);

setSuccess('Item deleted!');
header("Location: index.php");
