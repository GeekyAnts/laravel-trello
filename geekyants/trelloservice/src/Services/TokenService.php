<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class TokenService extends Trello
{
    function __construct($value)
    {
        parent::__construct();
        $this->id = $value;
        $this->utils = new Utils();
    }

    function fetch($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "tokens",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMember($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "tokens",
                $this->id,
                "member"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchWebHooks($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "tokens",
                $this->id,
                "webhooks"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchWebHook($idWebHook, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idWebHook)) {
            return ["error" => "Webhook id must be provided"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "tokens",
                $this->id,
                "webhooks",
                $idWebHook
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function createWebhook($queryParams)
    {
        if (!array_key_exists("idModel", $queryParams) || !$this->utils->isNotEmpty($queryParams["idModel"])) {
            return ["error" => "idModel should be present in query params"];
        }

        if (!array_key_exists("callbackURL", $queryParams) || !$this->utils->isNotEmpty($queryParams["callbackURL"])) {
            return ["error" => "callbackURL should be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "tokens",
                $this->id,
                "webhooks"
            ],
            "queryParams" =>  $queryParams,
        ];
        return  $this->sendRequest($requestOptions);
    }

    function updateWebhook($idWebHook, $queryParams = [])
    {
        if (!array_key_exists("idModel", $queryParams) || !$this->utils->isNotEmpty($queryParams["idModel"])) {
            return ["error" => "idModel should be present in query params"];
        }

        if (!array_key_exists("callbackURL", $queryParams) || !$this->utils->isNotEmpty($queryParams["callbackURL"])) {
            return ["error" => "callbackURL should be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "tokens",
                $this->id,
                "webhooks",
                $idWebHook
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
                "tokens",
                $this->id
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteWebHook($idWebHook)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "tokens",
                $this->id,
                "webhooks",
                $idWebHook
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
