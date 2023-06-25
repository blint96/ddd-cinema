<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230624105113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add basic database schema';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
          CREATE TABLE `reservation` (
            `id` int NOT NULL,
            `showing_id` int NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
          
          CREATE TABLE `reservation_seat` (
            `id` int NOT NULL,
            `reservation_id` int NOT NULL,
            `seat` int NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
          
          CREATE TABLE `showing` (
            `id` int NOT NULL,
            `title` varchar(128) NOT NULL,
            `start` int NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
          
          ALTER TABLE `reservation`
            ADD PRIMARY KEY (`id`),
            ADD KEY `showing_id` (`showing_id`);
          
          ALTER TABLE `reservation_seat`
            ADD PRIMARY KEY (`id`),
            ADD KEY `reservation_id` (`reservation_id`);
          
          ALTER TABLE `showing`
            ADD PRIMARY KEY (`id`);
          
          ALTER TABLE `reservation`
            MODIFY `id` int NOT NULL AUTO_INCREMENT;
          
          ALTER TABLE `reservation_seat`
            MODIFY `id` int NOT NULL AUTO_INCREMENT;
          
          ALTER TABLE `showing`
            MODIFY `id` int NOT NULL AUTO_INCREMENT;
          
          ALTER TABLE `reservation`
            ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`showing_id`) REFERENCES `showing` (`id`) ON DELETE CASCADE;
          
          ALTER TABLE `reservation_seat`
            ADD CONSTRAINT `reservation_seat_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
        ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
