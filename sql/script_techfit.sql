-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
CREATE DATABASE TECHFIT_ACADEMY;
USE TECHFIT_ACADEMY;

CREATE TABLE Unidades (
	cep_unidade varchar(9) not null,
	nome_unidade varchar(100) not null,
	id_unidade int not null PRIMARY KEY auto_increment
);

CREATE TABLE Funcionarios (
	cep_funcionario varchar(9) not null,
	nome_funcionario varchar(100) not null,
	data_nascimento_funcionario date not null,
	email_funcionario varchar(50) not null,
	id_funcionario int not null PRIMARY KEY auto_increment,
	telefone_funcionario varchar(14) not null,
	tipo_funcionario varchar(50) not null,
	senha_funcioanrio varchar(50) not null,
	cpf_funcionario varchar(14) not null,
	id_unidade int not null,
    CONSTRAINT fk_id_unidade_funcionario FOREIGN KEY (id_unidade) REFERENCES Unidades (id_unidade)
);

CREATE TABLE Alunos (
	nome_aluno varchar(100) not null,
	cep_aluno varchar(9) not null,
	data_nascimento_aluno date not null,
	cpf_aluno varchar(14) not null,
	telefone_aluno varchar(14) not null,
	email_aluno varchar(50) not null,
	senha_aluno varchar(50) not null,
	id_aluno int not null PRIMARY KEY auto_increment,
	id_unidade int not null,
	CONSTRAINT fk_id_unidade FOREIGN KEY (id_unidade) REFERENCES Unidades (id_unidade)
);
CREATE TABLE Aulas (
	id_aula int not null PRIMARY KEY auto_increment,
	data_aula datetime not null,
	tipo_aula varchar(100) not null,
	id_aluno int not null,
	CONSTRAINT fk_id_aluno_aulas FOREIGN KEY (id_aluno) REFERENCES Alunos (id_aluno)
);

CREATE TABLE Avaliacao_fisicas (
	data_avaliacao datetime not null,
	id_avaliacao int not null PRIMARY KEY auto_increment,
	tipo_avalicao varchar(50) not null,
	id_aluno int not null,
    CONSTRAINT fk_id_aluno_avaliacao FOREIGN KEY (id_aluno) REFERENCES Alunos (id_aluno)
);

CREATE TABLE Comunicados (
	informacao_comunicado varchar(300) not null,
	titulo_comunicado varchar(50) not null,
	id_comunicado int not null PRIMARY KEY auto_increment
);

CREATE TABLE Contem (
	id_aula int not null,
	id_unidade int not null,
	CONSTRAINT fk_id_aula_contidas FOREIGN KEY(id_aula) REFERENCES Aulas (id_aula),
	CONSTRAINT fk_id_unidade_contem FOREIGN KEY(id_unidade) REFERENCES Unidades (id_unidade)
);

CREATE TABLE criam (
	id_aula int not null,
	id_funcionario int not null,
	CONSTRAINT fk_id_aula_criadas FOREIGN KEY(id_aula) REFERENCES Aulas (id_aula),
	CONSTRAINT fk_id_funcionario_criam FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario)
);

CREATE TABLE comentam (
	id_comunicado int not null,
	id_funcionario int not null,
	CONSTRAINT fk_id_comunicado FOREIGN KEY(id_comunicado) REFERENCES Comunicados (id_comunicado),
	CONSTRAINT fk_id_funcionario_comentam FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario)
);

CREATE TABLE fazem (
	id_funcionario int not null,
	id_avaliacao int not null,
	CONSTRAINT fk_id_funcionario_fazem FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario),
    CONSTRAINT fk_id_avaliacao FOREIGN KEY (id_avaliacao) REFERENCES Funcionarios (id_funcionario)
);

-- Inserts 
INSERT INTO Unidades (cep_unidade, nome_unidade) VALUES
('01001-000', 'TECHFIT Centro SP'),
('13040-001', 'TECHFIT Campinas Norte'),
('20010-020', 'TECHFIT Rio Centro'),
('30130-010', 'TECHFIT Belo Horizonte Savassi'),
('40015-000', 'TECHFIT Salvador Pituba'),
('80010-100', 'TECHFIT Curitiba Batel'),
('88015-210', 'TECHFIT Florianópolis Beira-Mar'),
('70040-010', 'TECHFIT Brasília Asa Sul'),
('69005-070', 'TECHFIT Manaus Centro'),
('66010-000', 'TECHFIT Belém Batista Campos'),
('59020-300', 'TECHFIT Natal Tirol'),
('64001-030', 'TECHFIT Teresina Centro'),
('79002-200', 'TECHFIT Campo Grande Centro'),
('86020-060', 'TECHFIT Londrina Gleba Palhano'),
('97010-000', 'TECHFIT Santa Maria Centro');
SELECT * FROM Unidades;

INSERT INTO Funcionarios (cep_funcionario, nome_funcionario, data_nascimento_funcionario, email_funcionario, telefone_funcionario, tipo_funcionario, senha_funcioanrio, cpf_funcionario, id_unidade) VALUES
('01000-210','Carlos Almeida','1980-02-15','carlos.almeida@techfit.com','(11)99999-0001','CEO','senha123','111.111.111-00',1),
('01000-900','Fernanda Souza','1990-05-10','fernanda.souza@techfit.com','(11)98888-0002','Gerente','senha123','111.111.111-01',1),
('01000-044','Marcos Silva','1992-06-12','marcos.silva@techfit.com','(11)97777-0003','Personal','senha123','111.111.111-02',1),
('01000-012','Juliana Costa','1994-03-08','juliana.costa@techfit.com','(11)96666-0004','Recepção','senha123','111.111.111-03',1),
('01000-231','Thiago Santos','1996-11-21','thiago.santos@techfit.com','(11)95555-0005','Personal','senha123','111.111.111-04',2),
('13040-241','Amanda Ribeiro','1995-01-09','amanda.ribeiro@techfit.com','(11)94444-0006','Limpeza','senha123','111.111.111-05',2),
('13040-900','Bruno Pires','1998-04-14','bruno.pires@techfit.com','(11)93333-0007','Gerente','senha123','111.111.111-06',2),
('13040-241','Larissa Nunes','1997-08-28','larissa.nunes@techfit.com','(11)92222-0008','Recepção','senha123','111.111.111-07',2),
('13040-002','Rafael Teixeira','1993-09-19','rafael.teixeira@techfit.com','(11)91111-0009','Limpeza','senha123','111.111.111-08',2),
('13040-331','Camila Oliveira','1999-10-05','camila.oliveira@techfit.com','(11)90000-0010','Personal','senha123','111.111.111-09',2),
('20010-244','Rafael Costa','1987-05-10','rafael.costa@techfit.com','(21)99999-2001','Gerente','senha123','333.333.333-01',3),
('20010-561','Tatiane Melo','1994-02-20','tatiane.melo@techfit.com','(21)98888-2002','Recepção','senha123','333.333.333-02',3),
('20010-155','Pedro Henrique','1996-09-09','pedro.henrique@techfit.com','(21)97777-2003','Personal','senha123','333.333.333-03',3),
('20010-023','Ana Clara','1995-04-15','ana.clara@techfit.com','(21)96666-2004','Personal','senha123','333.333.333-04',3),
('20010-241','Bruno Martins','1998-06-22','bruno.martins@techfit.com','(21)95555-2005','Limpeza','senha123','333.333.333-05',3),
('40015-134','Leticia Pires','1993-03-03','leticia.pires@techfit.com','(21)94444-2006','Recepção','senha123','333.333.333-06',4),
('40015-055','Daniel Rocha','1999-08-11','daniel.rocha@techfit.com','(21)93333-2007','Personal','senha123','333.333.333-07',4),
('40015-555','Priscila Monteiro','1991-10-25','priscila.monteiro@techfit.com','(21)92222-2008','Limpeza','senha123','333.333.333-08',4),
('40015-020','Thiago Ramos','1989-07-07','thiago.ramos@techfit.com','(21)91111-2009','Gerente','senha123','333.333.333-09',4),
('40015-243','Mariana Lopes','1997-12-12','mariana.lopes@techfit.com','(21)90000-2010','Recepção','senha123','333.333.333-10',4),
('80010-024','Paulo Mendes','1989-07-07','paulo.mendes@techfit.com','(19)99999-1001','Gerente','senha123','222.222.222-01',5),
('80010-042','Mariana Dias','1995-03-20','mariana.dias@techfit.com','(19)98888-1002','Personal','senha123','222.222.222-02',5),
('80010-124','André Lima','1996-04-17','andre.lima@techfit.com','(19)97777-1003','Personal','senha123','222.222.222-03',5),
('80010-235','Patrícia Gomes','1992-02-12','patricia.gomes@techfit.com','(19)96666-1004','Recepção','senha123','222.222.222-04',5),
('80010-450','Rodrigo Souza','1994-09-25','rodrigo.souza@techfit.com','(19)95555-1005','Personal','senha123','222.222.222-05',5);
SELECT * FROM Funcionarios;

INSERT INTO Alunos (nome_aluno, cep_aluno, data_nascimento_aluno, cpf_aluno, telefone_aluno, email_aluno, senha_aluno, id_unidade)
VALUES
('Eduardo Ribeiro', '13010-010', '2000-02-14', '101.202.303-44', '(19)90011-2233', 'eduardo.ribeiro@email.com', 'senha001', 4),
('Fernanda Souza', '13120-020', '2001-07-19', '202.303.404-55', '(19)91122-3344', 'fernanda.souza@email.com', 'senha002', 8),
('Marcelo Dias', '13230-030', '2002-11-03', '303.404.505-66', '(19)92233-4455', 'marcelo.dias@email.com', 'senha003', 11),
('Patrícia Gomes', '13340-040', '2000-05-29', '404.505.606-77', '(19)93344-5566', 'patricia.gomes@email.com', 'senha004', 2),
('Vinícius Carvalho', '13450-050', '2003-01-22', '505.606.707-88', '(19)94455-6677', 'vinicius.carvalho@email.com', 'senha005', 6),
('Larissa Mendes', '13560-060', '2001-03-18', '606.707.808-99', '(19)95566-7788', 'larissa.mendes@email.com', 'senha006', 13),
('Bruno Freitas', '13670-070', '2002-09-12', '707.808.909-00', '(19)96677-8899', 'bruno.freitas@email.com', 'senha007', 1),
('Camila Teixeira', '13780-080', '2000-12-25', '808.909.101-11', '(19)97788-9900', 'camila.teixeira@email.com', 'senha008', 15),
('Felipe Nascimento', '13890-090', '2003-06-07', '909.101.202-22', '(19)98899-0011', 'felipe.nascimento@email.com', 'senha009', 5),
('Amanda Barros', '13910-100', '2001-08-30', '101.303.505-33', '(19)99900-1122', 'amanda.barros@email.com', 'senha010', 9),
('Diego Monteiro', '14020-110', '2002-04-15', '202.404.606-44', '(19)91011-2233', 'diego.monteiro@email.com', 'senha011', 7),
('Isabela Rocha', '14130-120', '2000-10-08', '303.505.707-55', '(19)92122-3344', 'isabela.rocha@email.com', 'senha012', 3),
('Lucas Fernandes', '14240-130', '2003-02-27', '404.606.808-66', '(19)93233-4455', 'lucas.fernandes@email.com', 'senha013', 12),
('Sofia Castro', '14350-140', '2001-09-11', '505.707.909-77', '(19)94344-5566', 'sofia.castro@email.com', 'senha014', 10),
('Rafael Almeida', '14460-150', '2002-05-19', '606.808.101-88', '(19)95455-6677', 'rafael.almeida@email.com', 'senha015', 14),
('Mariana Lopes', '14570-160', '2000-03-23', '707.909.202-99', '(19)96566-7788', 'mariana.lopes@email.com', 'senha016', 6),
('Gustavo Pinto', '14680-170', '2003-07-05', '808.101.303-00', '(19)97677-8899', 'gustavo.pinto@email.com', 'senha017', 2),
('Juliana Carvalho', '14790-180', '2001-11-30', '909.202.404-11', '(19)98788-9900', 'juliana.carvalho@email.com', 'senha018', 13),
('Vinícius Moreira', '14800-190', '2002-01-16', '101.303.505-22', '(19)99899-0011', 'vinicius.moreira@email.com', 'senha019', 8),
('Caroline Santos', '14910-200', '2000-06-12', '202.404.606-33', '(19)90900-1122', 'caroline.santos@email.com', 'senha020', 11),
('Lucas Silva', '13050-000', '2002-03-15', '123.456.789-00', '(19)98765-4321', 'lucas.silva@email.com', 'senha123', 1),
('Maria Oliveira', '13400-100', '2001-07-22', '987.654.321-00', '(19)91234-5678', 'maria.oliveira@email.com', 'senha456', 5),
('João Santos', '13500-200', '2003-01-10', '111.222.333-44', '(19)99876-5432', 'joao.santos@email.com', 'senha789', 3),
('Ana Pereira', '13200-300', '2000-11-30', '555.666.777-88', '(19)93456-7890', 'ana.pereira@email.com', 'senhaabc', 12),
('Gabriel Costa', '13300-400', '2002-08-18', '999.888.777-66', '(19)94567-1234', 'gabriel.costa@email.com', 'senhadef', 7),
('Beatriz Lima', '13100-500', '2001-05-25', '444.333.222-11', '(19)95678-2345', 'beatriz.lima@email.com', 'senhaghi', 10),
('Rafael Rodrigues', '13600-600', '2003-09-05', '222.111.333-44', '(19)96789-3456', 'rafael.rodrigues@email.com', 'senhajkl', 2),
('Carolina Martins', '13700-700', '2000-12-12', '777.888.999-00', '(19)97890-4567', 'carolina.martins@email.com', 'senhamno', 14),
('Thiago Almeida', '13800-800', '2002-06-02', '666.555.444-33', '(19)98901-5678', 'thiago.almeida@email.com', 'senhapqr', 9),
('Juliana Fernandes', '13900-900', '2001-04-20', '333.222.111-00', '(19)99012-6789', 'juliana.fernandes@email.com', 'senhastu', 15);
SELECT * FROM Alunos;


INSERT INTO Aulas (data_aula, tipo_aula, id_aluno) VALUES
('2025-10-20 08:00:00', 'Musculação', 1),
('2025-10-20 09:30:00', 'Funcional', 5),
('2025-10-21 10:00:00', 'Yoga', 10),
('2025-10-21 11:30:00', 'Pilates', 15),
('2025-10-22 08:00:00', 'Spinning', 20),
('2025-10-22 09:00:00', 'Musculação', 25),
('2025-10-23 10:30:00', 'Funcional', 2),
('2025-10-23 11:00:00', 'Yoga', 7),
('2025-10-24 08:15:00', 'Pilates', 12),
('2025-10-24 09:45:00', 'Spinning', 30);
SELECT * FROM Aulas;

INSERT INTO Avaliacao_fisicas (data_avaliacao, tipo_avalicao, id_aluno) VALUES
('2025-10-20 08:00:00', 'inicial', 3),
('2025-10-20 09:00:00', 'Desenvolvimento', 6),
('2025-10-21 10:15:00', 'Inicial', 9),
('2025-10-21 11:45:00', 'Desenvolvimento', 12),
('2025-10-22 08:30:00', 'Inicial', 18),
('2025-10-22 09:30:00', 'Desenvolvimento', 21),
('2025-10-23 10:00:00', 'Inicial', 24),
('2025-10-23 11:15:00', 'Desenvolvimento', 27),
('2025-10-24 08:45:00', 'Inicial', 1),
('2025-10-24 09:50:00', 'Desenvolvimento', 30);
SELECT * FROM Avaliacao_fisicas;

INSERT INTO Comunicados (informacao_comunicado, titulo_comunicado) VALUES
('A academia estará fechada no feriado de 15 de novembro.', 'Feriado'),
('Nova aula de Zumba disponível a partir da próxima semana.', 'Novidade de Aula'),
('Lembrete: pagamento da mensalidade vence dia 25.', 'Pagamento'),
('Evento especial: avaliação física gratuita neste sábado.', 'Evento Especial'),
('Atenção: uso obrigatório de máscara nas áreas internas.', 'Aviso Importante'),
('Mudança de horário: aula de Pilates agora às 18h.', 'Alteração de Horário'),
('Inscreva-se no campeonato interno de Crossfit.', 'Campeonato Interno'),
('Dica de saúde: mantenha-se hidratado durante os treinos.', 'Dica de Saúde'),
('Promoção: 20% de desconto em planos trimestrais.', 'Promoção'),
('Aviso: manutenção no equipamento de esteira amanhã.', 'Manutenção');
select * FROM Comunicados;

INSERT INTO Contem (id_aula, id_unidade) VALUES
(1, 1),
(2, 3),
(3, 5),
(4, 7),
(5, 2),
(6, 10),
(7, 12),
(8, 4),
(9, 8),
(10, 15);
SELECT * FROM Contem;

INSERT INTO criam (id_aula, id_funcionario) VALUES
(1, 2),
(2, 5),
(3, 8),
(4, 11),
(5, 14),
(6, 17),
(7, 20),
(8, 23),
(9, 1),
(10, 25);
SELECT * FROM criam;

INSERT INTO comentam (id_comunicado, id_funcionario) VALUES
(1, 3),
(2, 6),
(3, 9),
(4, 12),
(5, 15),
(6, 18),
(7, 21),
(8, 24),
(9, 2),
(10, 20);
SELECT * FROM comentam;

ALTER TABLE FAZEM DROP CONSTRAINT fk_id_avaliacao;
ALTER TABLE FAZEM ADD CONSTRAINT fk_id_avaliacao FOREIGN KEY (id_avaliacao) REFERENCES Avaliacao_fisicas (id_avaliacao);
delete from contem where id_aula >= 1;
drop Table contem;

delete from criam where id_aula >=1;
delete from aulas where id_aluno >=1;
alter table aulas drop constraint fk_id_aluno_aulas;
alter table aulas drop COLUMN id_aluno;

alter table aulas add COLUMN id_unidade int not null;

alter table aulas add constraint fk_id_unidade_aulas FOREIGN KEY (id_unidade) REFERENCES unidades (id_unidade);

alter table aulas add COLUMN descricao_aula varchar(256);

CREATE TABLE inscrevem(
    id_aula int not null,
    id_aluno int not null,
    CONSTRAINT fk_id_aluno_inscrevem FOREIGN KEY (id_aluno) REFERENCES alunos (id_aluno),
    CONSTRAINT fk_id_aula_inscrevem FOREIGN KEY (id_aula) REFERENCES aulas (id_aula)
);

alter table comunicados add COLUMN tipo_comunicado VARCHAR(128) not null;

INSERT INTO inscrevem (id_aula, id_aluno) VALUES
(1, 3),
(2, 7),
(3, 12),
(4, 1),
(5, 18),
(6, 25),
(7, 9),
(8, 30),
(9, 14),
(10, 21);
