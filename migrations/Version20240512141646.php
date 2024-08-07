<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512141646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "service_category_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "service_category" (id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, position INT NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES "service_category" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E19D9AD212469DE2 ON service (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP TABLE service');
    }
}
