<?php

function set_Session_Timeout($timeout, $returnPage) {
    if(isset($_SESSION['timeout'])) {
        // Nombre de secondes depuis la dernière visite
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            delete_session();
            session_start();
            $_SESSION['timeoutOccured'] = true;
            $_SESSION['timeout'] = time();
            header("Location:$returnPage");
            exit();
        }
    } else {
        $_SESSION['timeout'] = time();
    }
}
function session_Timeout_Occured() {
    return isset($_SESSION['timeoutOccured']);
}
function release_Session_Timout() {
    unset($_SESSION['timeout']);
    unset($_SESSION['timeoutOccured']);
}

function delete_session() {
    session_destroy();
    $_SESSION = [];
}
?>