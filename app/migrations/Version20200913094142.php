<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200913094142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quote_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quote (id INT NOT NULL, author_id INT DEFAULT NULL, type_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B71CBF4F675F31B ON quote (author_id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4C54C8C93 ON quote (type_id)');
        $this->addSql('CREATE TABLE quote_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4C54C8C93 FOREIGN KEY (type_id) REFERENCES quote_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4F675F31B');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4C54C8C93');
        $this->addSql('DROP SEQUENCE author_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quote_type_id_seq CASCADE');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE quote_type');
    }
}
