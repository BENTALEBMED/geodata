<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007142703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, age INT DEFAULT NULL, nbre_accou INT NOT NULL, date_accou1 DATE DEFAULT NULL, date_accou2 DATE DEFAULT NULL, date_accou3 DATE DEFAULT NULL, date_accou4 DATE DEFAULT NULL, date_accou5 DATE DEFAULT NULL, date_accou6 DATE DEFAULT NULL, date_accou7 DATE DEFAULT NULL, date_accou8 DATE DEFAULT NULL, date_accou9 DATE DEFAULT NULL, date_accou10 DATE DEFAULT NULL, supp_nutri VARCHAR(255) DEFAULT NULL, motif_dgros VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mere');
    }
}
