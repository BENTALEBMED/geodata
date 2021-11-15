<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018164344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE centre_soin CHANGE commune commune VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE mere CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE centre_soin CHANGE commune commune VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE mere CHANGE nom nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
