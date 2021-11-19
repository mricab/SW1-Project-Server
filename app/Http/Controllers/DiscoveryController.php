<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscoveryController extends Controller
{

    static public $key = "wpRoeBdA2LAWbL2pO63kz-VuyEv5dmQqzu9HmdXQJgV9";
    static public $url = "https://api.eu-gb.discovery.watson.cloud.ibm.com/instances/c7acce6c-eff5-4d1f-835e-9384aff54378";
    static public $ver = "2019-04-30";
    static public $headers = [
                            'Content-Type' => 'application/json'
                        ];

    /* Environments */

    static public function EnvironmentsCreate(string $name, string $description)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments"
            . "?version=" . self::$ver;

        $data = [
            "name" => $name,
            "description" => $description,
        ];

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint, $data);

        return $response->json();
    }

    static public function EnvironmentsList()
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    /* Single Environment */

    static public function EnvironmentStatus(string $environmentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function EnvironmentUpdate(string $environmentId, string $name, string $description)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "?version=" . self::$ver;

        $data = [
            'name' => $name,
            'description' => $description,
        ];

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->put($endpoint, $data);

        return $response->json();
    }

    static public function EnvironmentDelete(string $environmentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->json();
    }

    static public function EnvironmentFields(string $environmentId, array $collectionIds)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/fields"
            . "?" . "collection_ids=" . implode(",", $collectionIds)
            . "&version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    /* Configurations */

    static public function ConfigurationsCreate()
    {
        // To do
    }

    static public function ConfigurationsList(string $environmentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/configurations"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    /* Configuration */

    static public function ConfigurationDetails(string $environmentId, string $configurationId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/configurations" . "/" . $configurationId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function ConfigurationUpdate()
    {
        // To do
    }

    static public function ConfigurationDelete(string $environmentId, string $configurationId)
    {
        $endpoint = self::$url
        . "/v1"
        . "/environments" . "/" . $environmentId
        . "/configurations" . "/" . $configurationId
        . "?version=" . self::$ver;

    $response = Http::withBasicAuth("apikey", self::$key)
        ->delete($endpoint);

    return $response->json();
    }

    /* Collections */

    public function CollectionsCreate(string $environmentId, string $configurationId, string $name, string $description, string $language)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections"
            . "?version=" . self::$ver;

        $data = [
            'name' => $name,
            'description' => $description,
            'configuration_id' => $configurationId,
            'language' => $language,
        ];

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint, $data);

        return $response->json();
    }

    static public function CollectionsList(string $environmentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    /* Query (Multiple Collections) */

    static public function CollectionsQueryShort(string $environmentId, array $collectionIds, string $queryString)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/query"
            . "?" . "collection_ids=" . implode(",", $collectionIds)
            . "?version=" . self::$ver
            . "&" . "query=" . $queryString;


        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function CollectionsQueryLong(string $environmentId, array $collectionIds, string $queryString)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/query"
            . "?" . "collection_ids=" . implode(",", $collectionIds)
            . "?version=" . self::$ver;

        $data = [
            'query' => $queryString,
        ];

        $response = Http::withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }

    static public function CollectionsNotices(string $environmentId, array $collectionIds)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/notices"
            . "?" . "collection_ids=" . implode(",", $collectionIds)
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }

    /* Single Collection */

    static public function CollectionDetails(string $environmentId, string $collectionId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function CollectionFields(string $environmentId, string $collectionId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/fields"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function CollectionUpdate(string $environmentId, string $configurationId, string $collectionId, string $name, string $description)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "?version=" . self::$ver;

        $data = [
            'name' => $name,
            'description' => $description,
            'configuration_id' => $configurationId,
        ];

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->put($endpoint, $data);

        return $response->json();
    }

    static public function CollectionDelete(string $environmentId, string $collectionId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->json();
    }

    /* Documents*/

    static public function DocumentsUpload(string $environmentId, string $collectionId, $file)
    {
        //$file = $request->file('document');

        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents"
            . "?version=" . self::$ver;

        $response = Http::attach(
                'file',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName())
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }

    static public function DocumentsDetails(string $environmentId, string $collectionId, string $documentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents" . "/" . $documentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function DocumentsUpdate(string $environmentId, string $collectionId, string $documentId, $file)
    {
        //$file = $request->file('document');

        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents" . "/" . $documentId
            . "?version=" . self::$ver;

        $response = Http::attach(
                'file',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName())
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }

    static public function DocumentsDelete(string $environmentId, string $collectionId, string $documentId)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents" . "/" . $documentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->json();
    }

    /* Queries (Collection) */

    static public function CollectionQueryShort(string $environmentId, string $collectionId, string $queryString)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/query"
            . "?version=" . self::$ver
            . "&" . $queryString;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->json();
    }

    static public function CollectionQueryLong(string $environmentId, string $collectionId, string $queryString)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/query"
            . "?version=" . self::$ver;

        $data = [
            'query' => $queryString,
        ];

        $response = Http::withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }

    static public function CollectionNotices(string $environmentId, array $collectionIds)
    {
        $endpoint = self::$url
            . "/v1"
            . "/environments" . "/" . $environmentId
            . "/notices"
            . "?" . "collection_ids=" . implode(",", $collectionIds)
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->json();
    }
}
