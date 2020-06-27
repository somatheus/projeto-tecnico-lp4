<?php

if ($_SESSION['duracao'] < time()) {
    session_destroy();
    header('LOCATION: ../html/entrar.html');
}