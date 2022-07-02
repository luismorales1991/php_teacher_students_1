-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: USE bbqzqvssygn4719v7pac;
-- Source Schemata: USE bbqzqvssygn4719v7pac;
-- Created: Fri Jul  1 20:58:54 2022
-- Workbench Version: 8.0.28
-- ----------------------------------------------------------------------------


SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema USE bbqzqvssygn4719v7pac;
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `USE bbqzqvssygn4719v7pac;`.`assignment` (
  `id` BINARY(16) NOT NULL,
  `course` BINARY(16) NOT NULL,
  `student` BINARY(16) NOT NULL,
  `unit1` INT NULL DEFAULT NULL,
  `unit2` INT NULL DEFAULT NULL,
  `unit3` INT NULL DEFAULT NULL,
  `unit4` INT NULL DEFAULT NULL,
  `create_time` DATE NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`(16), `course`(16), `student`(16)),
  INDEX `fk_assignment_user1_idx` (`student`(16) ASC) VISIBLE,
  INDEX `fk_assignment_course1_idx` (`course`(16) ASC) VISIBLE,
  CONSTRAINT `fk_assignment_course1`
    FOREIGN KEY (`course`)
    REFERENCES `USE bbqzqvssygn4719v7pac;`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_assignment_user1`
    FOREIGN KEY (`student`)
    REFERENCES `USE bbqzqvssygn4719v7pac;`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

-- ----------------------------------------------------------------------------
-- Table USE bbqzqvssygn4719v7pac;.course
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `USE bbqzqvssygn4719v7pac;`.`course` (
  `id` BINARY(16) NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `description` TEXT NOT NULL,
  `limit` INT NOT NULL,
  `banner` VARCHAR(255) NOT NULL,
  `teacher` BINARY(16) NOT NULL,
  PRIMARY KEY (`id`(16), `teacher`(16)),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_course_user_idx` (`teacher`(16) ASC) VISIBLE,
  CONSTRAINT `fk_course_user`
    FOREIGN KEY (`teacher`)
    REFERENCES `USE bbqzqvssygn4719v7pac;`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

-- ----------------------------------------------------------------------------
-- Table USE bbqzqvssygn4719v7pac;.inbox
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `USE bbqzqvssygn4719v7pac;`.`inbox` (
  `id` BINARY(16) NOT NULL,
  `user_id` BINARY(16) NOT NULL,
  `course_id` BINARY(16) NOT NULL,
  `create_time` DATE NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`(16), `user_id`(16), `course_id`(16)),
  INDEX `fk_inbox_user1_idx` (`user_id`(16) ASC) VISIBLE,
  INDEX `fk_inbox_course1_idx` (`course_id`(16) ASC) VISIBLE,
  CONSTRAINT `fk_inbox_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `USE bbqzqvssygn4719v7pac;`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inbox_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `USE bbqzqvssygn4719v7pac;`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

-- ----------------------------------------------------------------------------
-- Table USE bbqzqvssygn4719v7pac;.user
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `USE bbqzqvssygn4719v7pac;`.`user` (
  `id` BINARY(16) NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `pwd` BLOB NOT NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tmp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` VARCHAR(30) NOT NULL,
  `phone` VARCHAR(30) NOT NULL,
  `role` VARCHAR(7) NOT NULL,
  `gender` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`id`(16)),
  UNIQUE INDEX `id_UNIQUE` (`id`(16) ASC) VISIBLE,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.add_assignment
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `add_assignment`(
in a_course varchar(40), 
in a_student varchar(40)
)
BEGIN
	INSERT INTO assignment(
    id,
    course,
    student
    ) 
		VALUES(
        UUID_TO_BIN(uuid()),
        UUID_TO_BIN(a_course),
        UUID_TO_BIN(a_student)
        );
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.add_course
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `add_course`(
in a_name varchar(60), 
in a_description text, 
in a_limit int,
in a_banner varchar(255),
in a_teacher varchar(40)
)
BEGIN
	INSERT INTO course(
    id,
    `name`,
    `description`,
    `limit`,
    banner,
    teacher) 
		VALUES(
        UUID_TO_BIN(uuid()),
        a_name, 
        a_description,
        a_limit,
        a_banner,
        uuid_to_bin(a_teacher)
        );
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.add_grade
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `add_grade`(
IN a_id VARCHAR(40),
IN a_unit INT,
IN a_grade INT
)
BEGIN
	SET @amount := (SELECT COUNT(*) FROM ASSIGNMENT WHERE id=uuid_to_bin(a_id));
    IF (@amount = 0) THEN
		SELECT TRUE AS `error`;
	ELSEIF (@amount > 0) THEN 
		IF(a_grade=541702) THEN
			SET @grade = NULL;
		ELSE
			SET @grade = a_grade;
		END IF;
		SET @q = CONCAT("UPDATE assignment SET unit",a_unit,"=? WHERE id=uuid_to_bin(?)");
        PREPARE stmt FROM @q;
        SET @id = a_id;
		EXECUTE stmt USING @grade, @id;
		DEALLOCATE PREPARE stmt;
        
        SELECT FALSE AS `error`;
    END IF;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.add_inbox
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `add_inbox`(in a_user varchar(40), in a_course varchar(40))
BEGIN
	INSERT INTO inbox(id, user_id,course_id) values (
		uuid_to_bin(uuid()),
        uuid_to_bin(a_user),
        uuid_to_bin(a_course)
    );
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_course_exists_from_teacher
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_course_exists_from_teacher`(IN a_id VARCHAR(40))
BEGIN
	SELECT * FROM course WHERE teacher=uuid_to_bin(a_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_duplicated_assignment
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_duplicated_assignment`(in a_user varchar(40), in a_course varchar(40))
BEGIN
	SELECT * FROM assignment WHERE student=uuid_to_bin(a_user) AND course=uuid_to_bin(a_course);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_duplicated_email
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_duplicated_email`(in a_email varchar(30))
BEGIN
	SELECT email FROM `user` WHERE email=a_email;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_duplicated_inbox
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_duplicated_inbox`(in a_user varchar(40), in a_course varchar(40))
BEGIN
	SELECT * FROM inbox WHERE user_id=uuid_to_bin(a_user) AND course_id=uuid_to_bin(a_course);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_duplicated_username
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_duplicated_username`(in a_username varchar(16))
BEGIN
	SELECT username FROM `user` WHERE username=a_username;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.check_reached_limit
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `check_reached_limit`(IN a_course VARCHAR(40))
BEGIN
	SELECT course.`limit`, count(assignment.id) AS occupancy
	FROM course 
    INNER JOIN `user` ON `user`.id = course.teacher
    AND `user`.`role` = "teacher"
    LEFT JOIN assignment ON course.id=assignment.course
    WHERE bin_to_uuid(course.id)=a_course
    GROUP BY course.id;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.delete_assignment
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `delete_assignment`(IN a_id VARCHAR(40))
BEGIN
	DELETE FROM assignment WHERE id=uuid_to_bin(a_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.delete_assignment_2
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `delete_assignment_2`(IN a_student VARCHAR(40),IN a_course VARCHAR(40))
BEGIN
	DELETE FROM assignment WHERE bin_to_uuid(course)=a_course AND bin_to_uuid(student)=a_student;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.delete_course
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `delete_course`(IN a_id VARCHAR(40))
BEGIN
	DELETE FROM `course` WHERE id=uuid_to_bin(a_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.delete_inbox_by_data
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `delete_inbox_by_data`(in a_user varchar(40), in a_course varchar(40))
BEGIN
	DELETE FROM inbox WHERE uuid_to_bin(a_user)=user_id AND uuid_to_bin(a_course)=course_id;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.delete_my_user
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `delete_my_user`(IN a_id VARCHAR(40))
BEGIN
	DELETE FROM `user` WHERE id=uuid_to_bin(a_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.edit_course
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `edit_course`(
	IN a_id VARCHAR(40),
	IN a_name varchar(60), 
	IN a_description text, 
	IN a_limit int,
	IN a_banner varchar(255))
BEGIN
	UPDATE course SET `name`=a_name,`description`=a_description,
    `limit`=a_limit,banner=a_banner
    WHERE uuid_to_bin(a_id)=id;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.edit_user
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `edit_user`(
IN a_id VARCHAR(40),
IN a_username varchar(16),
IN a_email varchar(30),
in a_phone varchar(10),
in a_gender varchar(8)
)
BEGIN
	UPDATE `user` 
    SET 
    username=a_username,
    email=a_email,
    phone=a_phone,
    gender=a_gender
    WHERE id=uuid_to_bin(a_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_all_courses
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_all_courses`()
BEGIN
	SELECT bin_to_uuid(course.id) as id,
    course.`name`,course.`description`,
    course.`limit`,course.`banner`, 
    `user`.username , count(assignment.id) AS occupancy
    FROM course 
    INNER JOIN `user` ON `user`.id = course.teacher
    AND `user`.`role` = "teacher"
    LEFT JOIN assignment ON course.id=assignment.course
    GROUP BY course.id;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_assignments_from_teacher
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_assignments_from_teacher`(IN a_teacher VARCHAR(40))
BEGIN
	SELECT 
    bin_to_uuid(assignment.id) AS id,
    `user`.username,
    assignment.unit1,
    assignment.unit2,
    assignment.unit3,
    assignment.unit4
    FROM course
	INNER JOIN assignment ON course.id = assignment.course
	INNER JOIN `user` ON assignment.student=`user`.id
	WHERE course.teacher=uuid_to_bin(a_teacher) ;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_assignment_from_student
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_assignment_from_student`(IN a_student VARCHAR(40))
BEGIN
	SELECT bin_to_uuid(assignment.id) AS id,
    bin_to_uuid(course.id) AS course_id,
    course.`name` AS course, 
    `user`.username AS teacher, 
    unit1,unit2,unit3,unit4  
    FROM assignment 
	LEFT JOIN course ON course.id=assignment.course 
	INNER JOIN `user` ON course.teacher=`user`.id
	WHERE assignment.student=uuid_to_bin(a_student);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_courses_inbox_with_student
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_courses_inbox_with_student`(in a_student varchar(40))
BEGIN
	SELECT bin_to_uuid(inbox.course_id) AS course_id
    FROM inbox INNER JOIN course 
    ON inbox.course_id = course.id 
    AND inbox.user_id = uuid_to_bin(a_student);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_course_from_name
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_course_from_name`(in a_name varchar(60))
BEGIN
	SELECT * FROM course WHERE `name`=a_name;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_course_from_teacher
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_course_from_teacher`(
in a_teacher varchar(40)
)
BEGIN
	SELECT bin_to_uuid(course.id) as id,
    course.`name`,course.`description`,
    course.`limit`,course.`banner`, 
    `user`.username , count(assignment.id) AS occupancy
    FROM course 
    INNER JOIN `user` ON `user`.id = course.teacher
    AND `user`.`role` = "teacher"
    LEFT JOIN assignment ON course.id=assignment.course
    WHERE uuid_to_bin(a_teacher)=course.teacher
    GROUP BY course.id;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_inbox
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_inbox`()
BEGIN
	SELECT * FROM inbox;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_inbox_from_teacher
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_inbox_from_teacher`(in a_teacher varchar(40))
BEGIN
	SELECT bin_to_uuid(course.id) AS id_course,`user`.username AS username, bin_to_uuid(`user`.id) AS user_id, inbox.create_time AS create_time FROM inbox INNER JOIN `user` ON `user`.id=inbox.user_id
	INNER JOIN course ON course.id=inbox.course_id WHERE bin_to_uuid(course.teacher)=a_teacher;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_num_assigned_courses
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_num_assigned_courses`()
BEGIN
SELECT 
    course.`name`, COUNT(*) AS num
FROM
    assignment
        INNER JOIN
    course ON course.id = assignment.course
GROUP BY assignment.course
ORDER BY num DESC
LIMIT 5;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_num_assignments_per_date
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_num_assignments_per_date`()
BEGIN
	SELECT `create_time` AS `date`, COUNT(*) AS num FROM assignment GROUP BY `create_time` ORDER BY create_time DESC LIMIT 7;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_num_genders_from_students
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_num_genders_from_students`()
BEGIN
	SELECT gender,COUNT(*) AS num FROM `user` WHERE `role`="student" GROUP BY gender;
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.get_user
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `get_user`(in a_user_id varchar(36))
BEGIN
	SELECT username,email,phone,`role`,gender FROM `user` WHERE id=UUID_TO_BIN(a_user_id);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.signin
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `signin`(in a_username varchar(16),in a_pwd varchar(30))
BEGIN
	SELECT BIN_TO_UUID(id) as id FROM `user` WHERE username=a_username AND pwd=aes_encrypt(a_pwd,"PFgkJ*Yr!DSBWDos");
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.signup
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `signup`(
in a_username varchar(16),
in a_pwd varchar(16),
in a_email varchar(30),
in a_phone varchar(10),
in a_role varchar(7),
in a_gender varchar(6))
BEGIN
	insert into `user`(id,username,pwd,email,phone,`role`,gender)
    values(UUID_TO_BIN(UUID()), a_username,aes_encrypt(a_pwd,"PFgkJ*Yr!DSBWDos"),a_email,a_phone,a_role,a_gender);
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine USE bbqzqvssygn4719v7pac;.user_exists
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
CREATE PROCEDURE `user_exists`(in a_user_id varchar(36))
BEGIN
	SELECT username FROM `user` WHERE id=UUID_TO_BIN(a_user_id);
END$$

DELIMITER ;
SET FOREIGN_KEY_CHECKS = 1;
