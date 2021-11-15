<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026104441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mere DROP supp_nutri, DROP motif_dgros, DROP nbre_cpn, DROP fer, DROP vitamine_d, DROP acidefolique, CHANGE date_accou1 date_accou1 VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mere ADD supp_nutri VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD motif_dgros VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD nbre_cpn VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD fer VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD vitamine_d VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD acidefolique VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_accou1 date_accou1 DATE DEFAULT NULL');
    }
}
