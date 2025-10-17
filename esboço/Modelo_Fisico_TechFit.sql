-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Aulas (
id_aula int auto_increment not null PRIMARY KEY,
data_aula datetime not null,
tipo_aula varchar(100) not null,
id_aluno int auto_increment not null
)

CREATE TABLE Avaliação Fisica (
data_avaliacao datetime not null,
id_avaliacao int auto_increment not null PRIMARY KEY,
tipo_avalicao varchar(50) not null,
id_aluno int auto_increment not null
)

CREATE TABLE Funcionario (
cep_funcionario varchar(9) not null,
nome_funcionario varchar(100) not null,
data_nascimento_funcionario date not null,
email_funcionario varchar(50) not null,
id_funcionario int auto_increment not null PRIMARY KEY,
telefone_funcionario varchar(14) not null,
tipo_funcionario varchar(50) not null,
senha_funcioanrio varchar(50) not null,
cpf_funcionario varchar(14) not null,
id_unidade int auto_increment not null
)

CREATE TABLE Unidades (
cep_unidade varchar(9) not null,
nome_unidade varchar(100) not null,
id_unidade int auto_increment not null PRIMARY KEY
)

CREATE TABLE Aluno (
nome_aluno varchar(100) not null,
cep_aluno varchar(9) not null,
data_nascimento_aluno date not null,
cpf_aluno varchar(14) not null,
telefone_aluno varchar(14) not null,
email_aluno varchar(50) not null,
senha_aluno varchar(50) not null,
id_aluno int auto_increment not null PRIMARY KEY,
id_unidade int auto_increment not null,
FOREIGN KEY(id_unidade) REFERENCES Unidades (id_unidade)
)

CREATE TABLE Comunicados (
informacao_comunicado varchar(300) not null,
titulo_comunicado varchar(50) not null,
id_comunicado int auto_incement not null PRIMARY KEY
)

CREATE TABLE Contem (
id_aula int auto_increment not null,
id_unidade int auto_increment not null,
FOREIGN KEY(id_aula) REFERENCES Aulas (id_aula),
FOREIGN KEY(id_unidade) REFERENCES Unidades (id_unidade)
)

CREATE TABLE criam (
id_aula int auto_increment not null,
id_funcionario int auto_increment not null,
FOREIGN KEY(id_aula) REFERENCES Aulas (id_aula),
FOREIGN KEY(id_funcionario) REFERENCES Funcionario (id_funcionario)
)

CREATE TABLE comentam (
id_comunicado int auto_incement not null,
id_funcionario int auto_increment not null,
FOREIGN KEY(id_comunicado) REFERENCES Comunicados (id_comunicado),
FOREIGN KEY(id_funcionario) REFERENCES Funcionario (id_funcionario)
)

CREATE TABLE fazem (
id_funcionario int auto_increment not null,
id_avaliacao int auto_increment not null,
FOREIGN KEY(id_funcionario) REFERENCES Funcionario (id_funcionario)/*falha: chave estrangeira*/
)

ALTER TABLE Aulas ADD FOREIGN KEY(id_aluno) REFERENCES Aluno (id_aluno)
ALTER TABLE Avaliação Fisica ADD FOREIGN KEY(id_aluno) REFERENCES Aluno (id_aluno)
ALTER TABLE Funcionario ADD FOREIGN KEY(id_unidade) REFERENCES Unidades (id_unidade)
