<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class BoardService extends Trello
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
                "boards",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchField($field, $queryParams = [])
    {
        $validFields = ["closed", "dateLastActivity", "dateLastView", "desc", "descData", "idOrganization", "invitations", "invited", "labelNames", "memberships", "name", "pinned", "powerUps", "prefs", "shortLink", "shortUrl", "starred", "subscribed", "url"];
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, $field,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdAndFieldThenSendRequest($requestOptions, $field, $validFields);
    }

    function fetchActions($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "actions",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchEnabledPlugins($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "boardPlugins",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoardStars($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "boardStars",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchOpenCards($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "cards",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCardsWithFilter($filter, $queryParams = [])
    {
        $validFields = ["all", "closed", "none", "open", "visible"];
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "cards",
                $filter,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdAndFieldThenSendRequest($requestOptions, $filter, $validFields);
    }

    function fetchCard($idCard, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "cards",
                $idCard,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchChecklists($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "checklists",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomFields($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "customFields",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchLabels($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "labels",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchLists($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "lists",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchListsWithFilter($filter, $queryParams = [])
    {
        $validFields = ["all", "closed", "none", "open"];
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "lists",
                $filter,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdAndFieldThenSendRequest($requestOptions, $filter, $validFields);
    }

    function fetchMembers($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "members",
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
                "boards",
                $this->id, "memberships",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchPlugins($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $this->id, "plugins",
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
                "boards",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMemberByEmail($queryParams, $headers, $bodyParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
            "headers" => $headers,
            "bodyParams" => $bodyParams
        ];

        if (!array_key_exists("email", $queryParams)) {
            return ["error" => "Email should be present in query params"];
        }
        if (!array_key_exists("type", $headers)) {
            return ["error" => "member type should be present in headers"];
        }

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMemberById($idMember, $queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "members",
                $idMember,
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("type", $queryParams)) {
            return ["error" => "Type should be present in query params"];
        }

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMembershipById($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "memberships",
                $queryParams["idMembership"],
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("type", $queryParams)) {
            return ["error" => "Type should be present in query params"];
        }

        if (!array_key_exists("idMembership", $queryParams)) {
            return ["error" => "idMembership should be present in query params"];
        }

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateEmailPosition($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "emailPosition",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!in_array($queryParams["value"], ["bottom", "top"])) {
            return ["error" => "value shoulld be one of 'bottom' or 'top' in query params"];
        }

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addEmailListId($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "idEmailList",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function showListGuide($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "showListGuide",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function showSidebar($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "showSidebar",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function showSidebarActivity($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "showSidebarActivity",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function showSidebarBoardActions($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "showSidebarBoardActions",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function showSidebarMembers($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "boards",
                $this->id, "myPrefs",
                "showSidebarMembers",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {

        if (!array_key_exists('name', $queryParams)) {
            return ["error" => "Name must be provided to create a Board"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "boards",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function enablePlugin($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "boardPlugins",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function generateCalendarKey()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "calendarKey",
                "generate",
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function generateEmailKey()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "EmailKey",
                "generate",
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function createLabel($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "labels",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("name", $queryParams)) {
            return ["error" => "name should be present in query params"];
        }

        if (!array_key_exists("color", $queryParams)) {
            return ["error" => "color should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function createList($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "lists",
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("name", $queryParams)) {
            return ["error" => "name should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function markAsViewed()
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "markedAsViewed",
            ],
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function enablePowerUp($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "boards",
                $this->id, "lists",
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
                "boards",
                $this->id,
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removePlugin($idPlugin)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "boards",
                $this->id, "boardPlugins",
                $idPlugin,
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeMember($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "boards",
                $this->id, "members",
                $idMember,
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removePowerUp($powerUp)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "boards",
                $this->id, "powerUps",
                $powerUp,
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
