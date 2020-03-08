<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305105544 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pays ADD idcontinent_id INT NOT NULL');
        $this->addSql('ALTER TABLE pays ADD CONSTRAINT FK_349F3CAED4B0337E FOREIGN KEY (idcontinent_id) REFERENCES continent (id)');
        $this->addSql('CREATE INDEX IDX_349F3CAED4B0337E ON pays (idcontinent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pays DROP FOREIGN KEY FK_349F3CAED4B0337E');
        $this->addSql('DROP INDEX IDX_349F3CAED4B0337E ON pays');
        $this->addSql('ALTER TABLE pays DROP idcontinent_id');
    }
}
