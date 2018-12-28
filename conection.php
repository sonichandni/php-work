<?php
    class Connection
    {
        function mkConnection()
        {
            $con=new mysqli("localhost","root","","first");
            return $con;
        }
    }
?>