<?php

require "../admin.php";





if (empty($_FILES['imagae'])) {
    die("Please upload image!");
}


$iamge = $_FILES['image'];
$file = $image['tmp_name'];
$type = mime_content_type($file);
$size = $image['size'] / 10214 / 1024;




if ($size > 5) {

    die("Please upload file less than 5 mb!");
}


if ($type != "image/png" && $type != "image/jpeg" && $type != "image/gif") {


    die("File must be an image of type png ,gif, jpeg!");
}





$id = request('id');

if (empty($id)) {
    die("Please provide ID");
}

$product = find('products', $id);
if (empty($product)) {
    die("Product not found!");
}


$name = request('name');
$price = request('price');
$on_sale = request('on_sale') ?? 0;
$sale_price = request('sale_price');
$description = request('description');
$category_id = request('category_id');
$image = request('image');

if (empty($name) || empty($price) || empty($description) || empty($category_id)) {
    setError('You must fill all the fields!');
    header("Location: update.php?id=$id");
    die;
}

if ($on_sale && empty($sale_price)) {
    setError('Please provide sale price on product is on sale!');
    header("Location: update.php?id=$id");
    die;
}

if (!is_numeric($price)) {
    setError('Price must be a number!');
    header("Location: update.php?id=$id");
    die;
}

if ($on_sale && !is_numeric($sale_price)) {
    setError('Sale Price must be a number!');
    header("Location: update.php?id=$id");
    die;
}

if ($price <= 0) {
    setError('Price must be above Rs. 0!');
    header("Location: update.php?id=$id");
    die;
}

if ($sale_price > $price) {
    setError('Sale price must be lower than regular price!');
    header("Location: update.php?id=$id");
    die;
}

$category = find('categories', $category_id);
if (!$category) {
    setError('Invalid Category ID!');
    header("Location: update.php?id=$id");
    die;
}




//upload file


$ext = match ($type) {


    "image/pnp" => ".pnp",
    "image/jpeg" => ".jpeg",
    "iamge/gif" => ".gif"
};



$image = uniqid() . $ext;
move_uploaded_file($file, "../../uploads/$image");


$price = (int) $price;
$sale_price = (int) $sale_price;


update('products', $id, compact('name', 'price', 'on_sale', 'sale_price', 'description', 'category_id', 'image'));

setSuccess('Product updated!');
header("Location: index.php");
