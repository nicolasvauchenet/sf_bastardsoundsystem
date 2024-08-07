<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512112007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, parent_id INT DEFAULT NULL, sender_type VARCHAR(255) DEFAULT NULL, sender_name VARCHAR(255) NOT NULL, sender_email VARCHAR(255) NOT NULL, sender_phone VARCHAR(255) DEFAULT NULL, subject VARCHAR(255) NOT NULL, message TEXT NOT NULL, sent_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, answered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C62E638727ACA70 ON contact (parent_id)');
        $this->addSql('COMMENT ON COLUMN contact.sent_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN contact.answered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638727ACA70 FOREIGN KEY (parent_id) REFERENCES contact (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('ALTER TABLE contact DROP CONSTRAINT FK_4C62E638727ACA70');
        $this->addSql('DROP TABLE contact');
    }
}
