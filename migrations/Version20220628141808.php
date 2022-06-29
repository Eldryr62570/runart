<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628141808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_oeuvre (user_id INT NOT NULL, oeuvre_id INT NOT NULL, INDEX IDX_50AC35C3A76ED395 (user_id), INDEX IDX_50AC35C388194DE8 (oeuvre_id), PRIMARY KEY(user_id, oeuvre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_oeuvre ADD CONSTRAINT FK_50AC35C3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_oeuvre ADD CONSTRAINT FK_50AC35C388194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE oeuvre_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oeuvre_user (oeuvre_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7A340C0F88194DE8 (oeuvre_id), INDEX IDX_7A340C0FA76ED395 (user_id), PRIMARY KEY(oeuvre_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE oeuvre_user ADD CONSTRAINT FK_7A340C0F88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_user ADD CONSTRAINT FK_7A340C0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_oeuvre');
    }
}
