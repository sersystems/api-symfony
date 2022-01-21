<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121010135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camada (id INT AUTO_INCREMENT NOT NULL, materia_id INT NOT NULL, codigo VARCHAR(20) NOT NULL, inicio DATE NOT NULL, cierre DATE NOT NULL, visibilidad TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_208DF30E20332D99 (codigo), INDEX IDX_208DF30EB54DBBCB (materia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE docente (id INT AUTO_INCREMENT NOT NULL, institucion_id INT NOT NULL, user_id INT NOT NULL, apellido VARCHAR(25) NOT NULL, nombre VARCHAR(25) NOT NULL, email VARCHAR(180) NOT NULL, activo TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_FD9FCFA4E7927C74 (email), INDEX IDX_FD9FCFA4B239FBC6 (institucion_id), INDEX IDX_FD9FCFA4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, docente_id INT NOT NULL, materia_id INT NOT NULL, INDEX IDX_C49C530B94E27525 (docente_id), INDEX IDX_C49C530BB54DBBCB (materia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estudiante (id INT AUTO_INCREMENT NOT NULL, institucion_id INT NOT NULL, user_id INT NOT NULL, apellido VARCHAR(25) NOT NULL, nombre VARCHAR(25) NOT NULL, email VARCHAR(180) NOT NULL, activo TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3B3F3FADE7927C74 (email), INDEX IDX_3B3F3FADB239FBC6 (institucion_id), INDEX IDX_3B3F3FADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluacion (id INT AUTO_INCREMENT NOT NULL, materia_id INT NOT NULL, nombre VARCHAR(25) NOT NULL, fecha DATE NOT NULL, duracion INT NOT NULL, puntaje NUMERIC(10, 2) DEFAULT NULL, puntaje_min NUMERIC(10, 2) NOT NULL, visibilidad TINYINT(1) NOT NULL, inicializada TINYINT(1) NOT NULL, finalizada TINYINT(1) NOT NULL, INDEX IDX_DEEDCA53B54DBBCB (materia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscripcion (id INT AUTO_INCREMENT NOT NULL, camada_id INT NOT NULL, estudiante_id INT NOT NULL, fecha DATE NOT NULL, promedio NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_935E99F0C047A5F9 (camada_id), INDEX IDX_935E99F059590C39 (estudiante_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institucion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_F751F7C3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materia (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulo (id INT AUTO_INCREMENT NOT NULL, materia_id INT NOT NULL, nombre VARCHAR(50) NOT NULL, INDEX IDX_ECF1CF36B54DBBCB (materia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pregunta_desarrollo (id INT AUTO_INCREMENT NOT NULL, modulo_id INT NOT NULL, pregunta VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, devolucion VARCHAR(255) DEFAULT NULL, INDEX IDX_4F3BDB2EC07F55F5 (modulo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pregunta_multiple (id INT AUTO_INCREMENT NOT NULL, modulo_id INT NOT NULL, texto VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, devolucion VARCHAR(255) DEFAULT NULL, INDEX IDX_B62C6541C07F55F5 (modulo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preguntero (id INT AUTO_INCREMENT NOT NULL, evaluacion_id INT NOT NULL, pregunta_multiple_id INT NOT NULL, pregunta_desarrollo_id INT NOT NULL, INDEX IDX_A24D6EAE715F406 (evaluacion_id), INDEX IDX_A24D6EA3D4BD170 (pregunta_multiple_id), INDEX IDX_A24D6EA87555B65 (pregunta_desarrollo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE respondedero (id INT AUTO_INCREMENT NOT NULL, inscripcion_id INT NOT NULL, preguntero_id INT NOT NULL, respuesta VARCHAR(255) DEFAULT NULL, puntaje NUMERIC(10, 2) NOT NULL, INDEX IDX_555320CCFFD5FBD3 (inscripcion_id), INDEX IDX_555320CC29551604 (preguntero_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE respuesta_multiple (id INT AUTO_INCREMENT NOT NULL, pregunta_multiple_id INT NOT NULL, texto VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, devolucion VARCHAR(255) DEFAULT NULL, es_correcta TINYINT(1) NOT NULL, puntaje NUMERIC(10, 2) NOT NULL, INDEX IDX_4F7AD3D73D4BD170 (pregunta_multiple_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camada ADD CONSTRAINT FK_208DF30EB54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('ALTER TABLE docente ADD CONSTRAINT FK_FD9FCFA4B239FBC6 FOREIGN KEY (institucion_id) REFERENCES institucion (id)');
        $this->addSql('ALTER TABLE docente ADD CONSTRAINT FK_FD9FCFA4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530B94E27525 FOREIGN KEY (docente_id) REFERENCES docente (id)');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530BB54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('ALTER TABLE estudiante ADD CONSTRAINT FK_3B3F3FADB239FBC6 FOREIGN KEY (institucion_id) REFERENCES institucion (id)');
        $this->addSql('ALTER TABLE estudiante ADD CONSTRAINT FK_3B3F3FADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evaluacion ADD CONSTRAINT FK_DEEDCA53B54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('ALTER TABLE inscripcion ADD CONSTRAINT FK_935E99F0C047A5F9 FOREIGN KEY (camada_id) REFERENCES camada (id)');
        $this->addSql('ALTER TABLE inscripcion ADD CONSTRAINT FK_935E99F059590C39 FOREIGN KEY (estudiante_id) REFERENCES estudiante (id)');
        $this->addSql('ALTER TABLE modulo ADD CONSTRAINT FK_ECF1CF36B54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('ALTER TABLE pregunta_desarrollo ADD CONSTRAINT FK_4F3BDB2EC07F55F5 FOREIGN KEY (modulo_id) REFERENCES modulo (id)');
        $this->addSql('ALTER TABLE pregunta_multiple ADD CONSTRAINT FK_B62C6541C07F55F5 FOREIGN KEY (modulo_id) REFERENCES modulo (id)');
        $this->addSql('ALTER TABLE preguntero ADD CONSTRAINT FK_A24D6EAE715F406 FOREIGN KEY (evaluacion_id) REFERENCES evaluacion (id)');
        $this->addSql('ALTER TABLE preguntero ADD CONSTRAINT FK_A24D6EA3D4BD170 FOREIGN KEY (pregunta_multiple_id) REFERENCES pregunta_multiple (id)');
        $this->addSql('ALTER TABLE preguntero ADD CONSTRAINT FK_A24D6EA87555B65 FOREIGN KEY (pregunta_desarrollo_id) REFERENCES pregunta_desarrollo (id)');
        $this->addSql('ALTER TABLE respondedero ADD CONSTRAINT FK_555320CCFFD5FBD3 FOREIGN KEY (inscripcion_id) REFERENCES inscripcion (id)');
        $this->addSql('ALTER TABLE respondedero ADD CONSTRAINT FK_555320CC29551604 FOREIGN KEY (preguntero_id) REFERENCES preguntero (id)');
        $this->addSql('ALTER TABLE respuesta_multiple ADD CONSTRAINT FK_4F7AD3D73D4BD170 FOREIGN KEY (pregunta_multiple_id) REFERENCES pregunta_multiple (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscripcion DROP FOREIGN KEY FK_935E99F0C047A5F9');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530B94E27525');
        $this->addSql('ALTER TABLE inscripcion DROP FOREIGN KEY FK_935E99F059590C39');
        $this->addSql('ALTER TABLE preguntero DROP FOREIGN KEY FK_A24D6EAE715F406');
        $this->addSql('ALTER TABLE respondedero DROP FOREIGN KEY FK_555320CCFFD5FBD3');
        $this->addSql('ALTER TABLE docente DROP FOREIGN KEY FK_FD9FCFA4B239FBC6');
        $this->addSql('ALTER TABLE estudiante DROP FOREIGN KEY FK_3B3F3FADB239FBC6');
        $this->addSql('ALTER TABLE camada DROP FOREIGN KEY FK_208DF30EB54DBBCB');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530BB54DBBCB');
        $this->addSql('ALTER TABLE evaluacion DROP FOREIGN KEY FK_DEEDCA53B54DBBCB');
        $this->addSql('ALTER TABLE modulo DROP FOREIGN KEY FK_ECF1CF36B54DBBCB');
        $this->addSql('ALTER TABLE pregunta_desarrollo DROP FOREIGN KEY FK_4F3BDB2EC07F55F5');
        $this->addSql('ALTER TABLE pregunta_multiple DROP FOREIGN KEY FK_B62C6541C07F55F5');
        $this->addSql('ALTER TABLE preguntero DROP FOREIGN KEY FK_A24D6EA87555B65');
        $this->addSql('ALTER TABLE preguntero DROP FOREIGN KEY FK_A24D6EA3D4BD170');
        $this->addSql('ALTER TABLE respuesta_multiple DROP FOREIGN KEY FK_4F7AD3D73D4BD170');
        $this->addSql('ALTER TABLE respondedero DROP FOREIGN KEY FK_555320CC29551604');
        $this->addSql('ALTER TABLE docente DROP FOREIGN KEY FK_FD9FCFA4A76ED395');
        $this->addSql('ALTER TABLE estudiante DROP FOREIGN KEY FK_3B3F3FADA76ED395');
        $this->addSql('DROP TABLE camada');
        $this->addSql('DROP TABLE docente');
        $this->addSql('DROP TABLE equipo');
        $this->addSql('DROP TABLE estudiante');
        $this->addSql('DROP TABLE evaluacion');
        $this->addSql('DROP TABLE inscripcion');
        $this->addSql('DROP TABLE institucion');
        $this->addSql('DROP TABLE materia');
        $this->addSql('DROP TABLE modulo');
        $this->addSql('DROP TABLE pregunta_desarrollo');
        $this->addSql('DROP TABLE pregunta_multiple');
        $this->addSql('DROP TABLE preguntero');
        $this->addSql('DROP TABLE respondedero');
        $this->addSql('DROP TABLE respuesta_multiple');
        $this->addSql('DROP TABLE user');
    }
}
