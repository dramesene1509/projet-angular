<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190803185952 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partenaire DROP email, DROP telephone, DROP nom_admin, DROP prenom_admin, DROP email_admin, DROP cni');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partenaire ADD email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD telephone INT NOT NULL, ADD nom_admin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenom_admin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email_admin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD cni INT NOT NULL');
    }
}
