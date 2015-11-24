<?php
namespace LukeNZ\Ephemeris\RequestClasses;
use LukeNZ\Ephemeris\SatelliteIdentifiers\SatelliteIdentificationContract;

class PredicateQueryConstructor
{
    protected $client, $query;

    public function __construct($client, $requestController, $requestClass) {
        $this->client = $client;
        $this->query['controller'] = $requestController;
        $this->query['action'] = 'query';
        $this->query['class'] = $requestClass;
    }

    public function satellite(SatelliteIdentificationContract $satelliteIdentifiers) {
        if (is_array($satelliteIdentifiers)) {

        } else {
            $this->query['predicates'][$satelliteIdentifiers->getPredicateName()] = $satelliteIdentifiers->identify();
        }
        return $this;
    }

    public function modelDefinitions() {
        $this->query['action'] = 'modeldef';
    }

    protected function buildQuery() {
        $query = '/' . $this->query['controller'] . '/' . $this->query['action'] . '/class/' . $this->query['class'] . '/';

        if (isset($this->query['predicates'])) {
            foreach ($this->query['predicates'] as $key => $value) {
                $query .= $key . '/' . $value . '/';
            }
        }

        $query .= 'format/' . $this->client->getResponseFormat();

        return $query;
    }

    public function fetch() {
        $response = $this->client->httpRequest($this->buildQuery());
        return json_decode($response->getBody());
    }
}