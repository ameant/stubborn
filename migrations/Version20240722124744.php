<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722124744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sweatshirts DROP size, DROP stock_xs, DROP stock_s, DROP stock_m, DROP stock_l, DROP stock_xl');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sweatshirts ADD size VARCHAR(255) NOT NULL, ADD stock_xs INT NOT NULL, ADD stock_s INT NOT NULL, ADD stock_m INT NOT NULL, ADD stock_l INT NOT NULL, ADD stock_xl INT NOT NULL');
    }
}
