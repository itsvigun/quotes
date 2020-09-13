<?php

namespace App\Repository;

use App\Entity\Author;
use App\Entity\Quote;
use App\Entity\QuoteType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Quote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quote[]    findAll()
 * @method Quote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuoteRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Quote::class);
        $this->manager = $manager;
    }

    public function remove(Quote $quote)
    {
        $this->manager->remove($quote);
        $this->manager->flush();
    }

    public function saveQuote($authorId, $typeId, $text)
    {
        $quote = new Quote();
        $author = $this->manager->getRepository(Author::class)->getAuthor($authorId);
        $type = $this->manager->getRepository(QuoteType::class)->getType($typeId);

        $quote->setAuthor($author)
            ->setType($type)
            ->setText($text);

        $this->manager->persist($quote);
        $this->manager->flush();
    }

    public function editQuote($quoteId, $authorId, $typeId, $text)
    {
        $quote = $this->findOneBy(['id' => $quoteId]);
        if (!$quote) {
            throw new NotFoundHttpException('Quote is not found');
        }

        if ($authorId) {
            $author = $this->manager->getRepository(Author::class)->getAuthor($authorId);
            $quote->setAuthor($author);
        }
        if ($typeId) {
            $type = $this->manager->getRepository(QuoteType::class)->getType($typeId);
            $quote->setType($type);
        }
        if ($text) {
            $quote->setText($text);
        }

        $this->manager->persist($quote);
        $this->manager->flush();

        return $quote;
    }
}
