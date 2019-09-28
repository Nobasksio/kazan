<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190928202129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, rest_id INT DEFAULT NULL, arrival_time INT NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), INDEX IDX_F52993987D8D3163 (rest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_cat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_rest TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_basket (id INT AUTO_INCREMENT NOT NULL, order_entity_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_E1C940AE3DA206A5 (order_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE train_route (id INT AUTO_INCREMENT NOT NULL, train_id INT DEFAULT NULL, station_id INT DEFAULT NULL, arrival_time INT NOT NULL, departure_time INT NOT NULL, INDEX IDX_B1CBB1B123BCD4D0 (train_id), INDEX IDX_B1CBB1B121BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rest_worktime (id INT AUTO_INCREMENT NOT NULL, rest_id INT DEFAULT NULL, station_id INT DEFAULT NULL, weekday INT NOT NULL, time_from INT NOT NULL, time_to INT NOT NULL, INDEX IDX_6D1702A87D8D3163 (rest_id), INDEX IDX_6D1702A821BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rest_user (rest_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FBF0850C7D8D3163 (rest_id), INDEX IDX_FBF0850CA76ED395 (user_id), PRIMARY KEY(rest_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rest_station (rest_id INT NOT NULL, station_id INT NOT NULL, INDEX IDX_AC4589997D8D3163 (rest_id), INDEX IDX_AC45899921BDB235 (station_id), PRIMARY KEY(rest_id, station_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rest_kitchen_type (rest_id INT NOT NULL, kitchen_type_id INT NOT NULL, INDEX IDX_E7D50F267D8D3163 (rest_id), INDEX IDX_E7D50F26D14D6881 (kitchen_type_id), PRIMARY KEY(rest_id, kitchen_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE name (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993987D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id)');
        $this->addSql('ALTER TABLE order_basket ADD CONSTRAINT FK_E1C940AE3DA206A5 FOREIGN KEY (order_entity_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE train_route ADD CONSTRAINT FK_B1CBB1B123BCD4D0 FOREIGN KEY (train_id) REFERENCES train (id)');
        $this->addSql('ALTER TABLE train_route ADD CONSTRAINT FK_B1CBB1B121BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE rest_worktime ADD CONSTRAINT FK_6D1702A87D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id)');
        $this->addSql('ALTER TABLE rest_worktime ADD CONSTRAINT FK_6D1702A821BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE rest_user ADD CONSTRAINT FK_FBF0850C7D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rest_user ADD CONSTRAINT FK_FBF0850CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rest_station ADD CONSTRAINT FK_AC4589997D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rest_station ADD CONSTRAINT FK_AC45899921BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rest_kitchen_type ADD CONSTRAINT FK_E7D50F267D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rest_kitchen_type ADD CONSTRAINT FK_E7D50F26D14D6881 FOREIGN KEY (kitchen_type_id) REFERENCES kitchen_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7D8D3163 FOREIGN KEY (rest_id) REFERENCES rest (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADD14D6881 FOREIGN KEY (kitchen_type_id) REFERENCES kitchen_type (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD84D1E8E7 FOREIGN KEY (product_cat_id) REFERENCES product_cat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_basket DROP FOREIGN KEY FK_E1C940AE3DA206A5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD84D1E8E7');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE rest_user DROP FOREIGN KEY FK_FBF0850CA76ED395');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7D8D3163');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993987D8D3163');
        $this->addSql('ALTER TABLE rest_worktime DROP FOREIGN KEY FK_6D1702A87D8D3163');
        $this->addSql('ALTER TABLE rest_user DROP FOREIGN KEY FK_FBF0850C7D8D3163');
        $this->addSql('ALTER TABLE rest_station DROP FOREIGN KEY FK_AC4589997D8D3163');
        $this->addSql('ALTER TABLE rest_kitchen_type DROP FOREIGN KEY FK_E7D50F267D8D3163');
        $this->addSql('ALTER TABLE train_route DROP FOREIGN KEY FK_B1CBB1B121BDB235');
        $this->addSql('ALTER TABLE rest_worktime DROP FOREIGN KEY FK_6D1702A821BDB235');
        $this->addSql('ALTER TABLE rest_station DROP FOREIGN KEY FK_AC45899921BDB235');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product_cat');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE order_basket');
        $this->addSql('DROP TABLE train_route');
        $this->addSql('DROP TABLE rest_worktime');
        $this->addSql('DROP TABLE rest');
        $this->addSql('DROP TABLE rest_user');
        $this->addSql('DROP TABLE rest_station');
        $this->addSql('DROP TABLE rest_kitchen_type');
        $this->addSql('DROP TABLE name');
        $this->addSql('DROP TABLE station');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADD14D6881');
    }
}
