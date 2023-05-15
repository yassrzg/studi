<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505110300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant_hours CHANGE open_hours open_hours TIME DEFAULT NULL, CHANGE close_hours close_hours TIME DEFAULT NULL, CHANGE open_hours_soir open_hours_soir TIME DEFAULT NULL, CHANGE close_hours_soir close_hours_soir TIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant_hours CHANGE open_hours open_hours TIME NOT NULL, CHANGE close_hours close_hours TIME NOT NULL, CHANGE open_hours_soir open_hours_soir TIME NOT NULL, CHANGE close_hours_soir close_hours_soir TIME NOT NULL');
    }
}
