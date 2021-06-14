<?php
    /* ----------------------------------------------------------------------------------- */
    /* Bimbo Tinto - Cierre de jornadas */
    /* ----------------------------------------------------------------------------------- */
    /* ----------------------------------------------------------------------------------- */
    function cerrarJornada( $dbh, $idj ){
        // Cierra una jornada para participación
        $q = "update jornada set cerrado = 1 where id = $idj";
        
        mysqli_query ( $dbh, $q );
        return mysqli_affected_rows( $dbh );
    }
    /* ----------------------------------------------------------------------------------- */
    include( "db/db.php" );

    $JORNADA = 1;
    $res = cerrarJornada( $dbh, $JORNADA );

    if( $res > 0 ) echo "<h1>JORNADA CERRADA</h1>"; else echo "<h1>JORNADA YA ESTABA CERRADA</h1>";
?>