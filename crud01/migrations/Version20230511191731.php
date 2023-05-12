<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511191731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD paymentrecord_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939823FB7204 FOREIGN KEY (paymentrecord_id) REFERENCES payment_record (id)');
        $this->addSql('CREATE INDEX IDX_F529939823FB7204 ON `order` (paymentrecord_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939823FB7204');
        $this->addSql('DROP INDEX IDX_F529939823FB7204 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP paymentrecord_id');
    }
}
