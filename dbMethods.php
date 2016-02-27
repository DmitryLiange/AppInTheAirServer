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


// Для Яра
// функция скачивает информацию о товарах из prodord_tovtozakaz по id заказа из prodord_zakaz
function getGood($prodordOrderId) {

    $goodDataArray = array();

    $dbHost='localhost';
    $dbName='xxxx';
    $dbUser='zzzz';
    $dbPass='yyyy';

    $db = mysql_connect($dbHost,$dbUser,$dbPass);
    mysql_select_db($dbName,$db);

    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

    $sql = mysql_query("SELECT id, zakaz, tovar, kol, brand, name, srok, delivery, price, comment, cost, roznica, registr, valut, file_name_sh FROM prodord_tovtozakaz WHERE zakaz = $prodordOrderId", $db)
    or die("Invalid query: " . mysql_error());

    while ($tableRows = mysql_fetch_row($sql)) {

        $goodData = array();
        $goodData["goodId"] = $tableRows[0];
        $goodData["zakaz"] = $tableRows[1];
        $goodData["tovar"] = $tableRows[2];
        $goodData["kol"] = $tableRows[3];
        $goodData["brand"] = $tableRows[4];
        $goodData["name"] = $tableRows[5];
        $goodData["srok"] = $tableRows[6];
        $goodData["delivery"] = $tableRows[7];
        $goodData["price"] = $tableRows[8];
        $goodData["comment"] = $tableRows[9];
        $goodData["cost"] = $tableRows[10];
        $goodData["roznica"] = $tableRows[11];
        $goodData["registr"] = $tableRows[12];
        $goodData["valut"] = $tableRows[13];
        $goodData["file_name_sh"] = $tableRows[14];

        array_push($goodDataArray, $goodData);
    }

    mysql_close($db);

    return $goodDataArray;
}