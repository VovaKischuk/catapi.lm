<?php

namespace App\Service;

use App\Transformer\ImageTransformer;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ImageService extends CatApiService
{
    public function geImageList(int $limit): array
    {
        try {
            $client = new Client([
                'base_uri' => 'https://api.thecatapi.com/v1/',
                'headers' => ['x-api-key' => $_ENV['CAT_API_KEY']]
            ]);

            $response = $client->request('GET', 'images/search?limit'.$limit);

            if ($this->isStatusCodeSuccessful($response->getStatusCode())) {
                return json_decode($response->getBody()->getContents()) ?? [];
            }
        } catch (Exception $e) {
            if ($e->getCode() == 0) {
                return [(object)[
                    'id' => 1,
                    'url' => 'https://cdn2.thecatapi.com/images/dd8.jpg',
                    'width' => 900,
                    'height' => 639
                ]];
            }
        }

        return [];
    }

    public function geImageById(string $id): mixed
    {
        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com/v1/',
            'headers' => ['x-api-key' => $_ENV['CAT_API_KEY']]
        ]);

        $response = $client->request('GET', 'images/'.$id);

        if ($this->isStatusCodeSuccessful($response->getStatusCode())) {
            return json_decode($response->getBody()->getContents());
        }

        return [];
    }

    public function getTransformer()
    {
        return new ImageTransformer();
    }
}