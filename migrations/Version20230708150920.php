<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230708150920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecritures ADD compte_id INT NOT NULL');
        $this->addSql('ALTER TABLE ecritures ADD CONSTRAINT FK_2CD5FD76F2C56620 FOREIGN KEY (compte_id) REFERENCES comptes_comptables (id)');
        $this->addSql('CREATE INDEX IDX_2CD5FD76F2C56620 ON ecritures (compte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecritures DROP FOREIGN KEY FK_2CD5FD76F2C56620');
        $this->addSql('DROP INDEX IDX_2CD5FD76F2C56620 ON ecritures');
        $this->addSql('ALTER TABLE ecritures DROP compte_id');
    }
}
