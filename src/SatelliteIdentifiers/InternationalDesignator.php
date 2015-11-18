<?php
namespace LukeNZ\Ephemeris\SatelliteIdentifiers;

class InternationalDesignator implements SatelliteIdentificationContract
{
    private $predicate = 'INTLDES';
    private $identifier;

    public function __construct($identifier) {
        $this->identifier = $identifier;
    }

    public static function create($identifier) {
        return new InternationalDesignator($identifier);
    }

    public function identify() {
        return $this->identifier;
    }

    public function getPredicateName() {
        return $this->predicate;
    }

    public function getLaunchYear() {
        return intval(substr($this->identifier, 0, 4));
    }
}