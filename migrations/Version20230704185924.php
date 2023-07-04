<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704185924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, car_category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_FE38F84478C4629E (car_category_id), INDEX IDX_FE38F844A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, belonging_id INT DEFAULT NULL, nb_seats INT NOT NULL, nb_doors INT NOT NULL, name VARCHAR(255) NOT NULL, cost DOUBLE PRECISION NOT NULL, picture_url VARCHAR(255) NOT NULL, INDEX IDX_773DE69D6B4620CD (belonging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F84478C4629E FOREIGN KEY (car_category_id) REFERENCES car_category (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D6B4620CD FOREIGN KEY (belonging_id) REFERENCES car_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F84478C4629E');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844A76ED395');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D6B4620CD');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_category');
        $this->addSql('DROP TABLE user');
    }
}
