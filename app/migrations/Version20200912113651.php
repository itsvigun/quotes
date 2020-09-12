<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912113651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotes DROP CONSTRAINT fk_a1b588c5714819a0');
        $this->addSql('DROP SEQUENCE quotes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quotes_type_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quote_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quote_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quote (id INT NOT NULL, author_id_id INT NOT NULL, type_id_id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B71CBF469CCBE9A ON quote (author_id_id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4714819A0 ON quote (type_id_id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF469CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4714819A0 FOREIGN KEY (type_id_id) REFERENCES quote_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE quotes_type');
        $this->addSql('DROP TABLE quotes');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4714819A0');
        $this->addSql('DROP SEQUENCE quote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quote_type_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE quotes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quotes_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE quotes_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quotes (id INT NOT NULL, author_id_id INT NOT NULL, type_id_id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_a1b588c569ccbe9a ON quotes (author_id_id)');
        $this->addSql('CREATE INDEX idx_a1b588c5714819a0 ON quotes (type_id_id)');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT fk_a1b588c569ccbe9a FOREIGN KEY (author_id_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quotes ADD CONSTRAINT fk_a1b588c5714819a0 FOREIGN KEY (type_id_id) REFERENCES quotes_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE quote_type');
    }
}
