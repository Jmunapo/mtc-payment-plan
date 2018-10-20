<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
    exit(0);
} else {
    session_start();
    session_destroy();
    exit(0);
}