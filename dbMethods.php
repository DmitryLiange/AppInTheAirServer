<?php

//file_put_contents($fileName, json_encode($customerOrderElement));

function getLandmarkData($landmarkId) {

    $landmarkDbName = "Database/landmarks.json";
    $landmarks = json_decode(file_get_contents($landmarkDbName), true);
    if (isset($landmarks)) {

        if (array_key_exists($landmarkId, $landmarks)) {

            $landmarkData = $landmarks[$landmarkId];
            return $landmarkData;
        } else {

            //TODO
        }
    } else {

        //TODO
    }

}

function getCityData($cityId) {

    $citiesDbName = "Database/cities.json";
    $cities = json_decode(file_get_contents($citiesDbName), true);
    if (isset($cities)) {

        if (array_key_exists($cityId, $cities)) {

            $cityData = $cities[$cityId];
            return $cityData;
        } else {

            //TODO
        }
    } else {

        //TODO
    }
}

function getRouteData($routeId) {

    $routesDbName = "Database/routes.json";
    $routes = json_decode(file_get_contents($routesDbName), true);
    if (isset($routes)) {

        if (array_key_exists($routeId, $routes)) {

            $routeData = $routes[$routeId];
            return $routeData;
        } else {

            //TODO
        }
    } else {

        //TODO
    }
}