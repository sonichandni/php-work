<?php
    include 'Conection.php';
    $con1=new Connection();
    $con=$con1->mkConnection();
    
    class model
    {
        function insert($con,$stu,$table)
        {
            $k=array_keys($stu);
            $col=implode(",",$k);
            
            $v=array_values($stu);
            $val=implode("','",$v);
            
            $q="insert into $table($col) values('$val')";
           //echo $q;exit;
            return $con->query($q);
        }
        function select($con,$table,$where)
        {
            $q="select * from $table where 1=1";
            foreach($where as $k=>$v)
            {
                $q.=" and $k='$v'";
            }
           //echo $q;exit;
            //alert($q);
            $all1=$con->query($q);
            
            while($row=$all1->fetch_object())
            {
                $r[]=$row;
            }
            if(isset($r))
                return $r;
        }
?>