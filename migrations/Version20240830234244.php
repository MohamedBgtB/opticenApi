<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240830234244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseurs CHANGE numero_de_telephone_du_fournisseur numero_de_telephone_du_fournisseur VARCHAR(15) DEFAULT NULL');
        $this->addSql('ALTER TABLE lensmaterials CHANGE material_name material_name VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE patients CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE numero_de_tele numero_de_tele VARCHAR(15) DEFAULT NULL, CHANGE date_de_naissance date_de_naissance DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE posts CHANGE body body VARCHAR(255) DEFAULT NULL, CHANGE status status VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE prescriptions CHANGE od_sphere od_sphere NUMERIC(5, 0) DEFAULT NULL, CHANGE od_cylindre od_cylindre NUMERIC(5, 0) DEFAULT NULL, CHANGE od_addition od_addition NUMERIC(5, 0) DEFAULT NULL, CHANGE og_sphere og_sphere NUMERIC(5, 0) DEFAULT NULL, CHANGE og_cylinder og_cylinder NUMERIC(5, 0) DEFAULT NULL, CHANGE og_addition og_addition NUMERIC(5, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE produits CHANGE marque marque VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseurs CHANGE numero_de_telephone_du_fournisseur numero_de_telephone_du_fournisseur VARCHAR(15) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE lensmaterials CHANGE material_name material_name VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE patients CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\', CHANGE numero_de_tele numero_de_tele VARCHAR(15) DEFAULT \'NULL\', CHANGE date_de_naissance date_de_naissance DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE posts CHANGE body body VARCHAR(255) DEFAULT \'NULL\', CHANGE status status VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE prescriptions CHANGE od_sphere od_sphere NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE od_cylindre od_cylindre NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE od_addition od_addition NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE og_sphere og_sphere NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE og_cylinder og_cylinder NUMERIC(5, 0) DEFAULT \'NULL\', CHANGE og_addition og_addition NUMERIC(5, 0) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE produits CHANGE marque marque VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(255) DEFAULT \'NULL\'');
    }
}
