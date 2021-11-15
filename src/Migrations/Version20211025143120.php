<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025143120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE centre_soin DROP commune');
        $this->addSql('ALTER TABLE cercle ADD centre_soin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cercle ADD CONSTRAINT FK_1147887827F4AA2C FOREIGN KEY (centre_soin_id) REFERENCES centre_soin (id)');
        $this->addSql('CREATE INDEX IDX_1147887827F4AA2C ON cercle (centre_soin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE centre_soin ADD commune VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE cercle DROP FOREIGN KEY FK_1147887827F4AA2C');
        $this->addSql('DROP INDEX IDX_1147887827F4AA2C ON cercle');
        $this->addSql('ALTER TABLE cercle DROP centre_soin_id');
    }
}
