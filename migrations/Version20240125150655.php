<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125150655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reissue_request CHANGE authorized_by authorized_by VARCHAR(255) DEFAULT NULL, CHANGE authorized_signature authorized_signature VARCHAR(255) DEFAULT NULL, CHANGE authorized_date authorized_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reissue_request CHANGE authorized_by authorized_by VARCHAR(255) NOT NULL, CHANGE authorized_signature authorized_signature VARCHAR(255) NOT NULL, CHANGE authorized_date authorized_date DATE NOT NULL');
    }
}
