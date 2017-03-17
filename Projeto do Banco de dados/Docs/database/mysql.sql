DROP DATABASE db_infofun;


CREATE DATABASE IF NOT EXISTS db_infofun CHARSET = Latin1 COLLATE = latin1_swedish_ci;

USE db_infofun;

CREATE TABLE IF NOT EXISTS genre(
cd_genre INT NOT NULL AUTO_INCREMENT,
ds_genre ENUM('Masculino','Feminino','Outros') NOT NULL,
PRIMARY KEY(cd_genre))
ENGINE=InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;

INSERT INTO genre(cd_genre,ds_genre) VALUES(1,'Masculino');
INSERT INTO genre(cd_genre,ds_genre) VALUES(2,'Feminino');
INSERT INTO genre(cd_genre,ds_genre) VALUES(3,'Outros');


CREATE TABLE IF NOT EXISTS users(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
remember_token VARCHAR(100),
dt_birthday DATE NOT NULL,
cd_genre INT NOT NULL,
company_name VARCHAR(255),
created_at TIMESTAMP NOT NULL DEFAULT 0,
updated_at TIMESTAMP NOT NULL DEFAULT 0,
sn_research_email_list CHAR(1) NOT NULL,
UNIQUE(email),
PRIMARY KEY(id),
FOREIGN KEY(cd_genre) REFERENCES genre(cd_genre) ON DELETE no action ON UPDATE no action)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;



CREATE TABLE IF NOT EXISTS password_resets(
	email VARCHAR(255) NOT NULL,
	token VARCHAR(255) NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT 0)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS research_status(
cd_research_status INT NOT NULL AUTO_INCREMENT,
ds_research_status VARCHAR(20) NOT NULL,
PRIMARY KEY(cd_research_status))
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;

INSERT INTO research_status(cd_research_status,ds_research_status) VALUES(1,'Em andamento');
INSERT INTO research_status(cd_research_status,ds_research_status) VALUES(2,'Finalizada');
INSERT INTO research_status(cd_research_status,ds_research_status) VALUES(3,'Cancelada');


CREATE TABLE IF NOT EXISTS research_visibility(
cd_research_visibility INT NOT NULL AUTO_INCREMENT,
ds_research_visibility VARCHAR(45),
PRIMARY KEY(cd_research_visibility))
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;

INSERT INTO research_visibility(cd_research_visibility, ds_research_visibility) VALUES(1, 'Publica');
INSERT INTO research_visibility(cd_research_visibility, ds_research_visibility) VALUES(2, 'Privada');


CREATE TABLE IF NOT EXISTS research_type(
cd_research_type INT NOT NULL AUTO_INCREMENT,
ds_research_type VARCHAR(255),
PRIMARY KEY(cd_research_type))
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;

INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(1, 'Academica');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(2, 'Mercado');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(3, 'Produto');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(4, 'Evento');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(5, 'Corporativa');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(6, 'Politica');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(7, 'Governamental');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(8, 'Ciencia e Tecnologia');
INSERT INTO research_type(cd_research_type, ds_research_type) VALUES(9, 'Satisfacao de Clientes');


CREATE TABLE IF NOT EXISTS research(
cd_research INT NOT NULL AUTO_INCREMENT,
ds_research VARCHAR(255) NOT NULL,
cd_user INT NOT NULL,
cd_research_status INT NOT NULL,
cd_research_visibility INT NOT NULL,
nr_of_questions INT,
nr_answers_to_collect INT,
dt_end_date DATE,
cd_research_type INT NOT NULL,
PRIMARY KEY(cd_research),
FOREIGN KEY(cd_user) REFERENCES users(id) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_research_status) REFERENCES research_status(cd_research_status) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_research_visibility) REFERENCES research_visibility(cd_research_visibility) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY(cd_research_type) REFERENCES research_type(cd_research_type) ON DELETE NO ACTION ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS question_type(
cd_question_type INT NOT NULL AUTO_INCREMENT,
tp_question_type CHAR(1) NOT NULL,
ds_question_type VARCHAR(255),
PRIMARY KEY(cd_question_type)
)ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;

INSERT INTO question_type(cd_question_type,tp_question_type,ds_question_type) VALUES(1,'O','Opcoes');
INSERT INTO question_type(cd_question_type,tp_question_type,ds_question_type) VALUES(2,'T','Texto Livre');

CREATE TABLE IF NOT EXISTS research_question(
cd_research_question INT NOT NULL AUTO_INCREMENT,
ds_research_question VARCHAR(255) NOT NULL,
cd_question_type INT NOT NULL,
cd_user INT NOT NULL,
PRIMARY KEY(cd_research_question),
FOREIGN KEY(cd_question_type) REFERENCES question_type(cd_question_type) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_user) REFERENCES users(id) ON DELETE no action ON UPDATE no action)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS question_answers(
cd_question_answers INT NOT NULL AUTO_INCREMENT,
ds_question_answers TEXT NOT NULL,
cd_research_question INT NOT NULL,
PRIMARY KEY(cd_question_answers),
FOREIGN KEY(cd_research_question) REFERENCES research_question(cd_research_question) ON DELETE no action ON UPDATE no action)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS answers(
cd_answers INT NOT NULL AUTO_INCREMENT,
cd_question_answers INT,
cd_research_question INT NOT NULL,
cd_research INT NOT NULL,
PRIMARY KEY(cd_answers),
FOREIGN KEY(cd_question_answers) REFERENCES question_answers(cd_question_answers) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_research_question) REFERENCES research_question(cd_research_question) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_research) REFERENCES research(cd_research) ON DELETE no action ON UPDATE no action)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS questions_of_research(
cd_questions_of_research INT NOT NULL AUTO_INCREMENT,
cd_research INT NOT NULL,
cd_research_question INT NOT NULL,
nr_question INT NOT NULL,
PRIMARY KEY(cd_questions_of_research),
FOREIGN KEY(cd_research) REFERENCES research(cd_research) ON DELETE no action ON UPDATE no action,
FOREIGN KEY(cd_research_question) REFERENCES research_question(cd_research_question) ON DELETE no action ON UPDATE no action)
ENGINE = InnoDB
DEFAULT CHARACTER SET = Latin1
COLLATE = latin1_swedish_ci;