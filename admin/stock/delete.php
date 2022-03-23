<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}





$stock = find('stock', $id);
if (empty($stock)) {
    die("stock not found!");
}




delete('stock', $product_id);

setSuccess(' Stock deleted!');
header("Location: index.php");
