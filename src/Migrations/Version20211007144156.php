<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007144156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE enfant ADD meres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2F04EE6 FOREIGN KEY (meres_id) REFERENCES mere (id)');
        $this->addSql('CREATE INDEX IDX_34B70CA2F04EE6 ON enfant (meres_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2F04EE6');
        $this->addSql('DROP INDEX IDX_34B70CA2F04EE6 ON enfant');
        $this->addSql('ALTER TABLE enfant DROP meres_id');
    }
}
