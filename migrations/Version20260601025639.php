<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260601025639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lot (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, uuid VARCHAR(36) NOT NULL, brand VARCHAR(100) NOT NULL, model VARCHAR(100) NOT NULL, year INTEGER NOT NULL, mileage INTEGER NOT NULL, auction_name VARCHAR(100) NOT NULL, lot_number INTEGER NOT NULL, start_price INTEGER NOT NULL, end_price INTEGER NOT NULL, sale_status VARCHAR(50) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lot');
    }
}
