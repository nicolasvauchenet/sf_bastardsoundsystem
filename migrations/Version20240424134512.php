<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424134512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "service_category_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "service_category" (id INT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF3A42FC727ACA70 ON "service_category" (parent_id)');
        $this->addSql('ALTER TABLE "service_category" ADD CONSTRAINT FK_FF3A42FC727ACA70 FOREIGN KEY (parent_id) REFERENCES "service_category" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "service_category_id_seq" CASCADE');
        $this->addSql('ALTER TABLE "service_category" DROP CONSTRAINT FK_FF3A42FC727ACA70');
        $this->addSql('DROP TABLE "service_category"');
    }
}
