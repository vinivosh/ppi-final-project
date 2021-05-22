CREATE TABLE pessoatrabfinal
(
   codigo int PRIMARY KEY auto_increment,
   nome varchar(50),
   sexo varchar(1),
   email varchar(50) UNIQUE,
   telefone bigint,
   cep bigint,
   logradouro varchar(50),
   cidade varchar(50),
   estado varchar(50)
) ENGINE=InnoDB;

CREATE TABLE pacientetrabfinal
(
   codigo int UNIQUE,
   peso decimal,
   altura decimal,
   tiposanguineo varchar(3),
   FOREIGN KEY (codigo) REFERENCES pessoatrabfinal(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE funcionariotrabfinal
(
   codigo int UNIQUE,
   datacontrato date,
   salario decimal,
   hash_senha varchar(255),
   FOREIGN KEY (codigo) REFERENCES pessoatrabfinal(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;



CREATE TABLE medicotrabfinal
(
   codigo int UNIQUE,
   especialidade varchar(50),
   crm bigint UNIQUE,
   FOREIGN KEY (codigo) REFERENCES funcionariotrabfinal(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;



CREATE TABLE agendatrabfinal
(
   codigo int PRIMARY KEY auto_increment
   dataconsulta date,
   horario time,
   nome varchar(50),
   sexo varchar(1),
   email varchar(50),
   codigomedico int,
   FOREIGN KEY (codigomedico) REFERENCES medicotrabfinal(codigo) ON DELETE CASCADE
) ENGINE=InnoDB;

