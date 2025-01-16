--******************************************************************************
--INCIA CONFIGURACIÓN INICIAL
--******************************************************************************

    -- Creamos la base de datos
    CREATE DATABASE juridico COLLATE SQL_latin1_General_CP1_CS_AS;
    GO

    -- Comenzamos a usar la base de datos
    USE juridico;
    GO

--TERMINA CONFIGURACIÓN INICIAL

--******************************************************************************
--INCIA CREACIÓN DE TABLAS
--******************************************************************************

    CREATE TABLE usuarios(
        --Columnas de cajon
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                DATETIME                        DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY, 
        --Columnas de texto
        nomUsuario                                      VARCHAR(255)                NOT NULL,
        matricula                                   VARCHAR(255)                    NOT NULL,
        clave                                       VARCHAR(255)                    NOT NULL,
        permiso                                     VARCHAR(255)                    NOT NULL ,
        remember_token                              NVARCHAR(100)                   DEFAULT NULL              

    );

    CREATE TABLE firmas(
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                DATETIME                        DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY,

        nombre                                      VARCHAR(255)                    NOT NULL,
        cargo                                       VARCHAR(255)                    NOT NULL,
        matricula                                   VARCHAR(255)                    NOT NULL,
        correo                                      VARCHAR(255)                    NOT NULL                    
    );

    CREATE TABLE historial(
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                DATETIME                        DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY,

        FK_id_usuario                               BIGINT                          NOT NULL FOREIGN KEY REFERENCES usuarios(REGISTRO_id),
        datos                                       VARCHAR(3000)                   NOT NULL,
        nomUsuario                                  VARCHAR(255)                    NOT NULL
    ); 

    CREATE TABLE delegacion(
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                TIME                            DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY,

        delegacion                                  VARCHAR(3000)                   NOT NULL,                                             
    ); 

    CREATE TABLE subdelegacion(
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                DATETIME                        DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY,

        subdelegacion                               VARCHAR(3000)                   NOT NULL,                                             
    ); 

    CREATE TABLE umf(
        REGISTRO_fecha_creacion                     DATETIME                        DEFAULT GETDATE(),
        REGISTRO_fecha_ultimo_cambio                DATETIME                        DEFAULT GETDATE(),
        REGISTRO_en_uso                             BIT                             NOT NULL DEFAULT 1,
        REGISTRO_id                                 BIGINT                          NOT NULL PRIMARY KEY IDENTITY,

        umf                                         VARCHAR(3000)                   NOT NULL,                                             
    ); 



        SET ANSI_NULLS ON
        GO

        SET QUOTED_IDENTIFIER ON
        GO

        CREATE TABLE [dbo].[personal_access_tokens](
            [id] [bigint] IDENTITY(1,1) NOT NULL,
            [tokenable_type] [nvarchar](255) NOT NULL,
            [tokenable_id] [bigint] NOT NULL,
            [name] [nvarchar](255) NOT NULL,
            [token] [nvarchar](64) NOT NULL,
            [abilities] [nvarchar](max) NULL,
            [last_used_at] [datetime2](7) NULL,
            [expires_at] [datetime2](7) NULL,
            [created_at] [datetime2](7) NULL,
            [updated_at] [datetime2](7) NULL,
        PRIMARY KEY CLUSTERED 
        (
            [id] ASC
        )WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
        ) ON [PRIMARY]

        GO

--TERMINA CREACIÓN DE TABLAS

--******************************************************************************
--INICIA INSERCIÓN DE DATOS
--******************************************************************************

    --Ejemplo de inserción
    INSERT INTO usuarios(nomUsuario, matricula, clave, permiso) 
    VALUES ('Admin', '311220581', '1234l', 'Administrador');
    INSERT INTO usuarios(nomUsuario, matricula, clave, permiso)
    VALUES ('samuel', '311220583', 'samuel123', 'Sin permiso');

    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.RICARDO VALENZUELA ALVARADO','Abogado Procurador', '311220586', 'ricar@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.ALICIA JIMENEZ TORREZ', 'Abogado Procurador', '311220534', 'ali@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.VICTOR HUGO MARTINEZ URIARTE', 'Abogado Procurador', '3112205856', 'hugo@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.GABRIELA GARCIA SANCHEZ', 'Abogado Procurador', '3112205934', 'gabi@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.NAHUM URBINA MARTINEZ', 'Abogado Procurador', '3112202342', 'nahum@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.CLAUDIA ALEJANDRA OLVERA JUAREZ', 'Abogado Procurador', '3112252345', 'clau@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.LUIS RAMON', 'Jefe de Departamento', '314353534', 'luis@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.CLAUDIA RODRIGUEZ RAMOS', 'Jefe de Departamento', '311746457', 'claudram@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.GUADALUPE THALIA PÉREZ PORRAS', 'Jefe de Oficina', '311234634', 'thalia@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.GUADALUPE MIRANDA JUAREZ', 'Jefe de Oficina', '311234633', 'thaliaMIRANDA@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('LIC.GUADALUPE MARIA PÉREZ PORRAS', 'Jefe de Oficina', '3112346347', 'thalia@gmail.com');
    INSERT INTO firmas(nombre, cargo, matricula, correo)
    VALUES ('MTRA.YOLANDA ALVARADO CAMACHO', 'Titular de Jefatura', '3112242434', 'yol@gmail.com')


    INSERT INTO delegacion(delegacion)
    VALUES ('Aguascalientes');
    INSERT INTO delegacion(delegacion)
    VALUES ('Baja California');
    INSERT INTO delegacion(delegacion)
    VALUES ('Baja California Sur');
    INSERT INTO delegacion(delegacion)
    VALUES ('Campeche');
    INSERT INTO delegacion(delegacion)
    VALUES ('Chiapas');
    INSERT INTO delegacion(delegacion)
    VALUES ('Chihuahua');
    INSERT INTO delegacion(delegacion)
    VALUES ('Coahuila');
    INSERT INTO delegacion(delegacion)
    VALUES ('Colima');
    INSERT INTO delegacion(delegacion)
    VALUES ('Durango');
    INSERT INTO delegacion(delegacion)
    VALUES ('Estado de México');
    INSERT INTO delegacion(delegacion)
    VALUES ('Guanajuato');
    INSERT INTO delegacion(delegacion)
    VALUES ('Guerrero');
    INSERT INTO delegacion(delegacion)
    VALUES ('Hidalgo');
    INSERT INTO delegacion(delegacion)
    VALUES ('Jalisco');
    INSERT INTO delegacion(delegacion)
    VALUES ('Michoacán de Ocampo');
    INSERT INTO delegacion(delegacion)
    VALUES ('Morelos');
    INSERT INTO delegacion(delegacion)
    VALUES ('Nayarit');
    INSERT INTO delegacion(delegacion)
    VALUES ('Nuevo León');
    INSERT INTO delegacion(delegacion)
    VALUES ('Oaxaca');
    INSERT INTO delegacion(delegacion)
    VALUES ('Puebla');
    INSERT INTO delegacion(delegacion)
    VALUES ('Querétaro');
    INSERT INTO delegacion(delegacion)
    VALUES ('Quintana Roo');
    INSERT INTO delegacion(delegacion)
    VALUES ('San Luis Potosí');
    INSERT INTO delegacion(delegacion)
    VALUES ('Sinaloa');
    INSERT INTO delegacion(delegacion)
    VALUES ('Sonora');
    INSERT INTO delegacion(delegacion)
    VALUES ('Tabasco');
    INSERT INTO delegacion(delegacion)
    VALUES ('Tamaulipas');
    INSERT INTO delegacion(delegacion)
    VALUES ('Tlaxcala');
    INSERT INTO delegacion(delegacion)
    VALUES ('Yucatán');
    INSERT INTO delegacion(delegacion)
    VALUES ('Zacatecas');
    INSERT INTO delegacion(delegacion)
    VALUES ('Ciudad de México Norte');
    INSERT INTO delegacion(delegacion)
    VALUES ('Ciudad de México Sur');
    INSERT INTO delegacion(delegacion)
    VALUES ('México Oriente');
    INSERT INTO delegacion(delegacion)
    VALUES ('México Poniente');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 01 HES CMN La Raza');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 02 HES CMN Siglo XXI');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 11 HGO CMN La Raza');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 12 HGO San Angel');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 15 HTO Magdalena Salinas');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 16 HTO Lomas Verdes');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 19 HP CMN Siglo XXI');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 21 HC CMN Siglo XXI');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 24 HG CMN La Raza');
    INSERT INTO delegacion(delegacion)
    VALUES ('UMAE 25 HOnco CMN Siglo XXI');
    INSERT INTO delegacion(delegacion)
    VALUES ('Veracruz Norte');
    INSERT INTO delegacion(delegacion)
    VALUES ('Veracruz Sur')
    


    INSERT INTO subdelegacion(subdelegacion)
    VALUES ('Subdelegación Puebla Norte');
    INSERT INTO subdelegacion(subdelegacion)
    VALUES ('Subdelegación Puebla Sur');
    INSERT INTO subdelegacion(subdelegacion)
    VALUES ('Subdelegación Tehuacan');
    INSERT INTO subdelegacion(subdelegacion)
    VALUES ('Subdelegación Teziutlan');
    INSERT INTO subdelegacion(subdelegacion)
    VALUES ('Subdelegación Izucar de Matamoros')


    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.01');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.02');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.03');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.04');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.06');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.07');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.08');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.09');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.11');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.12');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.13');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.14');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.16');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.17');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.18');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.19');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.21');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.22');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.24');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.25');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.26');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.27');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.28');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.29');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.30');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.31');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.32');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.33');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.34');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.37');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.38');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.40');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.41');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.42');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.43');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.44');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.46');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.47');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.49');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.50');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.55');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.56');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.57');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.58');
    INSERT INTO umf(umf)
    VALUES ('Unidad de Medicina Familiar No.39')
    
    








--TERMINA INSERCIÓN DE DATOS
