<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241029132449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partner_occupation_specialty (id SERIAL NOT NULL, partner_id INT NOT NULL, occupation_id INT NOT NULL, specialty_id INT DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B2CF46749393F8FE ON partner_occupation_specialty (partner_id)');
        $this->addSql('CREATE INDEX IDX_B2CF467422C8FC20 ON partner_occupation_specialty (occupation_id)');
        $this->addSql('CREATE INDEX IDX_B2CF46749A353316 ON partner_occupation_specialty (specialty_id)');
        $this->addSql('ALTER TABLE partner_occupation_specialty ADD CONSTRAINT FK_B2CF46749393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partner_occupation_specialty ADD CONSTRAINT FK_B2CF467422C8FC20 FOREIGN KEY (occupation_id) REFERENCES occupation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partner_occupation_specialty ADD CONSTRAINT FK_B2CF46749A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE partner_occupation_specialty DROP CONSTRAINT FK_B2CF46749393F8FE');
        $this->addSql('ALTER TABLE partner_occupation_specialty DROP CONSTRAINT FK_B2CF467422C8FC20');
        $this->addSql('ALTER TABLE partner_occupation_specialty DROP CONSTRAINT FK_B2CF46749A353316');
        $this->addSql('DROP TABLE partner_occupation_specialty');
    }
}
