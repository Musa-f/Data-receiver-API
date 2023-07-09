<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230708150710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comptes_comptables (id INT AUTO_INCREMENT NOT NULL, intitule_compte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecritures (id INT AUTO_INCREMENT NOT NULL, id_journal_id INT NOT NULL, id_piece INT NOT NULL, debit DOUBLE PRECISION DEFAULT NULL, credit DOUBLE PRECISION DEFAULT NULL, date_ecriture DATETIME DEFAULT NULL, INDEX IDX_2CD5FD76E20408D5 (id_journal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journaux (id INT AUTO_INCREMENT NOT NULL, code_journal VARCHAR(5) NOT NULL, intitule_journal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ecritures ADD CONSTRAINT FK_2CD5FD76E20408D5 FOREIGN KEY (id_journal_id) REFERENCES journaux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecritures DROP FOREIGN KEY FK_2CD5FD76E20408D5');
        $this->addSql('DROP TABLE comptes_comptables');
        $this->addSql('DROP TABLE ecritures');
        $this->addSql('DROP TABLE journaux');
    }
}
