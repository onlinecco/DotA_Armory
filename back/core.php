<?php
if (session_status() == PHP_SESSION_NONE) {

session_cache_expire(999999999);
    session_start();
}
?>
