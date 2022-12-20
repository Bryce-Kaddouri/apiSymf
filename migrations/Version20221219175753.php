<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219175753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mat_prem ADD id_unite_id INT NOT NULL');
        $this->addSql('ALTER TABLE mat_prem ADD CONSTRAINT FK_3E3EA43ABC91983E FOREIGN KEY (id_unite_id) REFERENCES unite (id)');
        $this->addSql('CREATE INDEX IDX_3E3EA43ABC91983E ON mat_prem (id_unite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mat_prem DROP FOREIGN KEY FK_3E3EA43ABC91983E');
        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP INDEX IDX_3E3EA43ABC91983E ON mat_prem');
        $this->addSql('ALTER TABLE mat_prem DROP id_unite_id');
    }
}
