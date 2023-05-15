<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512115044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_reservation (user_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_EBD380C0A76ED395 (user_id), INDEX IDX_EBD380C0B83297E7 (reservation_id), PRIMARY KEY(user_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_reservation ADD CONSTRAINT FK_EBD380C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reservation ADD CONSTRAINT FK_EBD380C0B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_reservation DROP FOREIGN KEY FK_EBD380C0A76ED395');
        $this->addSql('ALTER TABLE user_reservation DROP FOREIGN KEY FK_EBD380C0B83297E7');
        $this->addSql('DROP TABLE user_reservation');
    }
}
