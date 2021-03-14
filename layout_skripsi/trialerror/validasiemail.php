<?php

function is_email_valid($email) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email))){
        return TRUE;
    }
    return FALSE;
}

$email = "ngestusatria@gmail.com";
$valid = is_email_valid($email);
echo $valid ? "True" : "False";

?>