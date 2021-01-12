
create database login_phool;

use login_phool;

create table usuarios(
				id int auto_increment,
				nombre varchar(50),
				apellido varchar(50),
				usuario varchar(50),
				password text(50),
				primary key(id)
					);