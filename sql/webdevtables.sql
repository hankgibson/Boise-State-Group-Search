create table user
(
	id int primary key auto_increment, 
	fname varchar(32) not null, 
	lname varchar(32) not null, 
	permission varchar(8) not null,
	email varchar(32) not null,
	password varchar(64) not null,
	class_year varchar(32), 
	birthdateday varchar(16), 
	birthdatemonth varchar(16),
	birthdateyear varchar(16),
	sex char, 
	groupcount int not null
);


create table meetup
(
	id int primary key auto_increment, 
	location varchar(32) not null, 
	max_num_members varchar(4) not null, 
	num_members varchar(4) not null,
	college_name varchar(40) not null,
	course_name varchar(32) not null, 
	instructor varchar(32), 
	meettime varchar(16) not null,
	semester varchar(32),
	days varchar(128) not null,
	createdby varchar(64) not null
);


create table mygroup
(
	student_id int not null, 
	table_id int not null
);


