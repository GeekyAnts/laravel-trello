<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class ListService extends Trello
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
                "lists",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchField($field, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "lists",
                $this->id,
                $field
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchActions($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "lists",
                $this->id,
                "actions"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoard($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "lists",
                $this->id,
                "board"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCards($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "lists",
                $this->id,
                "cards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function update($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateClosedStatus($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "closed"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function moveToBoard($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "idBoard"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function rename($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "name"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function changePosition($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "pos"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function setSoftLimit($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "softLimit"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function setSubscribedStatus($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "lists",
                $this->id,
                "subscribed"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {
        if (!array_key_exists("idBoard", $queryParams) || !$this->utils->isNotEmpty($queryParams["idBoard"])) {
            return ["error" => "idBoard must be present in query params"];
        }
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name must be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "lists",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function archiveAllCards($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "lists",
                $this->id,
                "archiveAllCards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function moveAllCard($queryParams)
    {
        if (!array_key_exists("idBoard", $queryParams) || !$this->utils->isNotEmpty($queryParams["idBoard"])) {
            return ["error" => "idBoard must be present in query params"];
        }
        if (!array_key_exists("idList", $queryParams) || !$this->utils->isNotEmpty($queryParams["idList"])) {
            return ["error" => "idList must be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "lists",
                $this->id,
                "moveAllCards"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
