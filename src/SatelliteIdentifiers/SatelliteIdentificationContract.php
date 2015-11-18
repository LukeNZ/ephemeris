<?php
namespace LukeNZ\Ephemeris\SatelliteIdentifiers;

interface SatelliteIdentificationContract
{
    public static function create($identifier);

    public function identify();

    public function getPredicateName();
}