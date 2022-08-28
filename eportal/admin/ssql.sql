ALTER TABLE `visap_school_profile` ADD
 `our_mission` TEXT NULL DEFAULT NULL AFTER `school_short_name`,
  ADD `our_vision` TEXT NULL DEFAULT NULL AFTER `our_mission`, ADD
   `our_core_value` TEXT NULL DEFAULT NULL AFTER `our_vision`, ADD 
   `key_of_success` TEXT NULL DEFAULT NULL AFTER `our_core_value`, ADD
    `our_philosophy` TEXT NULL DEFAULT NULL AFTER `key_of_success`, ADD
     `our_principle` TEXT NULL DEFAULT NULL AFTER `our_philosophy`, ADD 
     `about_us` MEDIUMTEXT NULL DEFAULT NULL AFTER `our_principle`, ADD 
     `principal_welcome` MEDIUMTEXT NULL DEFAULT NULL AFTER `about_us`;
