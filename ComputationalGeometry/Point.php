<?php


class Point {

    private
        $x,
        $y;

    public function __construct() {

    }

    public static function withParams($xCoordinate, $yCoordinate) {

        $instance = new self();
        $instance->fill($xCoordinate, $yCoordinate);
        return $instance;
    }

    public static function withArray($coordinates) {

        $instance = new self();
        $instance->fill($coordinates["x"], $coordinates["y"]);
        return $instance;
    }

    protected function fill($xCoordinate, $yCoordinate) {

        $this->x = $xCoordinate;
        $this->y = $yCoordinate;
    }

    public function getX() {

        return $this->x;
    }

    public function getY() {

        return $this->y;
    }
}