<?php

require_once 'function.php';
session_destroy();
header('Location: index.php');
