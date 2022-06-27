# NoobAuth PHP Client

The simple PHP app, implement OAuth2 authorization, integrate with [NoobAuth](https://github.com/chenhuang511/noob-oauth) server.

# Getting started

Change the configurations in ```login.php``` and ```callback.php``` to fit with your environment

```PHP
$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId' => 'php-client',
    'clientSecret' => '4A1va/zL2vr9vqRg0a7qjyMOXPvcz8n0',
    'redirectUri' => 'http://phpclient.vn:8885/callback.php',
    'urlAuthorize' => 'http://noobauth.vn:4000/oauth2/noob-realm/authorize',
    'urlAccessToken' => 'http://noobauth.vn:4000/oauth2/noob-realm/token',
    'urlResourceOwnerDetails' => 'http://noobauth.vn:4000/oauth2/noob-realm/userinfo'
]);
```

Notice the ```redirectUri``` is the domain this application listening on your machine.

With local running, you may need modify for machine ```hosts``` file, separate the domains of NoobAuth and PHPClient to avoid the confusion about cookies of 2 applications.

# License

MIT