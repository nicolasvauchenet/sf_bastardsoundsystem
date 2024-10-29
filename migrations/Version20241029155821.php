<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241029155821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE engagement ADD promoter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE engagement ADD CONSTRAINT FK_D86F01414B84B276 FOREIGN KEY (promoter_id) REFERENCES promoter (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D86F01414B84B276 ON engagement (promoter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE engagement DROP CONSTRAINT FK_D86F01414B84B276');
        $this->addSql('DROP INDEX IDX_D86F01414B84B276');
        $this->addSql('ALTER TABLE engagement DROP promoter_id');
    }
}
