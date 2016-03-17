<?php

class Route implements JsonSerializable {

    private
        $id,
        $departureCity,
        $arrivalCity,
        $landmarks,
        $landmarksToPrint; //TODO change name


    public function __construct() {

        //generate id? TODO
    }

    public static function withParams($id, $departureCityId, $arrivalCityId, $landmarksIds) {

        $instance = new self();
        $instance->fill($id, $departureCityId, $arrivalCityId, $landmarksIds);
        return $instance;
    }

    public static function withID($routeId) {

        $instance = new self();
        $instance->loadByID($routeId);
        return $instance;
    }

    protected function loadByID($routeId) {

        $routeData = getRouteData($routeId);
        $this->fill($routeData["id"], $routeData["departureCityId"], $routeData["arrivalCityId"], $routeData["landmarksIds"]);
    }

    protected function fill($id, $departureCityId, $arrivalCityId, $landmarksIds) {

        $this->id = (string)$id;

        $departureCity = City::withID($departureCityId);
        $this->departureCity = $departureCity;

        $arrivalCity = City::withID($arrivalCityId);
        $this->arrivalCity = $arrivalCity;

        $landmarks = array();
        foreach ($landmarksIds as $landmarkId) {

            $landmark = Landmark::withID($landmarkId);
            array_push($landmarks, $landmark);
        }
        $this->landmarks = $landmarks;
        $this->landmarksToPrint = array();
    }



    public function setRequiredLandmarksNumber($requiredLandmarksNumber) {

        // TODO комменты
        $requiredLandmarksNumber = ($requiredLandmarksNumber < 0) ? 5 :
            (($requiredLandmarksNumber > 10) ? 10 : $requiredLandmarksNumber);

        $this->landmarksToPrint = array_slice($this->landmarks, 0, $requiredLandmarksNumber - 1);
        array_push($this->landmarksToPrint, $this->landmarks[9]);
    }


    public function getId() {

        return $this->id;
    }

    public function getDepartureCity() {

        return $this->departureCity;
    }

    public function getArrivalCity() {

        return $this->arrivalCity;
    }

    public function getLandmarks() {

        return $this->landmarks;
    }


    function jsonSerialize() {

        return array(
            "landmarksToShow" => $this->landmarksToPrint
        );
    }
}