<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108190047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7AB0D61F7');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_27D963F7A76ED395 ON ligne_bon_de_commande (user_id)');
        $this->addSql('DROP INDEX fk_27d963f7ab0d61f7 ON ligne_bon_de_commande');
        $this->addSql('CREATE INDEX IDX_27D963F7AB0D61F7 ON ligne_bon_de_commande (medicament_id)');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7A76ED395');
        $this->addSql('DROP INDEX IDX_27D963F7A76ED395 ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7AB0D61F7');
        $this->addSql('DROP INDEX idx_27d963f7ab0d61f7 ON ligne_bon_de_commande');
        $this->addSql('CREATE INDEX FK_27D963F7AB0D61F7 ON ligne_bon_de_commande (medicament_id)');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
    }
}
