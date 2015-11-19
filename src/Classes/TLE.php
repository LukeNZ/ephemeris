<?php
namespace LukeNZ\Ephemeris\Classes;

class TLE extends ClassQueryable
{
    const CLASS_URL = '/basicspacedata/query/class/tle';

    protected $client;

    public function __construct($client) {
        $this->client = $client;
    }
}