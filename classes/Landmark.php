<?php

class Landmark implements JsonSerializable {

    private
        $id,
        $name,
        $coordinates,
        $description;

    public function __construct() {

        //generate id? TODO
    }

    public static function withParams($id, $name, $coordinates, $description) {

        $instance = new self();
        $instance->fill($id, $name, $coordinates, $description);
        return $instance;
    }

    public static function withID($landmarkId) {

        $instance = new self();
        $instance->loadByID($landmarkId);
        return $instance;
    }

    protected function loadByID($landmarkId) {

        $landmarkData = getLandmarkData($landmarkId);
        $this->fill($landmarkData["id"], $landmarkData["name"], $landmarkData["coordinates"], $landmarkData["description"]);
    }

    protected function fill($id, $name, $coordinates, $description) {

        $this->id = (string)$id;
        $this->name = (string)$name;
        $this->coordinates = $coordinates;
        $this->description = (string)$description;
    }


    public function getId() {

        return $this->id;
    }

    public function getName() {

        return $this->name;
    }

    public function getCoordinates() {

        return $this->coordinates;
    }

    public function getDescription() {

        return $this->description;
    }


    function jsonSerialize() {

        return array(
            "name" => $this->name,
            "coordinates" => $this->coordinates,
            "description" => $this->description
        );
    }
}