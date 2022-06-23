<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623114617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oeuvre_tags (oeuvre_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_981B4E6088194DE8 (oeuvre_id), INDEX IDX_981B4E608D7B4FB4 (tags_id), PRIMARY KEY(oeuvre_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oeuvre_tags ADD CONSTRAINT FK_981B4E6088194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_tags ADD CONSTRAINT FK_981B4E608D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE tags_oeuvre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tags_oeuvre (tags_id INT NOT NULL, oeuvre_id INT NOT NULL, INDEX IDX_502593CE8D7B4FB4 (tags_id), INDEX IDX_502593CE88194DE8 (oeuvre_id), PRIMARY KEY(tags_id, oeuvre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tags_oeuvre ADD CONSTRAINT FK_502593CE88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_oeuvre ADD CONSTRAINT FK_502593CE8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE oeuvre_tags');
    }
}
