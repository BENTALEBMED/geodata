<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211009141523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mere ADD tel VARCHAR(255) DEFAULT NULL, ADD nbre_cpn VARCHAR(255) NOT NULL, ADD fer VARCHAR(255) DEFAULT NULL, ADD vitamine_d VARCHAR(255) DEFAULT NULL, ADD acidefolique VARCHAR(255) DEFAULT NULL, DROP date_accou2, DROP date_accou3, DROP date_accou4, DROP date_accou5, DROP date_accou6, DROP date_accou7, DROP date_accou8, DROP date_accou9, DROP date_accou10');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mere ADD date_accou2 DATE DEFAULT NULL, ADD date_accou3 DATE DEFAULT NULL, ADD date_accou4 DATE DEFAULT NULL, ADD date_accou5 DATE DEFAULT NULL, ADD date_accou6 DATE DEFAULT NULL, ADD date_accou7 DATE DEFAULT NULL, ADD date_accou8 DATE DEFAULT NULL, ADD date_accou9 DATE DEFAULT NULL, ADD date_accou10 DATE DEFAULT NULL, DROP tel, DROP nbre_cpn, DROP fer, DROP vitamine_d, DROP acidefolique');
    }
}
