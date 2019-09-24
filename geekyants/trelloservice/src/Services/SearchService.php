<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class SearchService extends Trello
{

    function __construct()
    {
        parent::__construct();
        $this->utils = new Utils();
    }

    function query($queryParams = [])
    {
        if (!array_key_exists("query", $queryParams) || !$this->utils->isNotEmpty($queryParams["query"])) {
            return ["error" => "query should be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "search"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function members($queryParams)
    {
        if (!array_key_exists("query", $queryParams) || !$this->utils->isNotEmpty($queryParams["query"])) {
            return ["error" => "query should be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "search",
                "members"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->sendRequest($requestOptions);
    }
}
