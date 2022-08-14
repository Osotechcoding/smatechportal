<input type="hidden" name="stdId" value="<?php echo $_SESSION['STD_SES_ID'];?>">
<input type="hidden" name="student_class" value="<?php echo strtoupper($_SESSION['STD_GRADE_CLASS']) ?>">
<input type="hidden" name="school_sess" value="<?php echo $activeSess->session_desc_name;?>">
<input type="hidden" name="academic_term" value="<?php echo $activeSess->term_desc;?>">
<input type="hidden" name="stdRegCode" value="<?php echo strtoupper($_SESSION['STD_REG_NUMBER']) ?>">
<input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">