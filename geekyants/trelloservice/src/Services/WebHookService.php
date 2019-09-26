<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class WebHookService extends Trello
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
                "webhooks",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchField($field, $queryParams = [])
    {
        $validFields = ["active", "callbackURL", "description", "idModel"];

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "webhooks",
                $this->id,
                $field
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdAndFieldThenSendRequest($requestOptions, $field, $validFields);
    }

    function update($queryParams = [])
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "webhooks",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {
        if (!array_key_exists("idModel", $queryParams) || !$this->utils->isNotEmpty($queryParams["idModel"])) {
            return ["error" => "idModel should be present in query params"];
        }

        if (!array_key_exists("callbackURL", $queryParams) || !$this->utils->isNotEmpty($queryParams["callbackURL"])) {
            return ["error" => "callbackURL should be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "webhooks"
            ],
            "queryParams" =>  $queryParams,
        ];
        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function delete()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "webhooks",
                $this->id
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
