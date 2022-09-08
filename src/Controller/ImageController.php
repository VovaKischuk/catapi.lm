<?php

namespace App\Controller;

use App\Response\ApiResponse;
use App\Response\Collection;
use App\Response\Item;
use App\Service\ImageService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/images')]
class ImageController extends AbstractController
{
    #[Route(path: '', name: 'images_list', methods: [Request::METHOD_GET])]
    public function listAction(ImageService $service, Request $request): Response
    {
        $limit = $request->query->get('limit', 10);
        $image = $service->geImageList($limit);

        $resource = new Collection($image, $service->getTransformer());

        return ApiResponse::collection($resource);
    }

    #[Route(path: '/{id}', name: 'get_image', methods: [Request::METHOD_GET])]
    public function readAction(string $id, ImageService $service): Response
    {
        $image = $service->geImageById($id);

        $resource = new Item($image, $service->getTransformer());

        return ApiResponse::item($resource);
    }
}