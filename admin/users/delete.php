<?php

require "../admin.php";

$id = request('id');
$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$users = find('users', $id);
if (empty($users)) {
    die("Users not found!");
}


delete('users', $id);

setSuccess('Users deleted!');
header("Location: index.php");
