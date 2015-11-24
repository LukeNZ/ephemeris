<?php
namespace LukeNZ\Ephemeris\SatelliteIdentifiers;

class NoradID implements SatelliteIdentificationContract
{
    private $predicate = 'NORAD_CAT_ID';
    private $identifier;

    public function __construct($identifier) {
        $this->identifier = $identifier;
    }

    public static function create($identifier) {
        return new NoradID($identifier);
    }

    public function identify() {
        return $this->identifier;
    }

    public function getPredicateName() {
        return $this->predicate;
    }
}