DROP TABLE IF EXISTS pets5;

CREATE TABLE pets5(
id int(10) NOT NULL AUTO_INCREMENT primary key,
name varchar(255) NOT NULL,
color varchar(255) NOT NULL,
type varchar(255) NOT NULL
);

insert into pets5 Values(null, 'Mango', 'gold', 'cat');
insert into pets5 Values(null, 'Zorgbalosizium', 'purple', 'octopus');