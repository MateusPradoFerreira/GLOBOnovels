create database novela;
use novela;

create table novela(
   codigo int not null primary key auto_increment,
   nomeNovela varchar(100) not null,
   numeroCapitulo varchar(20) not null,
   dataPriCap date,
   dataUltiCap date
);

create table ator(
     codigo int not null primary key auto_increment,
     nomeAtor varchar(35) not null,
     idade varchar(3) not null,
     salario float not null,
     sexoAtor varchar(20) not null,
     cidadeAtor varchar(20) not null
);

insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Caio Castro', '36', 23000, 'Masculino', 'Rio de Janeiro');
insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Will Smith', '53', 57000, 'Masculino', 'Filadelfia');
insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Tom Hanks', '66', 78000, 'Masculino', 'California');
insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Scarlett Johansson', '37', 53000, 'Feminino', 'Manhattan');
insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Monica Bellucci', '57', 82000, 'Feminino', 'Città di Castello');
insert into ator (nomeAtor, idade, salario, sexoAtor, cidadeAtor) values ('Natalie Portman', '41', 67000, 'Feminino', 'California');
   
insert into novela (nomeNovela, numeroCapitulo, dataPriCap, dataUltiCap) values ('Mutantes', '122', '1986/03/23', '1987/11/16');
insert into novela (nomeNovela, numeroCapitulo, dataPriCap, dataUltiCap) values ('Chiquititas', '232', '2008/02/13', '2008/12/16');
insert into novela (nomeNovela, numeroCapitulo, dataPriCap, dataUltiCap) values ('Maria do Bairro', '265', '1996/03/23', '1997/03/21');