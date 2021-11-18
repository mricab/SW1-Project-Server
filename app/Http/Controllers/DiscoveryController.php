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

    public function EnvironmentsCreate(Request $request)
    {
        $endpoint = self::$url . "/v1/environments" . self::$ver;

        $data = [
            "name" => "my-first-environment",
            "description" => "exploring environments",
        ];

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint, $data);

        return $response->collect();
    }

    static public function EnvironmentsList()
    {
        $endpoint = self::$url
            . "/v1/environments"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    /* Single Environment */

    static public function EnvironmentStatus(Request $request)
    {
        $id = $request->input('env_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $id
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    static public function EnvironmentUpdate(Request $request)
    {
        $environmentId = $request->input('env_id');
        $name = $request->input('name');
        $description = $request->input('description');

        $data = [
            'name' => $name,
            'description' => $description,
        ];

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId
            . "?version=" . self::$ver;

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->put($endpoint, $data);

        return $response->collect();
    }

    static public function EnvironmentDelete(Request $request)
    {
        $environmentId = $request->input('env_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->collect();
    }

    static public function EnvironmentFields(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionIds = $request->input('collection_ids');

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/fields"
            . "?" . "collection_ids=" . $collectionIds
            . "&version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    /* Configurations */

    static public function ConfigurationsList(Request $request)
    {
        $id = $request->input('env_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $id . "/configurations"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    static public function ConfigurationsDetail(Request $request)
    {
        $environmentId = $request->input('env_id');
        $configurationId = $request->input('config_id');

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/configurations" . "/" . $configurationId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    /* Collections */

    public function CollectionsCreate(Request $request)
    {
        $environmentId = $request->input('env_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $configurationId = $request->input('conf_id');
        $language = $request->input('language');

        $data = [
            'name' => $name,
            'description' => $description,
            'configuration_id' => $configurationId,
            'language' => $language,
        ];

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "?version=" . self::$ver;

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint, $data);

        return $response->collect();
    }

    static public function CollectionsList(Request $request)
    {
        $environmentId = $request->input('env_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    /* Single Collection */

    static public function CollectionDetails(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "/" . $collectionId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    static public function CollectionFields(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "/" . $collectionId
            . "/fields"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    static public function CollectionUpdate(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $configurationId = $request->input('conf_id');

        $data = [
            'name' => $name,
            'description' => $description,
            'configuration_id' => $configurationId,
        ];

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "?version=" . self::$ver;

        $response = Http::withHeaders(self::$headers)
            ->withBasicAuth("apikey", self::$key)
            ->put($endpoint, $data);

        return $response->collect();
    }

    static public function CollectionDelete(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "/" . $collectionId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->collect();
    }

    /* Documents*/

    static public function DocumentsUpload(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $file = $request->file('document');

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "/" . $collectionId . "/documents"
            . "?version=" . self::$ver;

        $response = Http::attach(
                'file',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName())
            ->withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->collect();
    }

    static public function DocumentsDetails(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $documentId = $request->input('doc_id');

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents" . "/" . $documentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    static public function DocumentsUpdate(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $documentId = $request->input('doc_id');
        $file = $request->file('document');

        $endpoint = self::$url . "/v1"
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

        return $response->collect();
    }

    static public function DocumentsDelete(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $documentId = $request->input('doc_id');

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/documents" . "/" . $documentId
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->delete($endpoint);

        return $response->collect();
    }

    /* Queries */

    public function QueriesShort(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $queryString =$request->input('query');

        $endpoint = self::$url . "/v1"
            . "/environments" . "/" . $environmentId
            . "/collections" . "/" . $collectionId
            . "/query"
            . "?version=" . self::$ver
            . "&" . $queryString;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->get($endpoint);

        return $response->collect();
    }

    public function QueriesLong(Request $request)
    {
        $environmentId = $request->input('env_id');
        $collectionId = $request->input('coll_id');
        $queryString =$request->input('query');

        $data = [
            'query' => $queryString,
        ];

        $endpoint = self::$url . "/v1/environments"
            . "/" . $environmentId . "/collections"
            . "/" . $collectionId . "/query"
            . "?version=" . self::$ver;

        $response = Http::withBasicAuth("apikey", self::$key)
            ->post($endpoint);

        return $response->collect();
    }
}
