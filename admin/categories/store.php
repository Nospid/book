<?php

require "../admin.php";

$name = request('categorie_name');



if (empty($name)) {
    setError('You must provide category name!');
    header("Location: create.php");
    die;
}






create('categories', ['categorie_name' => $name]);

setSuccess('Category created successfully!');
header("Location: index.php");
