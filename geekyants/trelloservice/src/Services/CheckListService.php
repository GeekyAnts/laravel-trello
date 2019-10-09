<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class CheckListService extends Trello
{
    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function create($queryParams)
    {
        if (!array_key_exists("idCard", $queryParams)) {
            return ["error" => "idCard should be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "checklists",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];
        return $res;
    }

    function createCheckItem($queryParams)
    {
        if (!array_key_exists("name", $queryParams)) {
            return ["error" => "name should be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "checklists",
                $this->id,
                "checkItems"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetch($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id
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
                "checklists",
                $this->id,
                $field
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
                "checklists",
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
                "checklists",
                $this->id,
                "cards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItems($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "checkItems"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItem($idCheckItem, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "checkItems",
                $idCheckItem
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
                "checklists",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateName($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "checklists",
                $this->id,
                "name"
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function delete()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "checklists",
                $this->id,
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteCheckItem($idCheckItem)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "checklists",
                $this->id,
                "checkItems",
                $idCheckItem
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
