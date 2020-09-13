<?php

namespace App\Controller;

use App\Repository\QuoteTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QuotesTypeController extends AbstractController
{
    private $quoteTypeRepository;

    public function __construct(QuoteTypeRepository $quoteTypeRepository)
    {
        $this->quoteTypeRepository = $quoteTypeRepository;
    }

    /**
     * @Route("/quote-types", name="get_quoute_types", methods={"GET"})
     */
    public function getAll(SerializerInterface $serializer): JsonResponse
    {
        $quoteTypes = $this->quoteTypeRepository->findAll();

        $data = $serializer->serialize(
            $quoteTypes,
            'json',
            ['groups' => 'list_quote_types']
        );

        return JsonResponse::fromJsonString($data, Response::HTTP_OK);
    }
}
