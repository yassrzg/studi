<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504110001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergie DROP FOREIGN KEY FK_1ED89E4AA76ED395');
        $this->addSql('DROP INDEX IDX_1ED89E4AA76ED395 ON allergie');
        $this->addSql('ALTER TABLE allergie DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allergie ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE allergie ADD CONSTRAINT FK_1ED89E4AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1ED89E4AA76ED395 ON allergie (user_id)');
    }
}
