<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230618081821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE food_diaries (date DATE NOT NULL, PRIMARY KEY(date)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food_diary_items (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, food_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, amount INT NOT NULL, calorie DOUBLE PRECISION NOT NULL, protein DOUBLE PRECISION NOT NULL, fat DOUBLE PRECISION NOT NULL, carbohydrate DOUBLE PRECISION NOT NULL, INDEX IDX_1B79FA2AA9E377A (date), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE food_diary_items ADD CONSTRAINT FK_1B79FA2AA9E377A FOREIGN KEY (date) REFERENCES food_diaries (date)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE food_diary_items DROP FOREIGN KEY FK_1B79FA2AA9E377A');
        $this->addSql('DROP TABLE food_diaries');
        $this->addSql('DROP TABLE food_diary_items');
    }
}
