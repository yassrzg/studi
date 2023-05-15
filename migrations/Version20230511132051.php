<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511132051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creneaux (id INT AUTO_INCREMENT NOT NULL, creneau_id INT DEFAULT NULL, nombre_couvert_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_77F13C6D7D0729A9 (creneau_id), UNIQUE INDEX UNIQ_77F13C6D6A6DBE8A (nombre_couvert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6D7D0729A9 FOREIGN KEY (creneau_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6D6A6DBE8A FOREIGN KEY (nombre_couvert_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6D7D0729A9');
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6D6A6DBE8A');
        $this->addSql('DROP TABLE creneaux');
    }
}
