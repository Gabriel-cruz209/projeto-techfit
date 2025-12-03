<?php
namespace projetoTechfit;
use PDO;
use PDOException;
class Connection {
    private static $instancia = null;

    public static function getInstancia() {
        if(!self::$instancia) {
            try {
                $host = "localhost";
                $user = "root";
                $db = "techfit_academy";
                $password = "senaisp";


                $dns_server = "mysql:host=$host;charset=utf8";

                self::$instancia = new PDO(
                    $dns_server,
                    $user,
                    $password
                );

                self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                self::$instancia->exec("CREATE DATABASE IF NOT EXISTS $db");
                self::$instancia->exec("USE $db");

                self::$instancia->exec("
                    CREATE TABLE IF NOT EXISTS Unidades (
                        cep_unidade varchar(9) not null,
                        nome_unidade varchar(100) not null,
                        id_unidade int not null PRIMARY KEY auto_increment
                    )");
                self::$instancia->exec("
                    CREATE TABLE IF NOT EXISTS Funcionarios (
                        cep_funcionario varchar(9) not null,
                        nome_funcionario varchar(100) not null,
                        data_nascimento_funcionario date not null,
                        email_funcionario varchar(50) not null,
                        id_funcionario int not null PRIMARY KEY auto_increment,
                        telefone_funcionario varchar(14) not null,
                        tipo_funcionario varchar(50) not null,
                        senha_funcionario varchar(50) not null,
                        cpf_funcionario varchar(14) not null,
                        id_unidade int not null,
                        CONSTRAINT fk_id_unidade_funcionario FOREIGN KEY (id_unidade) REFERENCES Unidades (id_unidade)
                    )");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS Alunos (
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
                ");
                self::$instancia->exec("
                    CREATE TABLE IF NOT EXISTS Aulas (
                        id_aula int not null PRIMARY KEY auto_increment,
                        data_aula datetime not null,
                        tipo_aula varchar(100) not null,
                        id_unidade int not null,
                        descricao_aula varchar(256),
                        constraint fk_id_unidade_aulas FOREIGN KEY (id_unidade) REFERENCES unidades (id_unidade)
                    )
                ");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS Avaliacao_fisicas (
                    data_avaliacao datetime not null,
                    id_avaliacao int not null PRIMARY KEY auto_increment,
                    tipo_avalicao varchar(50) not null,
                    id_aluno int not null,
                    CONSTRAINT fk_id_aluno_avaliacao FOREIGN KEY (id_aluno) REFERENCES Alunos (id_aluno)
                )
                ");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS criam (
                    id_aula int not null,
                    id_funcionario int not null,
                    CONSTRAINT fk_id_aula_criadas FOREIGN KEY(id_aula) REFERENCES Aulas (id_aula),
                    CONSTRAINT fk_id_funcionario_criam FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario)
                )
                ");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS comentam (
                    id_comunicado int not null,
                    id_funcionario int not null,
                    CONSTRAINT fk_id_comunicado FOREIGN KEY(id_comunicado) REFERENCES Comunicados (id_comunicado),
                    CONSTRAINT fk_id_funcionario_comentam FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario)
                )
                ");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS fazem (
                    id_funcionario int not null,
                    id_avaliacao int not null,
                    CONSTRAINT fk_id_funcionario_fazem FOREIGN KEY(id_funcionario) REFERENCES Funcionarios (id_funcionario),
                    CONSTRAINT fk_id_avaliacao FOREIGN KEY (id_avaliacao) REFERENCES avaliacao_fisicas (id_avaliacao)
                )
                ");
                self::$instancia->exec("
                CREATE TABLE IF NOT EXISTS inscrevem(
                    id_aula int not null,
                    id_aluno int not null,
                    CONSTRAINT fk_id_aluno_inscrevem FOREIGN KEY (id_aluno) REFERENCES alunos (id_aluno),
                    CONSTRAINT fk_id_aula_inscrevem FOREIGN KEY (id_aula) REFERENCES aulas (id_aula)
                )
                ");
                self::$instancia->exec("
                INSERT INTO Unidades (cep_unidade, nome_unidade) VALUES
                ('13150-000','TECHFIT Cosmópolis')
                WHERE NOT EXISTS (
                    SELECT 1 FROM Funcionarios WHERE nome_unidade = 'TECHFIT Cosmópolis'
                )
                ");
                self::$instancia->exec("
                INSERT INTO Funcionarios (cep_funcionario, nome_funcionario, data_nascimento_funcionario, email_funcionario, telefone_funcionario, tipo_funcionario, senha_funcionario, cpf_funcionario, id_unidade) VALUES
                ('01000-210','Gabriel Soares','2007-07-20','adm@techfit.com','(11)99999-0001','personal','senha123','111.111.111-00',1)
                WHERE NOT EXISTS (
                    SELECT 1 FROM Funcionarios WHERE nome_funcionario = 'Gabriel Soares'
                )
                ");

            }
            catch(PDOException $e) {
                die("ERROR: ". $e->getMessage());
            }
            
        }
        return self::$instancia;
    }
}




?>