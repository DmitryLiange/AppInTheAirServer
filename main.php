<?php

require_once("dbMethods.php");

require_once("ComputationalGeometry/Point.php");

require_once("DatabaseClasses/Landmark.php");
require_once("DatabaseClasses/City.php");
require_once("DatabaseClasses/Route.php");


//if (isset($_POST["routeId"]) && isset($_POST["requiredLandmarksNumber"])) {
//
//    $routeID = $_POST["routeId"];
//    $requiredLandmarksNumber = $_POST["requiredLandmarksNumber"];
//
//
//    $currentRoute = Route::withID($routeID);
//    $currentRoute->setRequiredLandmarksNumber($requiredLandmarksNumber);
//
//    $jsonRequiredLandmarks = json_encode($currentRoute);
//
//    return $jsonRequiredLandmarks;
//}



$currentRoute = Route::withID("1");
$currentRoute->setRequiredLandmarksNumber("2");

$jsonRequiredLandmarks = json_encode($currentRoute);
var_export($jsonRequiredLandmarks);
