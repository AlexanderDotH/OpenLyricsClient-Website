<?php

require '../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '',
    '',
    'https://www.openlyricsclient.com/connect/spotify/complete/'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['refresh_token'])) {

    $session->refreshAccessToken($_GET['refresh_token']);

    header('Content-type: application/json');

    $data = [
        'access_token' => $session->getAccessToken(),
        'token_type' => 'Bearer',
        'scope' => $session->getScope(),
        'expires_in' => $session->getTokenExpiration()
    ];

    echo json_encode( $data );

}