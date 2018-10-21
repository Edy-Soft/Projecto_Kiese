CREATE DATABASE db_kiese;

USE db_kiese;

drop table sinistro;

-- Criação das tabelas --

CREATE TABLE cliente (
 id_cliente INT(7) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 nome_completo VARCHAR(60) NOT NULL,
 numero_bi VARCHAR(20) NOT NULL,
 data_nascimento DATE NOT NULL,
 email VARCHAR(40) NOT NULL UNIQUE,
 senha VARCHAR(40) NOT NULL DEFAULT "123456789"
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cliente (nome_completo, numero_bi, data_nascimento, email) 
	VALUES ('António Dias','004014579LA034','1965-10-17','dias@gmail.com');

SELECT * FROM cliente;

CREATE TABLE telefone (
 id_telefone INT(7) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 numero_telefone INT(9) NOT NULL,
 cliente INT(7) ZEROFILL NOT NULL,
 CONSTRAINT tel_cliente FOREIGN kEY (cliente) REFERENCES cliente (id_cliente) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO telefone (numero_telefone, cliente) VALUES (924453056, 3);

SELECT * FROM telefone;

CREATE TABLE provincia (
 id_provincia VARCHAR(2) NOT NULL PRIMARY KEY,
 nome VARCHAR(15) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO provincia (id_provincia, nome) VALUES ('BE','Benguela');

SELECT * FROM provincia;

CREATE TABLE municipio (
 id_municipio INT(3) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(20) NOT NULL,
 provincia VARCHAR(2) NOT NULL,
 CONSTRAINT FK_MunProvincia FOREIGN KEY (provincia) REFERENCES provincia(id_provincia) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO municipio (nome, provincia) VALUES ('Cazenga','LA');

SELECT * FROM municipio;

CREATE TABLE endereco (
 id_endereco INT(6) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 bairro VARCHAR(40) NOT NULL,
 rua VARCHAR(40) NOT NULL,
 ponto_referencia VARCHAR(60) NOT NULL,
 municipio INT(3) ZEROFILL NOT NULL,
 provincia VARCHAR(2) NOT NULL,
 cliente INT(7) ZEROFILL NOT NULL,
 CONSTRAINT FK_MunicipioEndereco FOREIGN KEY (municipio) REFERENCES municipio (id_municipio) ON DELETE CASCADE,
 CONSTRAINT FK_ProvinciaEndereco FOREIGN KEY (provincia) REFERENCES provincia (id_provincia) ON DELETE CASCADE,
 CONSTRAINT FK_ClienteEndereco FOREIGN KEY (cliente) REFERENCES cliente (id_cliente) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO endereco (bairro, rua, ponto_referencia, municipio, provincia, cliente)
 VALUES ('Cassenda','João Pessoa','Loja da Zap', 1, 'LA', 3);
 
 SELECT * FROM endereco;

CREATE TABLE marca_modelo (
 id_marca_modelo INT(5) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 marca_modelo VARCHAR(40) NOT NULL,
 valor_padrao DOUBLE(10,2) NOT NULL,
 percentagem DOUBLE DEFAULT 0.15,
 valor_seguro DOUBLE(10,2) AS (valor_padrao * percentagem)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO marca_modelo (marca_modelo, valor_padrao) VALUES ('Apple Iphone 6S 128GB','494120');

SELECT * FROM marca_modelo;

CREATE TABLE bem (
 id_bem INT(8) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 imei VARCHAR(30) NOT NULL UNIQUE,
 cor VARCHAR(20) NOT NULL,
 imagem VARCHAR(60) NOT NULL DEFAULT '',
 factura VARCHAR(60) NOT NULL DEFAULT '',
 valor_compra DOUBLE(10,2) NOT NULL,
 data_compra DATE NOT NULL,
 data_registo TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 marca_modelo INT(5) ZEROFILL NOT NULL,
 proprietario INT(7) ZEROFILL NOT NULL,
  CONSTRAINT FK_MarcaModeloBem FOREIGN KEY (marca_modelo) REFERENCES marca_modelo(id_marca_modelo) ON DELETE CASCADE,
  CONSTRAINT FK_ClienteBem FOREIGN KEY (proprietario) REFERENCES cliente(id_cliente) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO bem (imei, cor, valor_compra, data_compra, marca_modelo, proprietario)
 VALUES ('00fffooo12','Azul e Branca','542124','2014-05-12', 1, 3);
 
 SELECT * FROM bem; 

CREATE TABLE seguro (
 apolice INT(8) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
 status BOOLEAN NOT NULL DEFAULT false,
 pagamento INT(1) NOT NULL,
 data_seguro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 data_activacao DATE DEFAULT "0000-00-00",
 bem INT(8) ZEROFILL NOT NULL,
 segurado INT(7) ZEROFILL NOT NULL,
  CONSTRAINT FK_SeguroBem FOREIGN KEY (bem) REFERENCES bem (id_bem) ON DELETE CASCADE,
  CONSTRAINT FK_SeguroCliente FOREIGN KEY (segurado) REFERENCES cliente (id_cliente) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO seguro (pagamento, bem, segurado) VALUES (2,5,1);

SELECT * FROM seguro;

CREATE TABLE sinistro ( 
 id_sinistro INT(8) ZEROFILL PRIMARY KEY AUTO_INCREMENT, 
 descricao VARCHAR(255) NOT NULL,
 tipo VARCHAR(20) NOT NULL,
 part_policia VARCHAR(60) NOT NULL DEFAULT '',
 data TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
 beneficiario INT(7) ZEROFILL NOT NULL,
 CONSTRAINT FK_SinistroCliente FOREIGN KEY (beneficiario) REFERENCES cliente (id_cliente) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sinistro (descricao, tipo, beneficiario) VALUES ('Assalto a mão armada','roubo',4);

SELECT * FROM sinistro;

CREATE TABLE sinistro_seguro (
 sinistro INT(8) ZEROFILL,
 apolice INT(8) ZEROFILL, 
 PRIMARY kEY(sinistro, apolice),
 CONSTRAINT FK_SinistroSeguro_Sinistro FOREIGN KEY (sinistro) REFERENCES sinistro (id_sinistro) ON DELETE CASCADE,
 CONSTRAINT FK_SinistroSeguro_Seguro FOREIGN KEY (apolice) REFERENCES seguro (apolice) ON DELETE CASCADE
);

CREATE TABLE sinistro_bem (
 sinistro INT(8) ZEROFILL,
 bem INT(8) ZEROFILL, 
 PRIMARY kEY(sinistro, bem),
 CONSTRAINT FK_SinistroBem_Sinistro FOREIGN KEY (sinistro) REFERENCES sinistro (id_sinistro) ON DELETE CASCADE,
 CONSTRAINT FK_SinistroBem_Bem FOREIGN KEY (bem) REFERENCES bem (id_bem) ON DELETE CASCADE
);
