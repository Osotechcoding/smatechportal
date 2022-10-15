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