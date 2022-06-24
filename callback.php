<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId' => 'php-client',
    'clientSecret' => '/9VppYqBGelyCBrhq+kSJHu4d5BJPjf0',
    'redirectUri' => 'http://localhost:8885/callback.php',
    'urlAuthorize' => 'http://noobauth.vn:4000/oauth2/noob-realm/authorize',
    'urlAccessToken' => 'http://noobauth.vn:4000/oauth2/noob-realm/token',
    'urlResourceOwnerDetails' => 'http://noobauth.vn:4000/oauth2/noob-realm/userinfo'
]);

// Check given state against previously stored one to mitigate CSRF attack
if (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {

    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }

    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        // Using the access token, we may look up details about the
        // resource owner.
        $resourceOwner = $provider->getResourceOwner($accessToken)->toArray();
        $username = $resourceOwner['preferred_username'];
        $_SESSION['loginUser'] = $username;
        header('Location: /index.php');
        exit();
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());

    }

}
