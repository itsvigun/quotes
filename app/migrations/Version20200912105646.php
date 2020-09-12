<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912105646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotes_type DROP author_id');
        $this->addSql('ALTER TABLE quotes_type DROP type_id');
        $this->addSql('ALTER TABLE quotes_type DROP text');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quotes_type ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE quotes_type ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE quotes_type ADD text VARCHAR(255) NOT NULL');
    }
}
