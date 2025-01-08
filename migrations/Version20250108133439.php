<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108133439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_de_commande DROP FOREIGN KEY FK_2C3802E4E10FEE63');
        $this->addSql('DROP INDEX IDX_2C3802E4E10FEE63 ON bon_de_commande');
        $this->addSql('ALTER TABLE bon_de_commande DROP ligne_commande_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bon_de_commande ADD ligne_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bon_de_commande ADD CONSTRAINT FK_2C3802E4E10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_2C3802E4E10FEE63 ON bon_de_commande (ligne_commande_id)');
    }
}
