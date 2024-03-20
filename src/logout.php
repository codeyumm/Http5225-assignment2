<?php

    session_start();

    session_destroy();

    header("Location: /Http5225-assignment2/src/login.php");
    exit;