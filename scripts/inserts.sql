insert into rol (id_rol,nombre, descripcion, eliminado)values
(1,"admin","administrador",0),
(2,"Empleado","Empleado",0);

insert into usuario(id_usuario,fecha_creacion,eliminado,email,password,nombre,apellido,id_rol)values
(1,CURDATE(),0,"admin@gmail.com",MD5("admin"),'Henry','Aspeti',1),
(2,CURDATE(),0,"cliente@gmail.com",MD5("cliente"),'Antonella','Rocusso',2);


INSERT INTO tipo_cliente (nombre, descripcion) VALUES ('Regular', 'cliente con compras regulares');


insert into comprobante (nombre, cantidad,igv,serie) values ('Recibo',1,0,001 );