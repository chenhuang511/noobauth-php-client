<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

session_destroy();
header('Location: /index.php');
exit();