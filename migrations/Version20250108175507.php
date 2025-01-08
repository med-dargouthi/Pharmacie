<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108175507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament DROP FOREIGN KEY FK_28E8D3F36715F256');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament DROP FOREIGN KEY FK_28E8D3F3AB0D61F7');
        $this->addSql('DROP TABLE ligne_bon_de_commande_medicament');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F79D86650F');
        $this->addSql('DROP INDEX IDX_27D963F79D86650F ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD user_id INT NOT NULL, CHANGE user_id_id medicament_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_27D963F7AB0D61F7 ON ligne_bon_de_commande (medicament_id)');
        $this->addSql('CREATE INDEX IDX_27D963F7A76ED395 ON ligne_bon_de_commande (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_bon_de_commande_medicament (ligne_bon_de_commande_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_28E8D3F3AB0D61F7 (medicament_id), INDEX IDX_28E8D3F36715F256 (ligne_bon_de_commande_id), PRIMARY KEY(ligne_bon_de_commande_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament ADD CONSTRAINT FK_28E8D3F36715F256 FOREIGN KEY (ligne_bon_de_commande_id) REFERENCES ligne_bon_de_commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament ADD CONSTRAINT FK_28E8D3F3AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7AB0D61F7');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7A76ED395');
        $this->addSql('DROP INDEX IDX_27D963F7AB0D61F7 ON ligne_bon_de_commande');
        $this->addSql('DROP INDEX IDX_27D963F7A76ED395 ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD user_id_id INT NOT NULL, DROP medicament_id, DROP user_id');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F79D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_27D963F79D86650F ON ligne_bon_de_commande (user_id_id)');
    }
}
