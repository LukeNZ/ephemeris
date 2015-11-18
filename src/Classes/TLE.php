<?php
namespace LukeNZ\Ephemeris\Classes;

class TLE
{
    const CLASS_URL = '/basicspacedata/query/class/tle';

    protected $client;

    public function __construct($client) {
        $this->client = $client;
    }
}