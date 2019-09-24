<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Services\Trello;
use GeekyAnts\TrelloService\Utils\Utils;
use   \Exception;

class CustomFieldService extends Trello
{

    function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->utils = new Utils();
    }

    function create($bodyParams)
    {
        try {
            if (!array_key_exists('idModel', $bodyParams)) {
                throw new Exception("idModel i.e. The ID of the model for which the Custom Field is being defined. This should always be the ID of a board, must be provided to create a Custom Field");
            }
            if (!array_key_exists('modelType', $bodyParams)) {
                throw new Exception("modelType i.e. The type of model that the Custom Field is being defined on. This should always be 'board', must be provided to create a Custom Field");
            }
            if (!array_key_exists('name', $bodyParams)) {
                throw new Exception("The name of custom field must br provided to create a Custom Field");
            }
            if (!array_key_exists('type', $bodyParams)) {
                throw new Exception("The type of custom field must br provided to create a Custom Field");
            }
            if (!array_key_exists('pos', $bodyParams)) {
                throw new Exception("The pos of custom field must br provided to create a Custom Field");
            }

            $requestOptions = [
                "requestMethod" => "POST",
                "path" => [
                    "customFields",
                ],
                "bodyParams" =>  $bodyParams,
            ];
            $res  = $this->sendRequest($requestOptions);
            $responseObj =  json_decode($res, true);
            $this->id = $responseObj["id"];

            return $res;
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }

    function updateCustomField($bodyParams)
    {
        $requestOptions = [
            "requestMethod" => "PUT",
            "path" => [
                "customFields",
                $this->id
            ],
            "bodyParams" =>  $bodyParams,
        ];

        $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetch($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "customFields",
                $this->id
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
                "customFields",
                $this->id
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchOptions($queryParams = [])
    {

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "options"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchOption($idCustomFieldOption, $queryParams = [])
    {
        if ($idCustomFieldOption == null || trim($idCustomFieldOption) == "") {
            return ["error" => "The id of custom feild option must be provided"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "options",
                $idCustomFieldOption
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function addOption($bodyParams)
    {
        $requestOptions = [
            "requestMethod" => "POST",
            "path" => [
                "customFields",
                $this->id,
                "options"
            ],
            "bodyParams" =>  $bodyParams,
        ];

        $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteOption($idCustomFieldOption)
    {
        if (!$this->utils->isNotEmpty($idCustomFieldOption)) {
            return ["error" => "Id of custom field option must be provided to delete"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "customFields",
                $this->id,
                "options",
                $idCustomFieldOption
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateCustomFieldOnCard($idCard, $bodyParams)
    {
        if (!$this->utils->isNotEmpty($idCard)) {
            return ["error" => "Id of card must be provided to update"];
        }

        if (!array_key_exists("value", $bodyParams)) {
            return ["error" => "Type should be present in body params"];
        }

        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "card",
                $idCard,
                "customField",
                $this->id,
                "item"
            ],
            "bodyParams" => $bodyParams
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchAllFromBoard($idBoard, $queryParams = [])
    {
        if (!$this->utils->isNotEmpty($idBoard)) {
            return ["error" => "Id of board must be provided to update"];
        }

        $requestOptions = [
            "requestMethod" => "GET",
            "path" => [
                "boards",
                $idBoard,
                "customFields"
            ],
            "queryParams" => $queryParams
        ];
        return $this->sendRequest($requestOptions);
    }

    function fetchField($field, $queryParams = [])
    {
        if ($field == null || trim($field) == "") {
            return ["error" => "Field must be provided"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
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
                "checklists",
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
                "checklists",
                $this->id,
                "cards"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItems($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "checkItems"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchCheckItem($idCheckItem, $queryParams = [])
    {
        if ($idCheckItem == null || trim($idCheckItem) == "") {
            return ["error" => "Id of checkItem must be provided"];
        }
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "checklists",
                $this->id,
                "checkItems",
                $idCheckItem
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
                "checklists",
                $this->id
            ],
            "queryParams" =>  $queryParams,
        ];

        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function updateName($queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "PUT",
            "path" => [
                "checklists",
                $this->id,
                "name"
            ],
            "queryParams" =>  $queryParams,
        ];

        if (!array_key_exists("value", $queryParams)) {
            return ["error" => "value should be present in query params"];
        }
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function deleteCheckItem($idCheckItem)
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "DELETE",
            "path" => [
                "checklists",
                $this->id,
                "checkItems",
                $idCheckItem
            ],
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }
}
