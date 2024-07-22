<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240721104956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D765E237E06 ON `admin` (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON `admin` (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495E237E06 ON user (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_880E0D765E237E06 ON `admin`');
        $this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON `admin`');
        $this->addSql('DROP INDEX UNIQ_8D93D6495E237E06 ON `user`');
    }
}
