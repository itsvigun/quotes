<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QuoteController extends AbstractController
{
    private $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository, SerializerInterface $serializer)
    {
        $this->quoteRepository = $quoteRepository;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/quote/{id}", name="get_one_quote", methods={"GET"})
     */
    public function getOne($id): JsonResponse
    {
        $quote = $this->quoteRepository->findOneBy(['id' => $id]);

        $data = $this->serializer->serialize(
            $quote,
            'json',
            ['groups' => 'quote_one']
        );

        return JsonResponse::fromJsonString($data, Response::HTTP_OK);
    }

}
