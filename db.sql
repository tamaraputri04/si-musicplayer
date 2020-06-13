create table artist(
	artist_id smallint(5) NOT NULL AUTO_INCREMENT,
  artist_name varchar(128),
	primary key(artist_id)
);

create table album(
	artist_id smallint(5),
  album_id smallint(4) NOT NULL AUTO_INCREMENT,
  album_name varchar(128),
	primary key(album_id),
  foreign key (artist_id) references artist(artist_id)
);

create table track(
	track_id smallint(3) NOT NULL AUTO_INCREMENT,
  track_name varchar(128),
  artist_id smallint(5),
  album_id smallint(4),
  time decimal(5,2),
	primary key(track_id),
  foreign key (artist_id) references artist(artist_id),
  foreign key (album_id) references album(album_id)
);

create table played(
  artist_id smallint(5),
  album_id smallint(4),
  track_id smallint(3),
  played timestamp,
  foreign key (artist_id) references artist(artist_id),
  foreign key (album_id) references album(album_id),
  foreign key (track_id) references track(track_id)
);

create table akun(
	id int (5) NOT NULL AUTO_INCREMENT,
	username varchar(50),
	password varchar(40),
	name varchar(128),
	primary key(id)
);
