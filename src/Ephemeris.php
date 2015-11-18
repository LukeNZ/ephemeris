<?php
namespace LukeNZ\Ephemeris;

use GuzzleHttp\Client;

class Ephemeris
{
    const SPACE_TRACK_URL = 'https://space-track.org';

    protected $identity, $password, $client, $cookie;

    protected $apiAdherence = true;

    protected $responseFormat = 'json';
    protected $responseFormats = [
        'xml', 'json', 'html', 'csv', 'tle', '3le', 'kvn', 'stream'
    ];

    public function __construct($identity, $password) {
        $this->identity = $identity;
        $this->password = $password;

        $this->client = new Client();
    }

    public function tles() {
        return new Classes\TLE($this);
    }

    public function disableApiAdherence() {
        $this->apiAdherence = false;
    }

    public function setResponseFormat($preferredResponseFormat) {
        if (in_array($preferredResponseFormat, $this->responseFormats)) {
            $this->responseFormat = $preferredResponseFormat;
        }
    }

    public function httpRequest($method, $url) {
        return $this->client->{$method}(Ephemeris::SPACE_TRACK_URL . $url, [
            'cookies' => $this->cookie
        ]);
    }

    private function authenticate() {
        $response = $this->client->post(Ephemeris::SPACE_TRACK_URL . 'ajaxauth/login', [
            'form_params' => [
                'identity' => $this->identity,
                'password' => $this->password
            ]
        ]);

        $body = json_decode($response->getBody());

        $this->cookie = new GuzzleHttp\Cookie\CookieJar();
    }
}