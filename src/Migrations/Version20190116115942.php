<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116115942 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_ateliersweets');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_ateliersweets (id INT AUTO_INCREMENT NOT NULL, ateliersweet_id INT NOT NULL, order_id INT NOT NULL, INDEX IDX_A9A5E0988D9F6D38 (order_id), INDEX IDX_A9A5E0985CF55047 (ateliersweet_id), UNIQUE INDEX uniq_orderateliersweet (order_id, ateliersweet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE order_ateliersweets ADD CONSTRAINT FK_A9A5E0985CF55047 FOREIGN KEY (ateliersweet_id) REFERENCES ateliersweets (id)');
        $this->addSql('ALTER TABLE order_ateliersweets ADD CONSTRAINT FK_A9A5E0988D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
    }
}
