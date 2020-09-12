<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends AbstractController
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * @Route("/authors/", name="add_customer", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $authors = $this->authorRepository->findAll();

        $data = [];

        foreach ($authors as $author) {
            $data[] = [
                'id' => $author->getId(),
                'firstName' => $author->getFirstName(),
                'lastName' => $author->getLastName(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
