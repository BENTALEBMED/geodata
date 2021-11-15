<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111171351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basedonnee (id INT AUTO_INCREMENT NOT NULL, cerecle VARCHAR(100) NOT NULL, commune VARCHAR(100) NOT NULL, centre_de_soin VARCHAR(255) NOT NULL, date_de_mesures DATE NOT NULL, smi VARCHAR(100) DEFAULT NULL, nom_enfant VARCHAR(100) NOT NULL, prenom_enfant VARCHAR(100) NOT NULL, sexe VARCHAR(20) NOT NULL, douar VARCHAR(100) NOT NULL, date_naissance_enfant DATE NOT NULL, age INT NOT NULL, poids DOUBLE PRECISION NOT NULL, taille DOUBLE PRECISION NOT NULL, imc DOUBLE PRECISION DEFAULT NULL, retard_croissance VARCHAR(100) NOT NULL, prise_vitamined_pend_6mois VARCHAR(100) DEFAULT NULL, prise_vitaminea_pend_6mois VARCHAR(100) DEFAULT NULL, prise_fer_pend_6mois VARCHAR(100) DEFAULT NULL, nom_parent VARCHAR(100) DEFAULT NULL, prenom_parent VARCHAR(100) DEFAULT NULL, tel_parent VARCHAR(100) DEFAULT NULL, date_naissance_mere VARCHAR(100) DEFAULT NULL, cpn INT DEFAULT NULL, prise_fer_pend_grossesse VARCHAR(255) DEFAULT NULL, prisevitamine_d VARCHAR(100) NOT NULL, priseacidefolique VARCHAR(100) DEFAULT NULL, motif_danger VARCHAR(255) DEFAULT NULL, accouchement_enfanta VARCHAR(255) DEFAULT NULL, duree_allaitement VARCHAR(255) DEFAULT NULL, dateprecedentenaissance VARCHAR(255) DEFAULT NULL, aliments_avant_6moisa VARCHAR(255) DEFAULT NULL, setutilisauseindumenage VARCHAR(255) DEFAULT NULL, part_farine_traditionnelle VARCHAR(255) DEFAULT NULL, part_farine_industrielle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE migration_versions');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE basedonnee');
    }
}
