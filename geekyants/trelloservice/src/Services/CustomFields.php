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
            if (!array_key_exists("idModel", $bodyParams)) {
            throw new Exception("idModel should be present in query params");
            }
            if (!array_key_exists('modelType', $bodyParams)) {
                throw new Exception("modelType should be present in query params");
            }
            if (!array_key_exists('name', $bodyParams)) {
                throw new Exception("name should be present in query params");
            }
            if (!array_key_exists('type', $bodyParams)) {
                throw new Exception("type should be present in query params");
            }
            if (!array_key_exists('pos', $bodyParams)) {
                throw new Exception("pos should be present in query params");
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

    function updateCustomField($bodyParams = [])
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
                "customFields",
                $this->id,
                "options"
            ],
            "queryParams" =>  $queryParams,
        ];
        return $this->verifyIdThenSendRequest($requestOptions);
    }

    function fetchOption($idCustomFieldOption, $queryParams = [])
    {
        $requestOptions = [
            "id" => $this->id,
            "requestMethod" => "GET",
            "path" => [
                "customFields",
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
}
