<?php

namespace GeekyAnts\TrelloService\Services;

use GeekyAnts\TrelloService\Utils\Utils;
use   \GuzzleHttp\Client;
use \Exception;

class Trello
{
    protected $keyToken;

    function __construct()
    {
        $this->keyToken = ["key" => config("trello.trello_key"), "token" => config("trello.trello_token")];
        $this->client = new Client();
    }

    function sendRequest($requestObject)
    {
        $url = 'https://api.trello.com/1';

        foreach ($requestObject["path"] as $path) {
            if ($path) {
                $url .= "/" . $path;
            }
        }
        $utils = new Utils();
        $requestOptions = [];
        $requestOptions["query"] = $this->keyToken;

        if (array_key_exists("queryParams", $requestObject) && $requestObject["queryParams"]) {
            $extraParams = $utils->trelloNomenclatureOf($requestObject["queryParams"]);
            $requestOptions["query"] = array_merge($requestOptions["query"], $extraParams);
        }

        if (in_array($requestObject["requestMethod"], ['PUT', 'POST', 'PATCH']) && array_key_exists("bodyParams", $requestObject) && $requestObject["bodyParams"]) {
            $requestOptions["body"] = $utils->trelloNomenclatureOf($requestObject["bodyParams"]);
        }

        if (array_key_exists("headers", $requestObject) && $requestObject["headers"]) {
            $requestOptions["header"] = $utils->trelloNomenclatureOf($requestObject["headers"]);
        }

        $requestOptions["query"] = array_merge($requestOptions["query"], $this->keyToken);

        $trelloResponse = $this->client->request($requestObject["requestMethod"], $url, $requestOptions);
        if ($trelloResponse->getStatusCode() == 200) {
            return $trelloResponse->getBody();
        }
    }


    function verifyIdThenSendRequest($requestOptions)
    {
        try {
            if (!$this->utils->isNotEmpty($requestOptions["id"])) {
                throw new Exception("Board Id cant be empty");
            }
            return $this->sendRequest($requestOptions);
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }

    function verifyIdAndFieldThenSendRequest($requestOptions, $field, $validFields)
    {
        try {
            if (!$this->utils->isNotEmpty($requestOptions["id"])) {
                throw new Exception("Id cant be empty");
            }
            if (!$this->utils->fieldValidator($field, $validFields)) {
                throw new Exception("field shoulld be one of" . $validFields);
            }
            return $this->sendRequest($requestOptions);
        } catch (Exception $ex) {
            return ["error" => $ex->getMessage()];
        }
    }
}
