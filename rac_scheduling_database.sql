DROP TABLE IF EXISTS Schedule;
DROP TABLE IF EXISTS Student_Machines;
DROP TABLE IF EXISTS Student_Notes;
DROP TABLE IF EXISTS Machines;
DROP TABLE IF EXISTS Student;

CREATE TABLE Student (student_id VARCHAR(10) PRIMARY KEY NOT NULL,
					student_first_name VARCHAR(30), 
					student_last_name VARCHAR(30),
					student_password VARCHAR(30));   
					
CREATE TABLE Machines (machine_id INTEGER PRIMARY KEY NOT NULL,
					machine_name VARCHAR(30)); 

CREATE TABLE Student_Machines (machine_use_id INTEGER PRIMARY KEY NOT NULL,
					student_id VARCHAR(10),
					machine_id INTEGER,
					FOREIGN KEY student_id REFERENCES Student(student_id), 
					FOREIGN KEY machine_id REFERENCES Machine(machine_id));   
					
CREATE TABLE Student_Notes (note_id INTEGER PRIMARY KEY NOT NULL,
					student_id VARCHAR(10), 
					note_date VARCHAR(20),
					note_content TEXT,
					FOREIGN KEY student_id REFERENCES Student(student_id)));
					/*there is an issue with this foreign key constraint and 
					having notes store in the database. This issue will be remedied with
					javascript. as of now, this foreign key constraint is not immplemented. */
					
CREATE TABLE Schedule (time_block INTEGER PRIMARY KEY NOT NULL,
					student_id VARCHAR(10) NULL, 
					machine_id INTEGER NULL,
					FOREIGN KEY student_id REFERENCES Student (student_id),
					FOREIGN KEY machine_id REFERENCES Machine (machine_id));   
					
INSERT INTO Student(student_id, student_first_name, student_last_name, student_password) 
VALUES ('yx68259', 'Mary', 'Brooks', 'mbrooks3');

INSERT INTO Student(student_id, student_first_name, student_last_name, student_password) 
VALUES ('qr63826', 'Bobby', 'Bisquatie', 'bisco10');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (1, 'treadmill_1');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (2, 'treadmill_2');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (3, 'treadmill_3');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (4, 'treadmill_4');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (5, 'elliptical_1');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (6, 'elliptical_2');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (7, 'elliptical_3');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (8, 'elliptical_4');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (9, 'squat_rack_1');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (10, 'squat_rack_2');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (11, 'bench_press_1');

INSERT INTO Machines(machine_id, machine_name) 
VALUES (12, 'bench_press_2');

/*Student_Notes data is inserted when a new note is created 
(except student_id which is static) 
all other data is created via the user*/
