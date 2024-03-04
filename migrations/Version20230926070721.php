<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926070721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor ADD nationality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actor ADD CONSTRAINT FK_447556F91C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('CREATE INDEX IDX_447556F91C9DA55 ON actor (nationality_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor DROP FOREIGN KEY FK_447556F91C9DA55');
        $this->addSql('DROP INDEX IDX_447556F91C9DA55 ON actor');
        $this->addSql('ALTER TABLE actor DROP nationality_id');
    }
}
