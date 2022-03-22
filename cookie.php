<?php
setcookie('name', 'USER123', time() + (60 * 60 * 24 * 30));

echo $_COOKIE['name'];
