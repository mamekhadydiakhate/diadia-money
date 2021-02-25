<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224074955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CFF65260A76ED395 ON compte (user_id)');
        $this->addSql('ALTER TABLE transaction ADD deposer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1788E566C FOREIGN KEY (deposer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_723705D1788E566C ON transaction (deposer_id)');
        $this->addSql('ALTER TABLE user ADD agence_id INT DEFAULT NULL, ADD profil_id INT DEFAULT NULL, ADD depot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D725330D ON user (agence_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649275ED078 ON user (profil_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6498510D4DE ON user (depot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260A76ED395');
        $this->addSql('DROP INDEX IDX_CFF65260A76ED395 ON compte');
        $this->addSql('ALTER TABLE compte DROP user_id');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1788E566C');
        $this->addSql('DROP INDEX IDX_723705D1788E566C ON transaction');
        $this->addSql('ALTER TABLE transaction DROP deposer_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D725330D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498510D4DE');
        $this->addSql('DROP INDEX IDX_8D93D649D725330D ON user');
        $this->addSql('DROP INDEX IDX_8D93D649275ED078 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6498510D4DE ON user');
        $this->addSql('ALTER TABLE user DROP agence_id, DROP profil_id, DROP depot_id');
    }
}
