<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240619185531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create table card';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE card (id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE card');
    }
}
