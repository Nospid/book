<?php

require "../admin.php";

$name = request('name');
$price = request('price');
$on_sale = request('on_sale') ?? 0;
$sale_price = request('sale_price');
$description = request('description');
$category_id = request('category_id');
$image = request('image');











$file = $_FILES['image']['tmp_name'];

$type = mime_content_type($_FILES['image']['tmp_name']);
$size = $_FILES['image']['size'];
$dim = getimagesize($file);
$width = $dim[0];
$height = $dim[1];





//'application/pdf';

/**$images=[


    'image/png',
    'image/jpeg',
    'iamge/gif',
];
 */

if ($type != "image/png" && $type1 = "image/jpeg" && $type != "image/gif") {

    die("File type must be an image");
}

$mb_size = $size / 1024 / 1024;

if ($mb_size >  5) {
    die("File must be less than 5mb!");
}

/**for random number for file 
rand( 1, 1000);

 */




$ext = match ($type) {


    "image/png" => ".png",
    "image/jpeg" => ".jpeg",
    "image/gif" => ".gif",
};




$file_name = uniqid() . $ext;



move_uploaded_file($file, "../../uploads/" . $file);


die;

if (empty($name) || empty($price) || empty($description) || empty($category_id)) {
    setError('You must fill all the fields!');
    header("Location: create.php");
    die;
}

if ($on_sale && empty($sale_price)) {
    setError('Please provide sale price on product is on sale!');
    header("Location: create.php");
    die;
}

if (!is_numeric($price)) {
    setError('Price must be a number!');
    header("Location: create.php");
    die;
}

if ($on_sale && !is_numeric($sale_price)) {
    setError('Sale Price must be a number!');
    header("Location: create.php");
    die;
}

if ($price <= 0) {
    setError('Price must be above Rs. 0!');
    header("Location: create.php");
    die;
}

if ($sale_price > $price) {
    setError('Sale price must be lower than regular price!');
    header("Location: create.php");
    die;
}

$category = find('categories', $category_id);
if (!$category) {
    setError('Invalid Category ID!');
    header("Location: create.php");
    die;
}

$price = (int) $price;
$sale_price = (int) $sale_price;


create('products', compact('name', 'price', 'sale_price', 'on_sale', 'category_id', 'description', 'qty'));

setSuccess('Product created successfully!');
header("Location: index.php");
