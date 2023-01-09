<?php
$var1 = mt_rand(1, 99);
$var2 = rand(1, 9);

$answer =$var1 + $var2;
echo '
<label><span class="text-dark"> What is </span> <b class="text-danger"> '.$var1 .' + '. $var2 .' ?</b> :  </label><input type="hidden" name="captcha_correct_answer" id="captcha_correct_answer" value="'.$answer.'"/>
<input type="number" class="form-control form-control-lg" name="user_captcha_anwser" id="user_captcha_anwser" placeholder="Write Your Answer?"/>';
