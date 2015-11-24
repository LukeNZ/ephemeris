<?php
namespace LukeNZ\Ephemeris\RequestClasses;

class TLE extends PredicateQueryConstructor implements RequestClassInterface
{
    private $requestController = "basicspacedata";
    private $requestClass = "tle";

    public function __construct($client) {
        parent::__construct($client, $this->requestControllerName(), $this->requestClassName());
    }

    public function deltaSince() {

    }

    public function requestClassName() {
        return $this->requestClass;
    }

    public function requestControllerName() {
        return $this->requestController;
    }
}