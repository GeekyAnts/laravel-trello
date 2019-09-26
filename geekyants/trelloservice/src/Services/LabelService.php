<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class LabelService extends Trello
{
    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function fetch($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "labels",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name should be present in query params"];
        }

        if (!array_key_exists("color", $queryParams) || !$this->utils->isNotEmpty($queryParams["color"])) {
            return ["error" => "color should be present in query params"];
        }

        if (!array_key_exists("idBoard", $queryParams) || !$this->utils->isNotEmpty($queryParams["idBoard"])) {
            return ["error" => "idBoard should be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "labels",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }


    function update($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "labels",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateColor($queryParams = [])
    {
        if (!array_key_exists("value", $queryParams) || !$this->utils->isNotEmpty($queryParams["value"])) {
            return ["error" => "value should be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "labels",
                $this->id,
                "color"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateName($queryParams = [])
    {
        if (!array_key_exists("value", $queryParams) || !$this->utils->isNotEmpty($queryParams["value"])) {
            return ["error" => "value should be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "labels",
                $this->id,
                "name"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function delete()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "labels",
                $this->id,
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
