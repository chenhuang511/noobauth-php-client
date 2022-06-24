<?php
session_start();
session_destroy();
$callback = 'http://phpclient.vn:8885/index.php';
$logoutEndpoint = 'http://noobauth.vn:4000/oauth2/noob-realm/logout';
$url = $logoutEndpoint . '?redirect_url=' . $callback;
header('Location: ' . $url);
exit();