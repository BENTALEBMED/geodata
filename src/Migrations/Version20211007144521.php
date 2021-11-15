<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007144521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation ADD enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id)');
        $this->addSql('CREATE INDEX IDX_964685A6450D2529 ON consultation (enfant_id)');
        $this->addSql('ALTER TABLE enfant ADD douars_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2F02DF59D FOREIGN KEY (douars_id) REFERENCES douar (id)');
        $this->addSql('CREATE INDEX IDX_34B70CA2F02DF59D ON enfant (douars_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6450D2529');
        $this->addSql('DROP INDEX IDX_964685A6450D2529 ON consultation');
        $this->addSql('ALTER TABLE consultation DROP enfant_id');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2F02DF59D');
        $this->addSql('DROP INDEX IDX_34B70CA2F02DF59D ON enfant');
        $this->addSql('ALTER TABLE enfant DROP douars_id');
    }
}
