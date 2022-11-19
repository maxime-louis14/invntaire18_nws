<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118193406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consigne ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE consigne ADD CONSTRAINT FK_72406DAF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_72406DAF347EFB ON consigne (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consigne DROP FOREIGN KEY FK_72406DAF347EFB');
        $this->addSql('DROP INDEX IDX_72406DAF347EFB ON consigne');
        $this->addSql('ALTER TABLE consigne DROP produit_id');
    }
}
