<?php

    if(isset($_GET['autores']) && isset($_GET['titulo']) && isset($_GET['editorial']) && isset($_GET['ISBN']) && isset($_GET['num_pags']) && isset($_GET['clasificacion'])){
        include("../PHP/db_conn.php");
        $autores = $_GET['autores'];
        $titulo = $_GET['titulo'];
        $editorial = $_GET['editorial'];
        $ISBN = $_GET['ISBN'];
        $num_pags = $_GET['num_pags'];
        $clasificacion = $_GET['clasificacion'];
        
    }


?>