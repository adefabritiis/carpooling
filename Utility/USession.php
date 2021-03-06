<?php
/**
 * @access public
 * @package Utility
 */
class USession {
    public function __construct() {
        session_start();
        // set timeout period in seconds (600 = 10 minutes in seconds)
            $inactive = 1200;

        // check to see if $_SESSION['timeout'] is set
            if(isset($_SESSION['timeout']) ) {
                $session_life = time() - $_SESSION['timeout'];
                    if($session_life > $inactive)
                        { session_destroy(); header("Location: index.php"); }
            }
        $_SESSION['timeout'] = time();

    }
    function imposta_valore($chiave,$valore) {
        $_SESSION[$chiave]=$valore;
    }
    function cancella_valore($chiave) {
        unset($_SESSION[$chiave]);
    }
    function leggi_valore($chiave) {
        if (isset($_SESSION[$chiave]))
            return $_SESSION[$chiave];
        else
            return false;
    }
}
?>