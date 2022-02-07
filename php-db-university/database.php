<?php 

define('DB_SERVERNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','university');
define('DB_PORT', 8889 );


$connection = new mysqli( DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_PASSWORD, DB_NAME, DB_PORT );

if( $connection && $connection->connect_error ){
    echo 'Connessione al database non riuscita' . $connection->connect_error;
    die();
    //o exit
}
// cosa ci risponde
// echo var_dump($connection);
?>