<?php

require "../admin.php";

$id = request('id');
$name = request('name');










if (empty($id)) {
    die("Please provide ID");
}

$authors = find('authors', $id);
if (empty($authors)) {
    die("Author not found!");
}

if (empty($name)) {
    setError("Please provide Name!");
    header("Location: index.php");
    die;
}





update('authors', $id, compact('name'));

setSuccess('Author updated!');
header("Location: index.php");
