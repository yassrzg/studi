<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515105900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_allergie DROP FOREIGN KEY FK_836D7C5EB83297E7');
        $this->addSql('ALTER TABLE reservation_allergie DROP FOREIGN KEY FK_836D7C5E7C86304A');
        $this->addSql('DROP TABLE reservation_allergie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_allergie (reservation_id INT NOT NULL, allergie_id INT NOT NULL, INDEX IDX_836D7C5EB83297E7 (reservation_id), INDEX IDX_836D7C5E7C86304A (allergie_id), PRIMARY KEY(reservation_id, allergie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_allergie ADD CONSTRAINT FK_836D7C5EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_allergie ADD CONSTRAINT FK_836D7C5E7C86304A FOREIGN KEY (allergie_id) REFERENCES allergie (id) ON DELETE CASCADE');
    }
}
