<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104175339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reissue_request (id INT AUTO_INCREMENT NOT NULL, reason VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, id_number VARCHAR(255) NOT NULL, gift_card_number VARCHAR(255) NOT NULL, original_issuing_store VARCHAR(255) NOT NULL, date_of_purchase DATE NOT NULL, time_of_purchase TIME NOT NULL, value_loaded_on_card VARCHAR(255) NOT NULL, further_details VARCHAR(1000) NOT NULL, requested_by VARCHAR(255) NOT NULL, requested_by_signature VARCHAR(255) NOT NULL, requested_date DATE NOT NULL, authorized_by VARCHAR(255) NOT NULL, authorized_signature VARCHAR(255) NOT NULL, authorized_date DATE NOT NULL, new_evoucher_reference VARCHAR(255) NOT NULL, new_evoucher_date DATE NOT NULL, card_linked_to VARCHAR(255) NOT NULL, delivered_to VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reissue_request');
        $this->addSql('DROP TABLE messenger_messages');
    }
}