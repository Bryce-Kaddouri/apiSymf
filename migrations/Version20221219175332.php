<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219175332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, tx_tva NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, adr_rue VARCHAR(255) NOT NULL, adr_cp VARCHAR(5) NOT NULL, adr_ville VARCHAR(50) NOT NULL, num_tel VARCHAR(10) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mat_prem (id INT AUTO_INCREMENT NOT NULL, id_fournisseur_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, quantite INT NOT NULL, prix_ht NUMERIC(10, 2) NOT NULL, INDEX IDX_3E3EA43A5A6AC879 (id_fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mat_prem ADD CONSTRAINT FK_3E3EA43A5A6AC879 FOREIGN KEY (id_fournisseur_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mat_prem DROP FOREIGN KEY FK_3E3EA43A5A6AC879');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE mat_prem');
    }
}
