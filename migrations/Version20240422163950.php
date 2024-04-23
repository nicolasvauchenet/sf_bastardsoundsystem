<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422163950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cotisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cotisation (id INT NOT NULL, adherent_id INT NOT NULL, status VARCHAR(255) NOT NULL, paid_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, next_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, reminded INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AE64D2ED25F06C53 ON cotisation (adherent_id)');
        $this->addSql('COMMENT ON COLUMN cotisation.paid_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN cotisation.next_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cotisation_id_seq CASCADE');
        $this->addSql('ALTER TABLE cotisation DROP CONSTRAINT FK_AE64D2ED25F06C53');
        $this->addSql('DROP TABLE cotisation');
    }
}
