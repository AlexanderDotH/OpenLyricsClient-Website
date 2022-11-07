<?php
require '../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '',
    '',
    'https://www.openlyricsclient.com/connect/spotify/complete/'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();
$options = [
    'scope' => [
        'playlist-read-private',
        'playlist-read-collaborative',
        'streaming',
        'user-follow-read',
        'user-library-read',
        'user-read-private',
        'user-read-playback-state',
        'user-modify-playback-state',
        'user-read-currently-playing',
        'user-read-recently-played'
    ],
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();