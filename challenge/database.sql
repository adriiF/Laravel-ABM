

CREATE DATABASE IF NOT EXISTS challenge;

USE challenge;
CREATE TABLE IF NOT EXISTS users(
id            int(255) auto_increment not null,
role          varchar(20),
name          varchar(100),
surname        varchar(200),
nick           varchar(100),
email          varchar(255),
password        varchar(255),
image           varchar(255),
created_at      datetime,
updated_at        datetime,
remember_token   varchar(255),

CONSTRAINT pk_users PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS empresas(
id            int(255) auto_increment not null,
user_id        int(255),
nombre         varchar(200),
cuit           varchar(100),
provincia      varchar(200),
localidad     varchar(200),
created_at      datetime,
updated_at        datetime,
CONSTRAINT pk_empresas PRIMARY KEY(id),
CONSTRAINT  fk_empresas_users FOREIGN KEY(user_id) REFERENCES users(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS sucursales(
id            int(255) auto_increment not null,
user_id        int(255),
empresa_id        int(255),
nombre         varchar(200),
provincia      varchar(200),
localidad     varchar(200),
created_at      datetime,
updated_at        datetime,
CONSTRAINT pk_sucursales PRIMARY KEY(id),
CONSTRAINT  fk_sucursales_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT  fk_sucursales_empresas FOREIGN KEY(empresa_id) REFERENCES empresas(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS empleados(
id            int(255) auto_increment not null,
user_id        int(255),
empresa_id        int(255),
sucursal_id       int(255),
nombre         varchar(200),
provincia      varchar(200),
localidad     varchar(200),
created_at      datetime,
updated_at        datetime,
CONSTRAINT pk_empleados PRIMARY KEY(id),
CONSTRAINT  fk_empleados_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT  fk_empleados_empresas FOREIGN KEY(empresa_id) REFERENCES empresas(id),
CONSTRAINT  fk_empleados_sucursaless FOREIGN KEY(sucursal_id) REFERENCES sucursales(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS empresasSucursales(
id            int(255) auto_increment not null,
user_id        int(255),
empresa_id        int(255),
sucursal_id       int(255),
created_at      datetime,
updated_at        datetime,
CONSTRAINT pk_empresasSucursales PRIMARY KEY(id),
CONSTRAINT  fk_empresasSucursales_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT  fk_empresasSucursales_sucursaless FOREIGN KEY(sucursal_id) REFERENCES sucursales(id)
)ENGINE=InnoDb;


INSERT INTO users VALUES (NULL, 'user', 'Adriana','fernandez','adri','adri@gmail.com','12352',null,CURTIME(),CURTIME(),NULL);
INSERT INTO users VALUES (NULL, 'user', 'Marcelo','Cordoba','marce','marce@gmail.com','pass',null,CURTIME(),CURTIME(),NULL);
INSERT INTO users VALUES (NULL, 'user', 'Laura','Lopex','lau','lau@gmail.com','pass',null,CURTIME(),CURTIME(),NULL);


/*insertar empresas*/
INSERT INTO empresas VALUES (NULL, 1, 'coca cola','12365478236','Buenos aires','Bahia blanca',CURTIME(),CURTIME());

INSERT INTO empresas VALUES (NULL, 1, 'Marolio','123236','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO empresas VALUES (NULL, 2, 'Pepa','123236','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO empresas VALUES (NULL, 2, 'tubito','123236','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO empresas VALUES (NULL, 3, 'la reina','123236','buenos aires','campana',CURTIME(),CURTIME());
INSERT INTO empresas VALUES (NULL, 3, 'la bella','123236','chaco','resitencia',CURTIME(),CURTIME());
/*insertar sucursales*/
coca
INSERT INTO sucursales VALUES (NULL, 1, 1,'coca cola1','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 1, 1,'coca cola2','chaco','resitencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 2, 1,'coca cola3','corrientes','corrientes',CURTIME(),CURTIME());
marolio


INSERT INTO sucursales VALUES (NULL, 2, 2,'Marolio1','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 2, 2,'Marolio2','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 3, 2,'MArolio3','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 1, 2,'MArolio4','santa fe','florencia',CURTIME(),CURTIME());


INSERT INTO sucursales VALUES (NULL, 2, 3,'Pepa1','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 2, 3,'Pepa2','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO sucursales VALUES (NULL, 3, 3,'Pepa3','santa fe','florencia',CURTIME(),CURTIME());


INSERT INTO sucursales VALUES (NULL, 3, 5,'la bella1','santa fe','florencia',CURTIME(),CURTIME());

/*insertar empleados*/

INSERT INTO empleados VALUES (NULL, 3, 5,null,'Matias Gomez','chaco','resistenica',CURTIME(),CURTIME());
INSERT INTO empleados VALUES (NULL, 2, 1,null,'Jose Gomez','santa fe','florencia',CURTIME(),CURTIME());

INSERT INTO empleados VALUES (NULL, 2, 1,1,'florencia Perez','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO empleados VALUES (NULL, 2, 2,4,'cintia lopez','santa fe','florencia',CURTIME(),CURTIME());

INSERT INTO empleados VALUES (NULL, 3, 3,8,'maria Perez','santa fe','florencia',CURTIME(),CURTIME());
INSERT INTO empleados VALUES (NULL, 3, 3,8,'Lucas Perez','santa fe','florencia',CURTIME(),CURTIME());

