<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522093207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caroussel (id INT AUTO_INCREMENT NOT NULL, btn_title VARCHAR(255) NOT NULL, illustration VARCHAR(255) NOT NULL, btn_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE footer (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(5000) DEFAULT NULL, cgu VARCHAR(1000) DEFAULT NULL, cgu_image VARCHAR(255) DEFAULT NULL, description_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nos_produits DROP slug');
        $this->addSql('ALTER TABLE reservation ADD note VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE caroussel');
        $this->addSql('DROP TABLE footer');
        $this->addSql('ALTER TABLE nos_produits ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation DROP note');
    }
}
