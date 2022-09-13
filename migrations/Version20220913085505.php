<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220913085505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change category names lenght';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(30) NOT NULL');
    }
}
