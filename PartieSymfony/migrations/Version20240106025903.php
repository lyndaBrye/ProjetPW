<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106025903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, licencie_id_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, est_administrateur TINYINT(1) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_763C012278EEB1EF (licencie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT NOT NULL, contact_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_licencie VARCHAR(255) NOT NULL, INDEX IDX_3B7556128A3C7387 (categorie_id_id), INDEX IDX_3B755612526E8E58 (contact_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C012278EEB1EF FOREIGN KEY (licencie_id_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556128A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educateur DROP FOREIGN KEY FK_763C012278EEB1EF');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556128A3C7387');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612526E8E58');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE licencie');
    }
}
