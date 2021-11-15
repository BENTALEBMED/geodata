<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025160545 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE douar DROP FOREIGN KEY FK_59022188131A4F72');
        $this->addSql('DROP INDEX IDX_59022188131A4F72 ON douar');
        $this->addSql('ALTER TABLE douar CHANGE commune_id cercle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE douar ADD CONSTRAINT FK_5902218827413AB9 FOREIGN KEY (cercle_id) REFERENCES cercle (id)');
        $this->addSql('CREATE INDEX IDX_5902218827413AB9 ON douar (cercle_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE douar DROP FOREIGN KEY FK_5902218827413AB9');
        $this->addSql('DROP INDEX IDX_5902218827413AB9 ON douar');
        $this->addSql('ALTER TABLE douar CHANGE cercle_id commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE douar ADD CONSTRAINT FK_59022188131A4F72 FOREIGN KEY (commune_id) REFERENCES cercle (id)');
        $this->addSql('CREATE INDEX IDX_59022188131A4F72 ON douar (commune_id)');
    }
}
