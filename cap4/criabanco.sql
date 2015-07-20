drop table aluno;
drop table inscricao;
drop table turma;
drop table curso;

create table aluno (id integer, nome varchar(40), endereco varchar(40), telefone varchar(40), cidade varchar(40));
create table inscricao (id serial, ref_aluno integer, ref_turma integer, nota float, frequencia float, cancelada boolean, concluida boolean);
create table turma (id integer, dia_semana integer, turno char(1), professor varchar(40), sala varchar(20), data_inicio date, encerrada boolean, ref_curso integer);
create table curso (id integer, descricao varchar(40), duracao integer, carga_horaria integer);

delete from aluno;
delete from inscricao;
delete from turma;
delete from curso;

insert into aluno values (01, 'LEONARDO ALVES',       'Rua Érico Veríssimo', '(51) 1000-1001', 'Porto Alegre');
insert into aluno values (02, 'ELCIO ANCHIETA',       'Rua Érico Veríssimo', '(51) 1000-1002', 'Porto Alegre');
insert into aluno values (03, 'ANTONIO ARMINDO',      'Rua Érico Veríssimo', '(51) 1000-1003', 'Porto Alegre');
insert into aluno values (04, 'GILSON AZEREDO',       'Rua Érico Veríssimo', '(51) 1000-1004', 'Porto Alegre');
insert into aluno values (05, 'HENRIQUE BARBOSA',     'Rua Érico Veríssimo', '(51) 1000-1005', 'Porto Alegre');
insert into aluno values (06, 'RAFAEL BARRETO',       'Rua Érico Veríssimo', '(51) 1000-1006', 'Porto Alegre');
insert into aluno values (07, 'LUIZ BENEDITO',        'Rua Érico Veríssimo', '(51) 1000-1007', 'Porto Alegre');
insert into aluno values (08, 'MARIA BENJAMIM',       'Rua Érico Veríssimo', '(51) 1000-1008', 'Porto Alegre');
insert into aluno values (09, 'KELISON BRANCO',       'Rua Érico Veríssimo', '(51) 1000-1009', 'Porto Alegre');
insert into aluno values (10, 'KEILA BRESSAN',        'Rua Érico Veríssimo', '(51) 1000-1010', 'Porto Alegre');
insert into aluno values (11, 'ANA CLAUDIA BRITO',    'Rua Anita Garibaldi', '(54) 1000-1011', 'Caxias do Sul');
insert into aluno values (12, 'FABIANA CALANDRINI',   'Rua Anita Garibaldi', '(54) 1000-1012', 'Caxias do Sul');
insert into aluno values (13, 'VIVIANE CARVALHO',     'Rua Anita Garibaldi', '(54) 1000-1013', 'Caxias do Sul');
insert into aluno values (14, 'FRANCISCO CAVALCANTE', 'Rua Anita Garibaldi', '(54) 1000-1014', 'Caxias do Sul');
insert into aluno values (15, 'NELSON COLOGNESE',     'Rua Anita Garibaldi', '(54) 1000-1015', 'Caxias do Sul');
insert into aluno values (16, 'CARLOS CRUZ',          'Rua Anita Garibaldi', '(54) 1000-1016', 'Caxias do Sul');
insert into aluno values (17, 'CLAUDIO DA ROCHA',     'Rua Anita Garibaldi', '(54) 1000-1017', 'Caxias do Sul');
insert into aluno values (18, 'SILVA DIVINO',         'Rua Anita Garibaldi', '(54) 1000-1018', 'Caxias do Sul');
insert into aluno values (19, 'MARCELO FERREIRA',     'Rua Anita Garibaldi', '(54) 1000-1019', 'Caxias do Sul');
insert into aluno values (20, 'ANDRE FONTOURA',       'Rua Anita Garibaldi', '(54) 1000-1020', 'Caxias do Sul');
insert into aluno values (21, 'HELEN GARCIA',         'Rua Bento Gonçalves', '(51) 1000-1021', 'Lajeado');
insert into aluno values (22, 'ANGELA LEITE',         'Rua Bento Gonçalves', '(51) 1000-1022', 'Lajeado');
insert into aluno values (23, 'LUCAS LEMOS',          'Rua Bento Gonçalves', '(51) 1000-1023', 'Lajeado');
insert into aluno values (24, 'MARLON MACHADO',       'Rua Bento Gonçalves', '(51) 1000-1024', 'Lajeado');
insert into aluno values (25, 'ROSANA MAGALHAES',     'Rua Bento Gonçalves', '(51) 1000-1025', 'Lajeado');
insert into aluno values (26, 'INEZ MARQUES',         'Rua Bento Gonçalves', '(51) 1000-1026', 'Lajeado');
insert into aluno values (27, 'ANTONIO MATTOS',       'Rua Bento Gonçalves', '(51) 1000-1027', 'Lajeado');
insert into aluno values (28, 'JULIO MENDES',         'Rua Bento Gonçalves', '(51) 1000-1028', 'Lajeado');
insert into aluno values (29, 'PATRICIA MOREIRA',     'Rua Bento Gonçalves', '(51) 1000-1029', 'Lajeado');
insert into aluno values (30, 'FRANCISCO OLIVEIRA',   'Rua Bento Gonçalves', '(51) 1000-1030', 'Lajeado');
insert into aluno values (31, 'JANINE PADILHA',       'Rua Rodrigo Cambará', '(41) 1000-1031', 'Curitiba');
insert into aluno values (32, 'LOURDES PANIZZI',      'Rua Rodrigo Cambará', '(41) 1000-1032', 'Curitiba');
insert into aluno values (33, 'PEDRO PEIXOTO',        'Rua Rodrigo Cambará', '(41) 1000-1033', 'Curitiba');
insert into aluno values (34, 'ANTONIO PESSOA',       'Rua Rodrigo Cambará', '(41) 1000-1034', 'Curitiba');
insert into aluno values (35, 'WALTER PIMENTEL',      'Rua Rodrigo Cambará', '(41) 1000-1035', 'Curitiba');
insert into aluno values (36, 'MARIA REZENDE',        'Rua Rodrigo Cambará', '(41) 1000-1036', 'Curitiba');
insert into aluno values (37, 'ANTONIO RODRIGUES',    'Rua Rodrigo Cambará', '(41) 1000-1037', 'Curitiba');
insert into aluno values (38, 'MAURO ROMANO',         'Rua Rodrigo Cambará', '(41) 1000-1038', 'Curitiba');
insert into aluno values (39, 'MICHEL RONDINI',       'Rua Rodrigo Cambará', '(41) 1000-1039', 'Curitiba');
insert into aluno values (40, 'EMANUELLE SANTOS',     'Rua Rodrigo Cambará', '(41) 1000-1040', 'Curitiba');


insert into curso values (01, 'Orientação a Objetos com PHP',   24);
insert into curso values (02, 'Desenvolvendo em PHP-GTK',       32);
insert into curso values (02, 'Desenvolvendo Web Sites',        40);
insert into curso values (02, 'Programando em PHP com Mysql',   24);


delete from turma;
insert into turma values (01, 2, 'M', 'Pablo Dall Oglio', 100, '2007-03-01', FALSE, 01);
insert into turma values (02, 2, 'T', 'Pablo Dall Oglio', 100, '2007-03-01', FALSE, 02);
insert into turma values (03, 4, 'M', 'Pablo Dall Oglio', 100, '2007-03-01', FALSE, 01);
insert into turma values (04, 4, 'T', 'Pablo Dall Oglio', 100, '2007-03-01', FALSE, 02);
insert into turma values (05, 2, 'M', 'Fabio Locatelli',  200, '2007-03-01', FALSE, 03);
insert into turma values (06, 2, 'T', 'Fabio Locatelli',  200, '2007-03-01', FALSE, 04);
insert into turma values (07, 4, 'M', 'Fabio Locatelli',  200, '2007-03-01', FALSE, 03);
insert into turma values (08, 4, 'T', 'Fabio Locatelli',  200, '2007-03-01', FALSE, 04);


delete from inscricao;
insert into inscricao (ref_aluno, ref_turma) select id, '01' from aluno where id between 01 and 10;
insert into inscricao (ref_aluno, ref_turma) select id, '02' from aluno where id between 11 and 20;
insert into inscricao (ref_aluno, ref_turma) select id, '03' from aluno where id between 21 and 30;
insert into inscricao (ref_aluno, ref_turma) select id, '04' from aluno where id between 31 and 40;

update inscricao set nota=0;
update inscricao set frequencia=80;
update inscricao set cancelada=FALSE;
update inscricao set concluida=FALSE;
update inscricao set nota=8 where ref_aluno in (select id from aluno where nome ilike '%EN%');
