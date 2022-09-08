<?php

namespace App\Service;

use App\Transformer\CategoryTransformer;
use GuzzleHttp\Client;

class CategoryService extends CatApiService
{
    public function getCategoryList(): array
    {
        $client = new Client(['base_uri' => 'https://api.thecatapi.com/v1/']);
        $response = $client->request('GET', 'categories');

        if ($this->isStatusCodeSuccessful($response->getStatusCode())) {
            return json_decode($response->getBody()->getContents()) ?? [];
        }

        return [];
    }

    public function getTransformer()
    {
        return new CategoryTransformer();
    }
}