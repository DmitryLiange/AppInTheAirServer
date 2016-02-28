<?php

namespace computationalGeometry;


class Segment {

    private
        $point1,
        $point2;

    public function Segment($point1, $point2) {

        $this->point1 = $point1;
        $this->point2 = $point2;
    }

    public function getPoint1() {

        return $this->point1;
    }

    public function getPoint2() {

        return $this->point2;
    }

    public function getDirection($point){

        return ($point->getX() - $this->point1->getX()) * ($this->point2->getY() - $this->point1->getY())
        - ($point->getY() - $this->point1->getY()) * ($this->point2->getX() - $this->point1->getX());
    }

    public function isOnSegment($point) {

        if ((min($this->point1->getX(), $this->point2->getX()) <= $point->getX()
                && $point->getX() <= max($this->point1->getX(), $this->point2->getX()))
            && (min($this->point1->getY(), $this->point2->getY()) <= $point->getY()
                && $point->getY() <= max($this->point1->getY(), $this->point2->getY()))) {

            return true;
        }

        return false;
    }
}