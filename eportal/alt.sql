ALTER TABLE `visap_classnote_tbl` ADD FOREIGN KEY (`teacher_id`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_assignment_tbl` ADD FOREIGN KEY (`teacherId`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_exam_subject_tbl` ADD FOREIGN KEY (`teacherId`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_staff_bank_details_tbl` ADD FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_staff_paid_salary_tbl` ADD FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_staff_payroll_tbl` ADD FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_staff_post_tbl` ADD FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_virtual_lesson_tbl` ADD FOREIGN KEY (`teacher`) REFERENCES `visap_staff_tbl`(`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- student --
ALTER TABLE `visap_stdmedical_tbl` ADD FOREIGN KEY (`studId`) REFERENCES `visap_student_tbl`(`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_stdpreschlinfo` ADD FOREIGN KEY (`student_id`) REFERENCES `visap_student_tbl`(`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_student_info_tbl` ADD FOREIGN KEY (`studentId`) REFERENCES `visap_student_tbl`(`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
--
ALTER TABLE `visap_student_payment_history_tbl` ADD FOREIGN KEY (`std_id`) REFERENCES `visap_student_tbl`(`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
--

CREATE TABLE `smatech_portal`.`visap_student_testimonial_tbl` (`id` BIGINT(20) NOT NULL AUTO_INCREMENT , `stdRegNo` VARCHAR(50) NULL DEFAULT NULL , `admitted_class` VARCHAR(50) NULL DEFAULT NULL , `admitted_date` DATE NULL DEFAULT NULL , `class_completed` VARCHAR(50) NULL DEFAULT NULL , `date_completed` DATE NULL DEFAULT NULL , `academic_ability` VARCHAR(100) NULL DEFAULT NULL , `sports_ability` VARCHAR(100) NULL DEFAULT NULL , `office_held` VARCHAR(50) NULL DEFAULT NULL , `school_club` VARCHAR(100) NULL DEFAULT NULL , `general_remarks` TEXT NULL DEFAULT NULL , `subject1` VARCHAR(255) NULL DEFAULT NULL , `subject2` VARCHAR(255) NULL DEFAULT NULL , `subject3` VARCHAR(255) NULL DEFAULT NULL , `subject4` VARCHAR(255) NULL DEFAULT NULL , `subject5` VARCHAR(255) NULL DEFAULT NULL , `subject6` VARCHAR(255) NULL DEFAULT NULL , `subject7` VARCHAR(255) NULL DEFAULT NULL , `subject8` VARCHAR(255) NULL DEFAULT NULL , `subject9` VARCHAR(255) NULL DEFAULT NULL , `subject10` VARCHAR(255) NULL DEFAULT NULL , `subject11` VARCHAR(255) NULL DEFAULT NULL , `cert_no` VARCHAR(50) NULL DEFAULT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`stdRegNo`)) ENGINE = InnoDB;