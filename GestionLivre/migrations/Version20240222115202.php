<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240222115202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3319D1625D3');
        $this->addSql('DROP INDEX IDX_CBE5A3319D1625D3 ON book');
        $this->addSql('ALTER TABLE book CHANGE editor_id_id editorid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331C8A07E85 FOREIGN KEY (editorid_id) REFERENCES editor (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C8A07E85 ON book (editorid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331C8A07E85');
        $this->addSql('DROP INDEX IDX_CBE5A331C8A07E85 ON book');
        $this->addSql('ALTER TABLE book CHANGE editorid_id editor_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3319D1625D3 FOREIGN KEY (editor_id_id) REFERENCES editor (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3319D1625D3 ON book (editor_id_id)');
    }
}
