<?php
require '../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '',
    '',
    'https://www.openlyricsclient.com/connect/spotify/complete/'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {

    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    header('Location: ' . 'https://www.openlyricsclient.com/connect/spotify/complete/' . '?refresh_token=' . $session->getRefreshToken() . '&access_token=' . $session->getAccessToken());
} else if (isset($_GET['access_token'])) {
    $api->setAccessToken($_GET['access_token']);
    echo "<center><h1>You are now connected " . $api->me()->display_name . "!" . "</h1></center>";
}
