<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class OrganizationService extends Trello
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
                "organizations",
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
                "organizations",
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
                "organizations",
                $this->id,
                "actions"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoards($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "boards"
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
                "organizations",
                $this->id,
                "members"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMembersInvited($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "membersInvited"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMemberships($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "memberships"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMembership($idMembership, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "memberships",
                $idMembership
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchPluginData($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "pluginData",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchTags($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "tags",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBillableGuets($idBoard, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "newBillableGuests",
                $idBoard
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchExports($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "organizations",
                $this->id,
                "exports"
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
                "organizations",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMember($queryParams = [])
    {
        if (!array_key_exists("email", $queryParams) || !$this->utils->isNotEmpty($queryParams["email"])) {
            return ["error" => "email must be present in query params"];
        }
        if (!array_key_exists("fullName", $queryParams) || !$this->utils->isNotEmpty($queryParams["fullName"])) {
            return ["error" => "idList must be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "organizations",
                $this->id,
                "members"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMemberType($idMember, $queryParams = [])
    {

        if (!array_key_exists("type", $queryParams) || !$this->utils->isNotEmpty($queryParams["type"])) {
            return ["error" => "type must be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "organizations",
                $this->id,
                "members",
                $idMember
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function setMemberDeactivateStatus($idMember, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "organizations",
                $this->id,
                "members",
                $idMember,
                "deactivated"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {
        if (!array_key_exists("displayName", $queryParams) || !$this->utils->isNotEmpty($queryParams["displayName"])) {
            return ["error" => "displayName must be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "organizations",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function setLogo($queryParams =[])
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "organizations",
                $this->id,
                "logo"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function createTag($queryParams)
    {
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name must be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "organizations",
                $this->id,
                "tags"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function export($queryParams=[])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "organizations",
                $this->id,
                "exports"
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
                "organizations",
                $this->id
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteLogo()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "logo"
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeMember($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "members",
                $idMember
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeMemberAndFromAllBoards($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "members",
                $idMember,
                "all"
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeAssociatedGoogleAppsDomain()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "prefs",
                "associatedDomain"
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeEmailDomainRestriction()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "prefs",
                "orgInviteRestrict"
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteTag($idTag)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "organizations",
                $this->id,
                "tags",
                $idTag
            ]
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
