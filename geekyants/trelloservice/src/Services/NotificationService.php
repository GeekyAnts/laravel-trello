<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class NotificationService extends Trello
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
                "notifications",
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
                "notifications",
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
                "notifications",
                $this->id,
                "board"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCard($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "notifications",
                $this->id,
                "card"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchList($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "notifications",
                $this->id,
                "list"
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
                "notifications",
                $this->id,
                "member"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCreater($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "notifications",
                $this->id,
                "memberCreator"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchOrganization($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "notifications",
                $this->id,
                "organization"
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
                "notifications",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateUnreadStatus($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "notifications",
                $this->id,
                "unread"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function markAllRead()
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "notifications",
                "all",
                "read"
            ],
        ];
        return $this->sendRequest($requestOptions);
    }
}
