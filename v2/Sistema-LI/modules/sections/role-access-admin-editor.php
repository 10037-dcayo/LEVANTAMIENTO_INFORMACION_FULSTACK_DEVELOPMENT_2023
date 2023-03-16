<?php
if ($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] == 'editor' || $_SESSION['permissions'] == 'teacher') {
} else {
    header('Location: /');
    exit();
}