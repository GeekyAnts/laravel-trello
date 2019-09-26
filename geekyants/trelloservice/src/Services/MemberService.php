<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class MemberService extends Trello
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
                "members",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchFeild($field, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
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
                "members",
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
                "members",
                $this->id,
                "boards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoardBackgrounds($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "boardBackgrounds"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoardBackground($idBackground, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "boardBackgrounds",
                $idBackground
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAllBoardStars($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "boardStars"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoardStar($idBoardStar, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "boardStars",
                $idBoardStar
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchBoardsInvited($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "boardsInvited"
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
                "members",
                $this->id,
                "cards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomBoardBackgrounds($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customBoardBackgrounds"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomBoardBackground($idBackground, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customBoardBackgrounds",
                $idBackground
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomEmojis($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customEmoji"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomEmoji($idEmoji, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customEmoji",
                $idEmoji
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomStickers($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customStickers"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCustomSticker($idSticker, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "customStickers",
                $idSticker
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchEnterprises($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "enterprises"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchNotifications($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "notifications"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchTeams($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "organizations"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }


    function fetchTeamsInvited($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "organizationsInvited"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchSavedSearches($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "savedSearches"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchSavedSearche($idSearch, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "savedSearches",
                $idSearch
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAppTokens($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "members",
                $this->id,
                "tokens",
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateMember($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "members",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateBoardBackground($idBackground, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "members",
                $this->id,
                "boardBackgrounds",
                $idBackground
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateStarredBoardPosition($idStar, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "members",
                $this->id,
                "boardStars",
                $idStar
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateCustomBoardBackground($idBackground, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "members",
                $this->id,
                "customBoardBackgrounds",
                $idBackground
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateSavedSearch($idSearch, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "members",
                $this->id,
                "savedSearches",
                $idSearch
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function createAvtar($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "avatar"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addBoardBackground($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "boardBackgrounds"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function starBoard($queryParams)
    {
        if (!array_key_exists("idBoard", $queryParams) || !$this->utils->isNotEmpty($queryParams["idBoard"])) {
            return ["error" => "idBoard must be present in query params"];
        }
        if (!array_key_exists("pos", $queryParams) || !$this->utils->isNotEmpty($queryParams["pos"])) {
            return ["error" => "pos must be present in query params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "boardStars"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addCustomBoardBackground($queryParams)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "customBoardBackgrounds"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addCustomEmoji($queryParams)
    {
        if (!array_key_exists("file", $queryParams) || !$this->utils->isNotEmpty($queryParams["file"])) {
            return ["error" => "file must be present in query params"];
        }
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name must be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "customEmoji"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addCustomSticker($queryParams)
    {
        if (!array_key_exists("file", $queryParams) || !$this->utils->isNotEmpty($queryParams["file"])) {
            return ["error" => "file must be present in query params"];
        }
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name must be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "customStickers"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function dismissMessage($queryParams)
    {
        if (!array_key_exists("value", $queryParams) || !$this->utils->isNotEmpty($queryParams["value"])) {
            return ["error" => "value must be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "oneTimeMessagesDismissed"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addSavedSearch($queryParams)
    {
        if (!array_key_exists("query", $queryParams) || !$this->utils->isNotEmpty($queryParams["query"])) {
            return ["error" => "query must be present in query params"];
        }
        if (!array_key_exists("name", $queryParams) || !$this->utils->isNotEmpty($queryParams["name"])) {
            return ["error" => "name must be present in query params"];
        }
        if (!array_key_exists("pos", $queryParams) || !$this->utils->isNotEmpty($queryParams["pos"])) {
            return ["error" => "pos must be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "POST",
            "path" => [
                "members",
                $this->id,
                "savedSearches"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteBoardBackground($idBackground)
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "members",
                $this->id,
                "boardBackgrounds",
                $idBackground
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function unstarBoard($idStar)
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "members",
                $this->id,
                "boardStars",
                $idStar
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteCustomBoardBackground($idBackground)
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "members",
                $this->id,
                "customBoardBackgrounds",
                $idBackground
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteCustomSticker($idSticker)
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "members",
                $this->id,
                "customStickers",
                $idSticker
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteSavedSearch($idSearch)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "members",
                $this->id,
                "savedSearches",
                $idSearch
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
