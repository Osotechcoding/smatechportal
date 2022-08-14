<?php 
function is_valid_password($password) {
    return preg_match_all('$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$', $password) ? TRUE : FALSE;
}


 ?>