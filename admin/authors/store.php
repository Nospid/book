<?php

require "../admin.php";

$name = request('name');



if (empty($name)) {
    setError('You must provide author name!');
    header("Location: create.php");
    die;
}






create('authors', ['name' => $name]);

setSuccess('Author created successfully!');
header("Location: index.php");
