
CREATE TABLE rol (
	rol_id INT NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(500),
    PRIMARY KEY (rol_id)
);

CREATE TABLE tipoidentificacion (
	tipo_identificacion_id INT NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(500),
    PRIMARY KEY (tipo_identificacion_id)
);


CREATE TABLE usuario (
	usuario_id INT NOT NULL AUTO_INCREMENT,
    identificacion VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    tipo_identificacion_id INT NOT NULL,
    rol_id INT NOT NULL,
    PRIMARY KEY (usuario_id),
    FOREIGN KEY (tipo_identificacion_id) REFERENCES tipoidentificacion(tipo_identificacion_id),
    FOREIGN KEY (rol_id) REFERENCES rol(rol_id)
);

CREATE TABLE admins (
	admin_id INT NOT NULL AUTO_INCREMENT,
    identificador VARCHAR(50) NOT NULL,
    clave VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    PRIMARY KEY (admin_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

CREATE TABLE pelicula (
	pelicula_id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    url VARCHAR(3000) NOT NULL,
    estado BOOLEAN NOT NULL,
    usuario_id INT NOT NULL,
    PRIMARY KEY (pelicula_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

ALTER TABLE pelicula
ADD COLUMN imagen VARCHAR(2000) DEFAULT NULL;

CREATE TABLE reserva (
	reserva_id INT NOT NULL AUTO_INCREMENT,
    fechaResera DATE NOT NULL,
    costo FLOAT NOT NULL,
    usuario_id INT NOT NULL,
    pelicula_id INT NOT NULL,
    PRIMARY KEY (reserva_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id),
    FOREIGN KEY (pelicula_id) REFERENCES pelicula(pelicula_id)
);


CREATE TABLE pago (
	pago_id INT NOT NULL AUTO_INCREMENT,
    numero VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    monto FLOAT NOT NULL,
    estado BOOLEAN NOT NULL,
    reserva_id INT NOT NULL,
    PRIMARY KEY (pago_id),
    FOREIGN KEY (reserva_id) REFERENCES reserva(reserva_id)
  
);