create table users(
	username varchar(50) not null,
	hashed_password varchar(255) not null,
	primary key (username)
)engine = InnoDB default character set = utf8 collate = utf8_general_ci;

create table pets(
	id smallint unsigned not null auto_increment,
	username varchar(50) not null,
	species enum('fish', 'dog', 'turtle', 'pet rock', 'wolf') not null,
	name varchar(50) not null,
	filename varchar(150) not null,
	weight decimal(4,2) not null,
	description tinytext,
	foreign key (username) references users (username),
	primary key (id)
)engine = InnoDB default character set = utf8 collate = utf8_general_ci;