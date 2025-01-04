<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102214348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_medicament_medicament DROP FOREIGN KEY FK_10C93A18A06E6096');
        $this->addSql('ALTER TABLE ligne_medicament_medicament DROP FOREIGN KEY FK_10C93A18AB0D61F7');
        $this->addSql('DROP TABLE ligne_medicament_medicament');
        $this->addSql('ALTER TABLE ligne_medicament ADD medicament_id INT NOT NULL, CHANGE num_ligne num_ligne INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_medicament ADD CONSTRAINT FK_79309C27AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('CREATE INDEX IDX_79309C27AB0D61F7 ON ligne_medicament (medicament_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_medicament_medicament (ligne_medicament_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_10C93A18A06E6096 (ligne_medicament_id), INDEX IDX_10C93A18AB0D61F7 (medicament_id), PRIMARY KEY(ligne_medicament_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_medicament_medicament ADD CONSTRAINT FK_10C93A18A06E6096 FOREIGN KEY (ligne_medicament_id) REFERENCES ligne_medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_medicament_medicament ADD CONSTRAINT FK_10C93A18AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_medicament DROP FOREIGN KEY FK_79309C27AB0D61F7');
        $this->addSql('DROP INDEX IDX_79309C27AB0D61F7 ON ligne_medicament');
        $this->addSql('ALTER TABLE ligne_medicament DROP medicament_id, CHANGE num_ligne num_ligne INT NOT NULL');
    }
}
