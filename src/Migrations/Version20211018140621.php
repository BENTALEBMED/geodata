<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018140621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cercle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE centre_soin');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE centre_soin (id INT AUTO_INCREMENT NOT NULL, communes_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_947D53925969B77A (communes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE centre_soin ADD CONSTRAINT FK_947D53925969B77A FOREIGN KEY (communes_id) REFERENCES douar (id)');
        $this->addSql('DROP TABLE cercle');
    }
}
