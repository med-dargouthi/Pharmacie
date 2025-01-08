<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108131601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_bon_de_commande_medicament (ligne_bon_de_commande_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_28E8D3F36715F256 (ligne_bon_de_commande_id), INDEX IDX_28E8D3F3AB0D61F7 (medicament_id), PRIMARY KEY(ligne_bon_de_commande_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament ADD CONSTRAINT FK_28E8D3F36715F256 FOREIGN KEY (ligne_bon_de_commande_id) REFERENCES ligne_bon_de_commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament ADD CONSTRAINT FK_28E8D3F3AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bon_de_commande ADD ligne_commande_id INT DEFAULT NULL, ADD date DATE DEFAULT NULL, ADD status VARCHAR(15) NOT NULL, DROP num_tel');
        $this->addSql('ALTER TABLE bon_de_commande ADD CONSTRAINT FK_2C3802E4E10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_2C3802E4E10FEE63 ON bon_de_commande (ligne_commande_id)');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F7D29E677C');
        $this->addSql('DROP INDEX IDX_27D963F7D29E677C ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD quantite INT NOT NULL, DROP bon_de_commande_id, DROP nom, DROP email, CHANGE num_tel user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F79D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_27D963F79D86650F ON ligne_bon_de_commande (user_id_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D29E677C');
        $this->addSql('DROP INDEX IDX_8D93D649D29E677C ON user');
        $this->addSql('ALTER TABLE user DROP bon_de_commande_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament DROP FOREIGN KEY FK_28E8D3F36715F256');
        $this->addSql('ALTER TABLE ligne_bon_de_commande_medicament DROP FOREIGN KEY FK_28E8D3F3AB0D61F7');
        $this->addSql('DROP TABLE ligne_bon_de_commande_medicament');
        $this->addSql('ALTER TABLE bon_de_commande DROP FOREIGN KEY FK_2C3802E4E10FEE63');
        $this->addSql('DROP INDEX IDX_2C3802E4E10FEE63 ON bon_de_commande');
        $this->addSql('ALTER TABLE bon_de_commande ADD num_tel INT NOT NULL, DROP ligne_commande_id, DROP date, DROP status');
        $this->addSql('ALTER TABLE ligne_bon_de_commande DROP FOREIGN KEY FK_27D963F79D86650F');
        $this->addSql('DROP INDEX IDX_27D963F79D86650F ON ligne_bon_de_commande');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD bon_de_commande_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD email VARCHAR(20) NOT NULL, ADD num_tel INT NOT NULL, DROP user_id_id, DROP quantite');
        $this->addSql('ALTER TABLE ligne_bon_de_commande ADD CONSTRAINT FK_27D963F7D29E677C FOREIGN KEY (bon_de_commande_id) REFERENCES bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_27D963F7D29E677C ON ligne_bon_de_commande (bon_de_commande_id)');
        $this->addSql('ALTER TABLE `user` ADD bon_de_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D29E677C FOREIGN KEY (bon_de_commande_id) REFERENCES bon_de_commande (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D29E677C ON `user` (bon_de_commande_id)');
    }
}
