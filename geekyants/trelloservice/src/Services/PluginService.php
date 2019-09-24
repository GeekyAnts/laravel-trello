<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class PluginService extends Trello
{
    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function fetch($idOrganization, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idOrganization)) {
            return ["error" => "Id of organization must be provided"];
        }
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "plugins",
                $idOrganization,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function fetchComplianceMemberPrivacy($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "plugins",
                $this->id,
                "compliance",
                "memberPrivacy"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->sendRequest($requestOptions);
    }

    function createNewListing($bodyParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "plugins",
                $this->id,
                "listing"
            ],
            "bodyParams" =>  $bodyParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function update($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "plugins",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateListing($idListing, $bodyParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "plugins",
                $this->id,
                "listing",
                $idListing
            ],
            "bodyParams" =>  $bodyParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
