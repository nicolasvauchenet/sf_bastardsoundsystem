<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241026091131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE specialty_partner (specialty_id INT NOT NULL, partner_id INT NOT NULL, PRIMARY KEY(specialty_id, partner_id))');
        $this->addSql('CREATE INDEX IDX_431E22899A353316 ON specialty_partner (specialty_id)');
        $this->addSql('CREATE INDEX IDX_431E22899393F8FE ON specialty_partner (partner_id)');
        $this->addSql('ALTER TABLE specialty_partner ADD CONSTRAINT FK_431E22899A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE specialty_partner ADD CONSTRAINT FK_431E22899393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE partner DROP specialties');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE specialty_partner DROP CONSTRAINT FK_431E22899A353316');
        $this->addSql('ALTER TABLE specialty_partner DROP CONSTRAINT FK_431E22899393F8FE');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP TABLE specialty_partner');
        $this->addSql('ALTER TABLE partner ADD specialties VARCHAR(255) DEFAULT NULL');
    }
}
