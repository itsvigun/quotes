<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class AuthorController extends AbstractController
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * @Route("/authors", name="get_authors", methods={"GET"})
     */
    public function getAll(SerializerInterface $serializer): JsonResponse
    {
        $authors = $this->authorRepository->findAll();

        $data = $serializer->serialize(
            $authors,
            'json',
            ['groups' => 'list_authors']
        );

        return JsonResponse::fromJsonString($data, Response::HTTP_OK);
    }
}
