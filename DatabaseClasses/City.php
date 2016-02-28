<?php


class City {

    private
        $id,
        $name,
        $country,
        $coordinatesPoint,
        $cityLandmark;


    public function __construct() {

        //generate id? TODO
    }

    public static function withParams($id, $name, $country, $coordinates, $cityLandmarkId) {

        $instance = new self();
        $instance->fill($id, $name, $country, $coordinates, $cityLandmarkId);
        return $instance;
    }

    public static function withID($cityId) {

        $instance = new self();
        $instance->loadByID($cityId);
        return $instance;
    }

    protected function loadByID($cityId) {

        $cityData = getCityData($cityId);
        $this->fill($cityData["id"], $cityData["name"], $cityData["country"], $cityData["coordinates"], $cityData["cityLandmarkId"]);
    }

    protected function fill($id, $name, $country, $coordinates, $cityLandmarkId) {

        $this->id = (string)$id;
        $this->name = (string)$name;
        $this->country = (string)$country;
        $this->coordinatesPoint = Point::withArray($coordinates);

        $cityLandmark = Landmark::withID($cityLandmarkId);
        $this->cityLandmark = $cityLandmark;
    }


    public function getId() {

        return $this->id;
    }

    public function getName() {

        return $this->name;
    }

    public function getCountry() {

        return $this->country;
    }

    public function getCoordinatesPoint() {

        return $this->$coordinatesPoint;
    }

    public function getCityLandmark() {

        return $this->cityLandmark;
    }
}