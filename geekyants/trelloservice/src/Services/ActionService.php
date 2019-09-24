<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class ActionService extends Trello
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
                "actions",
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
                "actions",
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
                "actions",
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
                "actions",
                $this->id,
                "card"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchDisplayInfo($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "actions",
                $this->id,
                "display"
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
                "actions",
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
                "actions",
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
                "actions",
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
                "actions",
                $this->id,
                "organization"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateComment($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "actions",
                $this->id
            ],
            "queryParams" =>  $queryParams,

        ];

        if (array_key_exists("text", $queryParams)) {
            $requestOptions["path"] = [
                "actions",
                $this->id
            ];
        } else if (array_key_exists("value", $queryParams)) {
            $requestOptions["path"] = [
                "actions",
                $this->id,
                "text"
            ];
        } else {
            return ["error" => "Text  or Value should be present in query params"];
        }

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteComment($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "actions",
                $this->id,
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
                "actions",
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
                "actions",
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
                "actions",
                $this->id,
                "members"
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
                "actions",
                $this->id,
                "transferrable",
                "organization", $idOrganization
            ],
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deactivateMember($idMember, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "actions",
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
                "actions",
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
                "actions",
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
                "actions",
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
                "actions",
                $this->id,
                "admins",
                $idMember
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
