
-- Crear la tabla INFORMACION_ACUDIENTE
CREATE TABLE INFORMACION_ACUDIENTE_ASPIRANTE (
    Id_Informacion_Acudiente_Aspirante INT(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Id_Gestion_Usuarios INT(20) NOT NULL,
    Id_Solicitud_Cupo INT(20) NOT NULL,
    --Informacion Acudiente
    Numero_Identificacion_Acudiente VARCHAR(250) NOT NULL,
    Tipo_Identificacion_Acudiente VARCHAR(250) NOT NULL,
    Primer_Nombre_Acudiente VARCHAR(250) NOT NULL,
    Segundo_Nombre_Acudiente VARCHAR(250),
    Primer_Apellido_Acudiente VARCHAR(250) NOT NULL,
    Segundo_Apellido_Acudiente VARCHAR(250),
    Fecha_Nacimiento_Acudiente DATE NOT NULL,
    Genero_Acudiente VARCHAR(250) NOT NULL,
    Parentesco_Acudiente VARCHAR(250) NOT NULL,
    Numero_Contacto_Acudiente VARCHAR(250) NOT NULL,
    Correo_Electronico_Acudiente VARCHAR(250) NOT NULL,
    Tipo_discapacidad_Acudiente VARCHAR(250) NOT NULL,
    --Informacion Aspirante
    Numero_Identificacion_Aspirante VARCHAR(250) NOT NULL,
    Tipo_Identificacion_Aspirante VARCHAR(250) NOT NULL,
    Primer_Nombre_Aspirante VARCHAR(250) NOT NULL,
    Segundo_Nombre_Aspirante VARCHAR(250),
    Primer_Apellido_Aspirante VARCHAR(250) NOT NULL,
    Segundo_Apellido_Aspirante VARCHAR(250),
    Fecha_Nacimiento_Aspirante DATE NOT NULL,
    Genero_Aspirante VARCHAR(250) NOT NULL,
    Parentesco_Aspirante VARCHAR(250) NOT NULL,
    Numero_Contacto_Aspirante VARCHAR(250) NOT NULL,
    Correo_Electronico_Aspirante VARCHAR(250) NOT NULL,
    Tipo_discapacidad_Aspirante VARCHAR(250) NOT NULL,
    --Informacion Colegio
    Eleccion_Grado VARCHAR(250) NOT NULL,
    Traslado_Colegio VARCHAR(4) NOT NULL,
    --Informacion Residencia
    Direccion_Residencia VARCHAR(250) NOT NULL,
    Estrato VARCHAR(10) NOT NULL,
    Barrio VARCHAR(250) NOT NULL,
    Comuna VARCHAR(250) NOT NULL,
    --Informacion General
    Victima_Conflicto VARCHAR(250) NOT NULL,
    Tipo_Desplazamiento VARCHAR(250) NOT NULL,
    CONSTRAINT FK_INFORMACION_ACUDIENTE_ASPIRANTE_GESTION_USUARIOS FOREIGN KEY (Id_Gestion_Usuarios) REFERENCES GESTION_USUARIOS(Id_Gestion_Usuarios)
    CONSTRAINT FK_INFORMACION_ACUDIENTE_ASPIRANTE_SOLICITUD_CUPO FOREIGN KEY (Id_Solicitud_Cupo) REFERENCES SOLICITUD_CUPO(Id_Solicitud_Cupo)
);

Claro, aquí tienes el código para insertar 5 registros en la tabla `INFORMACION_ACUDIENTE_ASPIRANTE`. Asegúrate de que los valores de `Id_Gestion_Usuarios` y `Id_Solicitud_Cupo` existan en las tablas correspondientes.


-- Crear la tabla GESTION_USUARIOS
CREATE TABLE GESTION_USUARIOS (
    Id_Gestion_Usuarios INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Primer_Nombre VARCHAR(250) NOT NULL,                        
    Segundo_Nombre VARCHAR(250),                       
    Primer_Apellido VARCHAR(250) NOT NULL,                      
    Segundo_Apellido VARCHAR(250),                     
    Correo_Electronico VARCHAR(250) NOT NULL,                   
    Contraseña VARCHAR(250) NOT NULL,                           
    Numero_Contacto VARCHAR(13) NOT NULL                       
);


-- Crear la tabla SOLICITUD_CUPO
CREATE TABLE SOLICITUD_CUPO (
    Id_Solicitud_Cupo INT(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Radicado INT NOT NULL,
    Estado_Solicitud VARCHAR(50) NOT NULL,                                    
    ID_Grado_Cupos INT NOT NULL,                              
    CONSTRAINT FK_SOLICITUD_CUPO_GRADO_CUPOS FOREIGN KEY (Id_Grado_Cupos) REFERENCES GRADO_CUPOS(Id_Grado_Cupos)
);


-- Crear el TRIGGER para incrementar el valor de Radicado
DELIMITER //
CREATE TRIGGER before_insert_solicitud_cupo
BEFORE INSERT ON SOLICITUD_CUPO
FOR EACH ROW
BEGIN
    SET NEW.Radicado = (SELECT IFNULL(MAX(Radicado), 99) + 1 FROM SOLICITUD_CUPO);
END;
//
DELIMITER ;


-- Crear la tabla GRADO_CUPOS
CREATE TABLE GRADO_CUPOS (
    Id_Grado_Cupos INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nombre_Grado VARCHAR(50) NOT NULL,                     
    Cantidad_Cupo_Grado INT NOT NULL                      
    
);



-- Índices para la tabla GRADO_CUPOS
CREATE INDEX IDX_GRADO_CUPOS_Nombre_Grado ON GRADO_CUPOS (Nombre_Grado);

-- Índices para la tabla SOLICITUD_CUPO
CREATE INDEX IDX_SOLICITUD_CUPO_Radicado ON SOLICITUD_CUPO (Radicado);
CREATE INDEX IDX_SOLICITUD_CUPO_ID_Grado_Cupos ON SOLICITUD_CUPO (ID_Grado_Cupos);