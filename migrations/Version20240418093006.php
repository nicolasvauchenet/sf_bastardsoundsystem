<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418093006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE partenariat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE partenariat (id INT NOT NULL, partenaire_type VARCHAR(255) NOT NULL, partenaire_name VARCHAR(255) NOT NULL, partenaire_email VARCHAR(255) NOT NULL, partenaire_phone VARCHAR(255) DEFAULT NULL, partenaire_message TEXT DEFAULT NULL, sent_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, rejected_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN partenariat.sent_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN partenariat.accepted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN partenariat.rejected_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE partenariat_id_seq CASCADE');
        $this->addSql('DROP TABLE partenariat');
    }
}
