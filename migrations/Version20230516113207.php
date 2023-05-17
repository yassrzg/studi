<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230516113207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nos_produits ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nos_produits ADD CONSTRAINT FK_1200AB5ECCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_1200AB5ECCD7E912 ON nos_produits (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nos_produits DROP FOREIGN KEY FK_1200AB5ECCD7E912');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP INDEX IDX_1200AB5ECCD7E912 ON nos_produits');
        $this->addSql('ALTER TABLE nos_produits DROP menu_id');
    }
}
