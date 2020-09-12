<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912095116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quotes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quotes_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quotes_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, author_id INT NOT NULL, type_id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quotes (id INT NOT NULL, author_id_id INT NOT NULL, type_id_id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A1B588C569CCBE9A ON quotes (author_id_id)');
        $this->addSql('CREATE INDEX IDX_A1B588C5714819A0 ON quotes (type_id_id)');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT FK_A1B588C569CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT FK_A1B588C5714819A0 FOREIGN KEY (type_id_id) REFERENCES quotes_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quotes DROP CONSTRAINT FK_A1B588C569CCBE9A');
        $this->addSql('ALTER TABLE quotes DROP CONSTRAINT FK_A1B588C5714819A0');
        $this->addSql('DROP SEQUENCE author_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quotes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quotes_type_id_seq CASCADE');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE quotes');
        $this->addSql('DROP TABLE quotes_type');
    }
}
