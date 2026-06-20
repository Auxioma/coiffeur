<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260620211655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_security_token ALTER token_hash TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE user_security_token ALTER token_type TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE user_security_token ALTER destination TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_security_token ALTER token_hash TYPE VARCHAR(64)');
        $this->addSql('ALTER TABLE user_security_token ALTER token_type TYPE VARCHAR(40)');
        $this->addSql('ALTER TABLE user_security_token ALTER destination TYPE VARCHAR(190)');
    }
}
