create table category(
	id int(11) NOT NULL AUTO_INCREMENT,
  aname varchar(100),
  text varchar(100),
	primary key(id)
);

create table post(
	id int(11) NOT NULL AUTO_INCREMENT,
  date date,
  slug varchar(25),
  title varchar(100),
  text text,
  cat_id int(11),
	primary key(id),
  foreign key (cat_id) references category(id)
);

create table photos(
  id int(11) NOT NULL AUTO_INCREMENT,
  date date,
  title varchar(100),
  text text,
  post_id int(11),
  primary key(id),
  foreign key (post_id) references post(id)
);

create table album(
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100),
  text text,
  photo_id int(11),
  primary key(id),
  foreign key (photo_id) references photos(id));

create table akun(
	id int (5) NOT NULL AUTO_INCREMENT,
	username varchar(50),
	password varchar(40),
	name varchar(128),
	primary key(id)
);
