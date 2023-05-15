<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511113940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD couvert_restant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955633A828 FOREIGN KEY (couvert_restant_id) REFERENCES restaurant_hours (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955633A828 ON reservation (couvert_restant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955633A828');
        $this->addSql('DROP INDEX UNIQ_42C84955633A828 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP couvert_restant_id');
    }
}
