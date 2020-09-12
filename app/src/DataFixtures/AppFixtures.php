<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Quotes;
use App\Entity\QuotesType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const AUTHORS_COUNT = 4;
    const QUOTES_TYPES_COUNT = 10;
    const QUOTES_COUNT = 30;

    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->setManager($manager);

        $this->generateQuotesTypes(self::AUTHORS_COUNT);
        $this->generateAuthors(self::QUOTES_TYPES_COUNT);
        $this->getManager()->flush();

        $this->generateQuotes(self::QUOTES_COUNT);
        $this->getManager()->flush();
    }

    public function generateQuotesTypes(int $count) {
        for ($i = 0; $i < $count; $i++) {
            $type = new QuotesType();
            $type->setName('QT_name_' . $i);
            $this->getManager()->persist($type);
        }
    }

    public function generateAuthors(int $count) {
        for ($i = 0; $i < $count; $i++) {
            $author = new Author();
            $author->setFirstName('A_first_name_' . $i);
            $author->setLastName('A_last_name_' . $i);
            $this->getManager()->persist($author);
        }
    }

    public function generateQuotes(int $count) {
        $manager = $this->getManager();

        $typesRepository = $manager->getRepository(QuotesType::class);
        $types = $typesRepository->findAll();
        $typesMaxIndex = count($types) - 1;

        $authorRepository = $manager->getRepository(Author::class);
        $authors = $authorRepository->findAll();
        $authorsMaxIndex = count($authors) - 1;

        for ($i = 0; $i < $count; $i++) {
            $quote = new Quotes();
            $quote->setText('Q_text_' . $i);

            $typeIndex = random_int(0, $typesMaxIndex);
            $type = $types[$typeIndex];
            $quote->setTypeId($type);

            $authorIndex = random_int(0, $authorsMaxIndex);
            $author = $authors[$authorIndex];
            $quote->setAuthorId($author);

            $manager->persist($quote);
        }
    }

    public function setManager(ObjectManager $manager) {
        $this->manager = $manager;
    }

    public function getManager() : ObjectManager {
        return $this->manager;
    }
}
