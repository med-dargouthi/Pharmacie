<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108165641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD bon_de_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7D29E677C FOREIGN KEY (bon_de_commande_id) REFERENCES bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_27D963F7D29E677C ON ligne_bon_de_commande (bon_de_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7D29E677C');
        $this->addSql('DROP INDEX IDX_27D963F7D29E677C ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP bon_de_commande_id');
    }
}
