<?php

require_once "../db.php";

$name = request('name');
$price = request('price');
$qty = request('qty');

$product = where('products', 'name', '=', $name);
$user = where('users', 'name', '=', 'Ankit Bhusal');

print_r('$product');
$user_id = $user['id'];
$product_id = $product['id'];

echo $user_id . "\n";
echo $product_id . "\n";

create('cart', compact('user_id', 'product_id'));
