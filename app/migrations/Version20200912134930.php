<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912134930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT fk_6b71cbf469ccbe9a');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT fk_6b71cbf4714819a0');
        $this->addSql('DROP INDEX idx_6b71cbf469ccbe9a');
        $this->addSql('DROP INDEX idx_6b71cbf4714819a0');
        $this->addSql('ALTER TABLE quote DROP author_id_id');
        $this->addSql('ALTER TABLE quote DROP type_id_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quote ADD author_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE quote ADD type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT fk_6b71cbf469ccbe9a FOREIGN KEY (author_id_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT fk_6b71cbf4714819a0 FOREIGN KEY (type_id_id) REFERENCES quote_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_6b71cbf469ccbe9a ON quote (author_id_id)');
        $this->addSql('CREATE INDEX idx_6b71cbf4714819a0 ON quote (type_id_id)');
    }
}
