<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190929061738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_entity ADD station_id INT DEFAULT NULL, ADD train_id INT NOT NULL, ADD delivery_time INT NOT NULL, ADD phone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE order_entity ADD CONSTRAINT FK_CDA754BD21BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_CDA754BD21BDB235 ON order_entity (station_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_entity DROP FOREIGN KEY FK_CDA754BD21BDB235');
        $this->addSql('DROP INDEX IDX_CDA754BD21BDB235 ON order_entity');
        $this->addSql('ALTER TABLE order_entity DROP station_id, DROP train_id, DROP delivery_time, DROP phone');
    }
}
