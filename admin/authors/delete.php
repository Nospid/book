<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$authors = find('authors', $id);
if (empty($author)) {
    die("Authors not found!");
}


delete('authors', $id);

setSuccess('Author deleted!');
header("Location: index.php");
