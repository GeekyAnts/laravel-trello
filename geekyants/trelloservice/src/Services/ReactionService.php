<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class ReactionService extends Trello
{

    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function fetchAvailableEmoji($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "emoji"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function fetchForAction($idAction, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idAction)) {
            return ["error" => "idAction must be provided"];
        }
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "actions",
                $idAction,
                "reactions"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function fetchInfoForAction($idAction, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idAction)) {
            return ["error" => "idAction must be provided"];
        }
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "actions",
                $idAction,
                "reactions",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchReactionSummaryForAction($idAction, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idAction)) {
            return ["error" => "idAction must be provided"];
        }
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "actions",
                $idAction,
                "reactionsSummary",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function createOnAction($idAction, $bodyParams = [])
    {
        if (!$this->utils->isNotEmpty($idAction)) {
            return ["error" => "idAction must be provided"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "actions",
                $idAction,
                "reactions",
            ],
            "bodyParams" =>  $bodyParams,
        ];
        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function deleteOnAction($idAction)
    {
        if (!$this->utils->isNotEmpty($idAction)) {
            return ["error" => "idAction must be provided"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "actions",
                $idAction,
                "reactions",
                $this->id
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
