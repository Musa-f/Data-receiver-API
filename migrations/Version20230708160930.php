<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230708160930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO comptes_comptables (id, intitule_compte) VALUES
            (602, "Achats stockés - Autres approvisionnements"),
            (603, "Variation des stocks"),
            (604, "Achat d’études et prestations de services"),
            (605, "Achat de matériel, équipement et travaux"),
            (606, "Achats non stockés de matières et fournitures"),
            (607, "Achats de marchandises"),
            (608, "Frais accessoires d’achat"),
            (701, "Ventes de produits finis - Marchandises"),
            (702, "Ventes de produits finis - Produits fabriqués"),
            (703, "Ventes de produits finis - Produits intermédiaires"),
            (704, "Ventes de produits finis - Travaux"),
            (705, "Prestations de services - Services vendus"),
            (706, "Prestations de services - Travaux"),
            (707, "Redevances, droits et valeurs similaires"),
            (708, "Produits annexes")'
            );


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
