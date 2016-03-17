<?php

require_once("dbMethods.php");

require_once("ComputationalGeometry/Point.php");

require_once("DatabaseClasses/Landmark.php");
require_once("DatabaseClasses/City.php");
require_once("DatabaseClasses/Route.php");


if (isset($_POST["requestName"])) {
    switch ($_POST["requestName"]) {
        case "getFirstRoute":
            $currentRoute = Route::withID("1");
            $currentRoute->setRequiredLandmarksNumber("10");

            $jsonRequiredLandmarks = json_encode($currentRoute);

            var_export($jsonRequiredLandmarks);
            break;

        case "getRoute":
            if (isset($_POST["routeId"]) && isset($_POST["requiredLandmarksNumber"])) {

                $routeId = $_POST["routeId"];
                $requiredLandmarksNumber = $_POST["requiredLandmarksNumber"];

                $currentRoute = Route::withID($routeId);
                $currentRoute->setRequiredLandmarksNumber($requiredLandmarksNumber);

                $jsonRequiredLandmarks = json_encode($currentRoute);

                var_export($jsonRequiredLandmarks);
            }
            break;

        case "getRoutesList":

            $routesArray = getAllRoutes();
            $jsonRoutesArray = json_encode($routesArray);

            var_export($jsonRoutesArray);
            break;
    }
}