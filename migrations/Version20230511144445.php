<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511144445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6D6A6DBE8A');
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6D7D0729A9');
        $this->addSql('DROP INDEX UNIQ_77F13C6D6A6DBE8A ON creneaux');
        $this->addSql('DROP INDEX UNIQ_77F13C6D7D0729A9 ON creneaux');
        $this->addSql('ALTER TABLE creneaux ADD reservation_id INT DEFAULT NULL, ADD date DATETIME NOT NULL, ADD nombre_couvert INT NOT NULL, DROP creneau_id, DROP nombre_couvert_id');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6DB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77F13C6DB83297E7 ON creneaux (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6DB83297E7');
        $this->addSql('DROP INDEX UNIQ_77F13C6DB83297E7 ON creneaux');
        $this->addSql('ALTER TABLE creneaux ADD nombre_couvert_id INT DEFAULT NULL, DROP date, DROP nombre_couvert, CHANGE reservation_id creneau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6D6A6DBE8A FOREIGN KEY (nombre_couvert_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6D7D0729A9 FOREIGN KEY (creneau_id) REFERENCES reservation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77F13C6D6A6DBE8A ON creneaux (nombre_couvert_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77F13C6D7D0729A9 ON creneaux (creneau_id)');
    }
}
