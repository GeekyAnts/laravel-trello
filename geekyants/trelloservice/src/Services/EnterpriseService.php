<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class EnterpriseService extends Trello
{

    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function generateAuthToken($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "enterprises",
                $this->id,
                "tokens"
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
                "enterprises",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAdmins($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "enterprises",
                $this->id,
                "admins"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchSignupUrl($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "enterprises",
                $this->id,
                "signupUrl"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMembers($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "enterprises",
                $this->id,
                "members"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMember($idMember, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "enterprises",
                $this->id,
                "members",
                $idMember
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function isOrganizationTransferableToEnterprise($idOrganization)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "enterprises",
                $this->id,
                "transferrable",
                "organization", $idOrganization
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deactivateMember($idMember, $queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "enterprises",
                $this->id,
                "members",
                $idMember, "deactivated"
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function tranferOrganization($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "enterprises",
                $this->id,
                "organizations"
            ],
            "queryParams" =>  $queryParams
        ];
        if (!array_key_exists("idOrganization", $queryParams)) {
            return ["error" => "idOrganization should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function makeAdmin($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "enterprises",
                $this->id,
                "admins",
                $idMember
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeOrganization($idOrganization)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "enterprises",
                $this->id,
                "organizations",
                $idOrganization
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeAdmin($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "enterprises",
                $this->id,
                "admins",
                $idMember
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
