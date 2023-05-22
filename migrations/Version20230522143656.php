<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522143656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caroussel (id INT AUTO_INCREMENT NOT NULL, btn_title VARCHAR(255) NOT NULL, illustration VARCHAR(255) NOT NULL, btn_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creneaux (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, date DATETIME NOT NULL, nombre_couvert INT NOT NULL, nombre_couvert_restant INT NOT NULL, UNIQUE INDEX UNIQ_77F13C6DB83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creset_password (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_ECB3695FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE footer (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(5000) DEFAULT NULL, cgu VARCHAR(1000) DEFAULT NULL, cgu_image VARCHAR(255) DEFAULT NULL, description_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nos_produits (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, menu_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, illustration VARCHAR(255) DEFAULT NULL, subtitle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, titre_illustration VARCHAR(255) DEFAULT NULL, best_menu TINYINT(1) NOT NULL, INDEX IDX_1200AB5E12469DE2 (category_id), INDEX IDX_1200AB5ECCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, couvert_restant_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, couverts INT NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, allergie LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', lastname VARCHAR(255) NOT NULL, note VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_42C84955633A828 (couvert_restant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant_hours (id INT AUTO_INCREMENT NOT NULL, jours VARCHAR(255) NOT NULL, open_hours TIME DEFAULT NULL, close_hours TIME DEFAULT NULL, open_hours_soir TIME DEFAULT NULL, close_hours_soir TIME DEFAULT NULL, intervalle_horaire INT NOT NULL, nombre_couvert_max INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, allergie VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_allergie (user_id INT NOT NULL, allergie_id INT NOT NULL, INDEX IDX_FE557A4AA76ED395 (user_id), INDEX IDX_FE557A4A7C86304A (allergie_id), PRIMARY KEY(user_id, allergie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_reservation (user_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_EBD380C0A76ED395 (user_id), INDEX IDX_EBD380C0B83297E7 (reservation_id), PRIMARY KEY(user_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creneaux ADD CONSTRAINT FK_77F13C6DB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE creset_password ADD CONSTRAINT FK_ECB3695FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE nos_produits ADD CONSTRAINT FK_1200AB5E12469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE nos_produits ADD CONSTRAINT FK_1200AB5ECCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955633A828 FOREIGN KEY (couvert_restant_id) REFERENCES restaurant_hours (id)');
        $this->addSql('ALTER TABLE user_allergie ADD CONSTRAINT FK_FE557A4AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_allergie ADD CONSTRAINT FK_FE557A4A7C86304A FOREIGN KEY (allergie_id) REFERENCES allergie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reservation ADD CONSTRAINT FK_EBD380C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reservation ADD CONSTRAINT FK_EBD380C0B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneaux DROP FOREIGN KEY FK_77F13C6DB83297E7');
        $this->addSql('ALTER TABLE creset_password DROP FOREIGN KEY FK_ECB3695FA76ED395');
        $this->addSql('ALTER TABLE nos_produits DROP FOREIGN KEY FK_1200AB5E12469DE2');
        $this->addSql('ALTER TABLE nos_produits DROP FOREIGN KEY FK_1200AB5ECCD7E912');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955633A828');
        $this->addSql('ALTER TABLE user_allergie DROP FOREIGN KEY FK_FE557A4AA76ED395');
        $this->addSql('ALTER TABLE user_allergie DROP FOREIGN KEY FK_FE557A4A7C86304A');
        $this->addSql('ALTER TABLE user_reservation DROP FOREIGN KEY FK_EBD380C0A76ED395');
        $this->addSql('ALTER TABLE user_reservation DROP FOREIGN KEY FK_EBD380C0B83297E7');
        $this->addSql('DROP TABLE allergie');
        $this->addSql('DROP TABLE caroussel');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE creneaux');
        $this->addSql('DROP TABLE creset_password');
        $this->addSql('DROP TABLE footer');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE nos_produits');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE restaurant_hours');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_allergie');
        $this->addSql('DROP TABLE user_reservation');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
