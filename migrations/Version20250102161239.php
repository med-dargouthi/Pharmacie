<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102161239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE x (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7D29E677C FOREIGN KEY (bon_de_commande_id) REFERENCES bon_de_commande (id)');
        $this->addSql('ALTER TABLE ligne_medicament_medicament ADD CONSTRAINT FK_10C93A18A06E6096 FOREIGN KEY (ligne_medicament_id) REFERENCES ligne_medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_medicament_medicament ADD CONSTRAINT FK_10C93A18AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C99DED506 FOREIGN KEY (id_client_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CA06E6096 FOREIGN KEY (ligne_medicament_id) REFERENCES ligne_medicament (id)');
        $this->addSql('ALTER TABLE recu ADD CONSTRAINT FK_C0D1031799DED506 FOREIGN KEY (id_client_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE recu_ligne_medicament ADD CONSTRAINT FK_75D56F25A5D1C184 FOREIGN KEY (recu_id) REFERENCES recu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recu_ligne_medicament ADD CONSTRAINT FK_75D56F25A06E6096 FOREIGN KEY (ligne_medicament_id) REFERENCES ligne_medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD bon_de_commande_id INT DEFAULT NULL, ADD nom VARCHAR(30) NOT NULL, ADD prenom VARCHAR(30) NOT NULL, ADD num_tel VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D29E677C FOREIGN KEY (bon_de_commande_id) REFERENCES bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D29E677C ON user (bon_de_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE x');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7D29E677C');
        $this->addSql('ALTER TABLE ligne_medicament_medicament DROP FOREIGN KEY FK_10C93A18A06E6096');
        $this->addSql('ALTER TABLE ligne_medicament_medicament DROP FOREIGN KEY FK_10C93A18AB0D61F7');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C99DED506');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C4F31A84');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CA06E6096');
        $this->addSql('ALTER TABLE recu DROP FOREIGN KEY FK_C0D1031799DED506');
        $this->addSql('ALTER TABLE recu_ligne_medicament DROP FOREIGN KEY FK_75D56F25A5D1C184');
        $this->addSql('ALTER TABLE recu_ligne_medicament DROP FOREIGN KEY FK_75D56F25A06E6096');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D29E677C');
        $this->addSql('DROP INDEX IDX_8D93D649D29E677C ON `user`');
        $this->addSql('ALTER TABLE `user` DROP bon_de_commande_id, DROP nom, DROP prenom, DROP num_tel');
    }
}
