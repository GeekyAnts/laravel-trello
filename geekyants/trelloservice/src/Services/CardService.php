<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;

class CardService extends Trello
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
                "cards",
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
                "cards",
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
                "cards",
                $this->id,
                "actions"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAttachments($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "attachments"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAttachment($idAttachment,  $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "attachments",
                $idAttachment
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
                "cards",
                $this->id,
                "board"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItemStates($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "checkItemStates"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckLists($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "checklists"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItem($idCheckItem, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "checkItem",
                $idCheckItem
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
                "cards",
                $this->id,
                "customFieldItems"
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
                "cards",
                $this->id,
                "list"
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
                "cards",
                $this->id,
                "members"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchMembersVoted($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "membersVoted"
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
                "cards",
                $this->id,
                "pluginData"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchStickers($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "stickers"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchSticker($idSticker, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "cards",
                $this->id,
                "stickers",
                $idSticker
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
                "cards",
                $this->id,
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateComment($idAction, $queryParams = [])
    {
        if (!array_key_exists("Text", $queryParams) || !$this->utils->isNotEmpty($queryParams["Text"])) {
            return ["error" => "Text should be present in query params"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "cards",
                $this->id,
                "actions",
                $idAction,
                "comments"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateCheckItem($idCheckItem, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "cards",
                $this->id,
                "checkItem",
                $idCheckItem
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateCheckItemInCheckList($idCheckList, $idCheckItem, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "cards",
                $this->id,
                "checklist",
                $idCheckList,
                "checkItem",
                $idCheckItem
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateSticker($idSticker, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "cards",
                $this->id,
                "stickers",
                $idSticker
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function create($queryParams)
    {
        if (!array_key_exists("idList", $queryParams) || !$this->utils->isNotEmpty($queryParams["idList"])) {
            return ["error" => "idList should be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
            ],
            "queryParams" =>  $queryParams,
        ];

        $res  = $this->sendRequest($requestOptions);
        $responseObj =  json_decode($res, true);
        $this->id = $responseObj["id"];

        return $res;
    }

    function addComment($queryParams)
    {
        if (!array_key_exists("text", $queryParams) || !$this->utils->isNotEmpty($queryParams["text"])) {
            return ["error" => "text should be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "action",
                "comments"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addAttachment($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "attachments"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addChecklist($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "checklists"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addLabels($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "idLabels"
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addMembers($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "idMembers"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addNewLable($queryParams)
    {
        if (!array_key_exists("label", $queryParams) || !$this->utils->isNotEmpty($queryParams["label"])) {
            return ["error" => "label should be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "labels"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function markNotificationsRead($queryParams = [])
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "markAssociatedNotificationsRead"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function voteByMember($queryParams)
    {
        if (!array_key_exists("value", $queryParams) || !$this->utils->isNotEmpty($queryParams["value"])) {
            return ["error" => "value should be present in query params"];
        }
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "membersVoted"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addSticker($queryParams)
    {
        if (!array_key_exists("image", $queryParams) || !$this->utils->isNotEmpty($queryParams["image"])) {
            return ["error" => "image should be present in query params"];
        }

        if (!array_key_exists("top", $queryParams) || !$this->utils->isNotEmpty($queryParams["top"])) {
            return ["error" => "top should be present in query params"];
        }

        if (!array_key_exists("left", $queryParams) || !$this->utils->isNotEmpty($queryParams["left"])) {
            return ["error" => "left should be present in query params"];
        }

        if (!array_key_exists("zIndex", $queryParams) || !$this->utils->isNotEmpty($queryParams["zIndex"])) {
            return ["error" => "zIndex should be present in query params"];
        }

        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "cards",
                $this->id,
                "stickers"
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
                "cards",
                $this->id,
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteComment($idAction)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "actions",
                $idAction,
                "comments"
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteAttachment($idAttachment)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "attachments",
                $idAttachment
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteCheckItem($idCheckItem)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "checkItem",
                $idCheckItem
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteChecklist($idChecklist)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "checklists",
                $idChecklist
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeLabel($idLabel)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "idLabel",
                $idLabel
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
                "cards",
                $this->id,
                "idMembers",
                $idMember
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeMemberVote($idMember)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "membersVoted",
                $idMember
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function removeSticker($idSticker)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "cards",
                $this->id,
                "stickers",
                $idSticker
            ]
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
