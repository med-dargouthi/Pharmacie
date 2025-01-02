<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102200122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ordonnance (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, ligne_medicament_id INT DEFAULT NULL, date_emission DATE NOT NULL, INDEX IDX_924B326C99DED506 (id_client_id), INDEX IDX_924B326C4F31A84 (medecin_id), INDEX IDX_924B326CA06E6096 (ligne_medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C99DED506 FOREIGN KEY (id_client_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CA06E6096 FOREIGN KEY (ligne_medicament_id) REFERENCES ligne_medicament (id)');
        $this->addSql('DROP TABLE x');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE x (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C99DED506');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C4F31A84');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CA06E6096');
        $this->addSql('DROP TABLE ordonnance');
    }
}
