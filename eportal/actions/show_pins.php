<?php 
    $show_pins = false;
 if (isset($_POST['show_pins']) && $_POST['show_pins']==="pin_view") {
          $actual_pass ="@smatech";
        $pwd_ent = trim($_POST['pin_view_code']);
              if ($pwd_ent ===$actual_pass) {
                $show_pins = true;
                }else{
                   $show_pins = false;
                }
                  }else{
               $show_pins = false;
                  } ?>