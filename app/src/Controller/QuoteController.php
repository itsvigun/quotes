<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    /**
     * @Route("/quote/{id}", name="delete_quote", methods={"DELETE"})
     */
    public function deleteOne($id): JsonResponse
    {
        $customer = $this->quoteRepository->findOneBy(['id' => $id]);
        $this->quoteRepository->remove($customer);

        return new JsonResponse(['status' => 'Quote deleted'], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/quote", name="add_quote", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $authorId = $data['author_id'] ?? null;
        $typeId = $data['type_id'] ?? null;
        $text = $data['text'] ?? null;

        if (empty($authorId) || empty($typeId) || empty($text)) {
            throw new NotFoundHttpException('Not enough parameters');
        }

        $this->quoteRepository->saveQuote($authorId, $typeId, $text);

        return new JsonResponse(['status' => 'Quote created'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/quote/{id}", name="edit_quote", methods={"PUT"})
     */
    public function edit($id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $authorId = $data['author_id'] ?? null;
        $typeId = $data['type_id'] ?? null;
        $text = $data['text'] ?? null;

        $quote = $this->quoteRepository->editQuote($id, $authorId, $typeId, $text);

        $data = $this->serializer->serialize(
            $quote,
            'json',
            ['groups' => 'quote_one']
        );

        return JsonResponse::fromJsonString($data, Response::HTTP_OK);
    }
}
