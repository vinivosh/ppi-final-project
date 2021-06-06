CREATE TABLE TF_pessoa
(
   codigo int PRIMARY KEY auto_increment,
   nome varchar(100),
   sexo char(1),
   email varchar(100) UNIQUE,
   telefone varchar(14),
   cep char(9),
   logradouro varchar(100),
   cidade varchar(100),
   estado char(3)
) ENGINE=InnoDB;

CREATE TABLE TF_paciente
(
   codigo int UNIQUE,
   peso decimal(6,2),
   altura int,
   tiposanguineo varchar(3),
   FOREIGN KEY (codigo) REFERENCES TF_pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE TF_funcionario
(
   codigo int UNIQUE,
   datacontrato date,
   salario decimal(10,2),
   hash_senha varchar(255),
   FOREIGN KEY (codigo) REFERENCES TF_pessoa(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;



CREATE TABLE TF_medico
(
   codigo int UNIQUE,
   especialidade varchar(100),
   crm varchar(30) UNIQUE,
   FOREIGN KEY (codigo) REFERENCES TF_funcionario(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;



CREATE TABLE TF_agenda
(
   codigo int PRIMARY KEY auto_increment,
   dataconsulta date,
   horario time,
   nome varchar(100),
   sexo char(1),
   email varchar(100),
   codigomedico int,
   FOREIGN KEY (codigomedico) REFERENCES TF_medico(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE TF_endereco_aux(
	cep varchar(9) PRIMARY KEY,
	logradouro varchar(100),
	cidade varchar(100),
	estado varchar(50)
)
