<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106002859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Migration for MailEdu entity'; // Mettez une description significative ici
    }

    public function up(Schema $schema): void
    {
        // Créez la table mail_edu
        $this->addSql('CREATE TABLE mail_edu (
            id INT AUTO_INCREMENT NOT NULL,
            date_envoi DATETIME DEFAULT NULL,
            objet VARCHAR(255) DEFAULT NULL,
            expediteur_id INT DEFAULT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Ajoutez une clé étrangère pour la relation avec la table educateurs
        $this->addSql('ALTER TABLE mail_edu ADD CONSTRAINT FK_123456891abcdef FOREIGN KEY (expediteur_id) REFERENCES educateurs (id)');

        // Créez la table de relation mail_edu_educateur
        $this->addSql('CREATE TABLE mail_edu_educateur (
            mail_edu_id INT NOT NULL,
            educateurs_id INT NOT NULL,
            INDEX IDX_987654321fedcba (mail_edu_id),
            INDEX IDX_123456789abcdef (educateurs_id),
            PRIMARY KEY(mail_edu_id, educateurs_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Ajoutez des clés étrangères pour la relation avec la table mail_edu et la table educateurs
        $this->addSql('ALTER TABLE mail_edu_educateur ADD CONSTRAINT FK_98765431fedcba FOREIGN KEY (mail_edu_id) REFERENCES mail_edu (id) ON DELETE CASCADE ');
        $this->addSql('ALTER TABLE mail_edu_educateur ADD CONSTRAINT FK_12345639abcdef FOREIGN KEY (educateurs_id) REFERENCES educateurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // Supprimez les tables en cas de rollback
        $this->addSql('DROP TABLE mail_edu_educateur');
        $this->addSql('DROP TABLE mail_edu');
    }
}
