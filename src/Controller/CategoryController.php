<?php

namespace App\Controller;

use App\Response\ApiResponse;
use App\Response\Collection;
use App\Service\CategoryService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/category')]
class CategoryController extends AbstractController
{
    #[Route(path: '', name: 'posts_list', methods: [Request::METHOD_GET])]
    public function listAction(CategoryService $service): Response
    {
        $categories = $service->getCategoryList();

        $resource = new Collection($categories, $service->getTransformer());

        return ApiResponse::collection($resource);
    }
}