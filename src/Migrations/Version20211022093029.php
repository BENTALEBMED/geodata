<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022093029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE standards (id INT AUTO_INCREMENT NOT NULL, `year_month` VARCHAR(5) NOT NULL, sexe VARCHAR(1) NOT NULL, month INT NOT NULL, l INT NOT NULL, m VARCHAR(8) NOT NULL, s VARCHAR(7) NOT NULL, sd VARCHAR(6) NOT NULL, n3sd VARCHAR(4) NOT NULL, n2sd VARCHAR(5) NOT NULL, n1sd VARCHAR(5) NOT NULL, median VARCHAR(5) NOT NULL, p1sd VARCHAR(5) NOT NULL, p2sd VARCHAR(5) NOT NULL, p3sd VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE standards');
    }
}
