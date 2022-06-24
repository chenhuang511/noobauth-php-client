<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId' => 'php-client',
    'clientSecret' => '4A1va/zL2vr9vqRg0a7qjyMOXPvcz8n0',
    'redirectUri' => 'http://phpclient.vn:8885/callback.php',
    'urlAuthorize' => 'http://noobauth.vn:4000/oauth2/noob-realm/authorize',
    'urlAccessToken' => 'http://noobauth.vn:4000/oauth2/noob-realm/token',
    'urlResourceOwnerDetails' => 'http://noobauth.vn:4000/oauth2/noob-realm/userinfo'
]);

// Fetch the authorization URL from the provider; this returns the
// urlAuthorize option and generates and applies any necessary parameters
// (e.g. state).
$authorizationUrl = $provider->getAuthorizationUrl();

// Get the state generated for you and store it to the session.
$_SESSION['oauth2state'] = $provider->getState();

// Redirect the user to the authorization URL.
header('Location: ' . $authorizationUrl);
exit;