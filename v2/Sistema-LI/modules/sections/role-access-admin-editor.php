<?php
if ($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] == 'editor' || $_SESSION['permissions'] == 'empre' ) {
} else {
    header('Location: /');
    exit();
}