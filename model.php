<?php
    include 'conection.php';
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
           
            return $con->query($q);
        }
        function select_where($con,$table,$where)
        {
            $q="select * from $table where 1=1";
            foreach($where as $k=>$v)
            {
                $q.=" and $k='$v'";
            }
            //echo $q;exit;
            $all1=$con->query($q);
            
            while($row=$all1->fetch_object())
            {
                $r[]=$row;
            }
            if(isset($r))
                return $r;
        }
        function select($con,$table)
        {
            $q="select * from $table";
            $all1=$con->query($q);
            
            while($row=$all1->fetch_object())
            {
                $r[]=$row;
            }
            if(isset($r))
                return $r;
        }
        function cnt($con,$table)
        {
            $q="select * from $table";
            $cnt=$con->query($q);
            $no=$cnt->num_rows;
            
            return $no;
        }
        function dlt($con,$table,$where)
        {
            $q="DELETE FROM $table WHERE 1=1";
            foreach ($where as $k => $v)
            {
                $q.=" AND $k='$v'";
            }
            //echo $q;exit;
            return $con->query($q);
        }
        function updt($con,$table,$set,$where)
        {
            $q="update $table set ";
            foreach($set as $k=>$v)
            {
                $q.="$k='$v',";
            }
            $q=rtrim($q,",");
            $q.=" where 1=1";
            foreach($where as $m=>$n)
            {
                $q.=" and $m='$n'";
            }
            
            //echo $q;exit;
            $con->query($q);
        }
        function join_con($con,$tbl1,$tbl2,$str,$where)
        {
            $q="select * from `$tbl2` INNER JOIN `$tbl1` ON $str where 1=1";
            
            foreach($where as $k=>$v)
            {
                $q.=" and $k='$v'";
            }
            $al=$con->query($q);
            //echo $q;exit;
            if($al->num_rows!=0)
            {
                while($row=$al->fetch_object())
                {
                    $r[]=$row;
                }
                if(isset($r))
                {
                    return $r;
                }
            }
            
        }
        function join_con_order($con,$tbl1,$tbl2,$str,$where,$c)
        {
            $q="select * from `$tbl2` INNER JOIN `$tbl1` ON $str where 1=1";
            
            foreach($where as $k=>$v)
            {
                $q.=" and $k='$v'";
            }
            $q=$q." ORDER BY $c DESC";
            $al=$con->query($q);
            //echo $q;exit;
            if($al->num_rows!=0)
            {
                while($row=$al->fetch_object())
                {
                    $r[]=$row;
                }
                if(isset($r))
                {
                    return $r;
                }
            }
            
        }
        function join_three($con,$tbl1,$tbl2,$tbl3,$str,$str2)
        {
            $q="select * from `$tbl2` JOIN `$tbl1` ON $str JOIN `$tbl3` ON $str2";
            $al=$con->query($q);
            //echo $q;exit;
            if($al->num_rows!=0)
            {
                while($row=$al->fetch_object())
                {
                    $r[]=$row;
                }
                if(isset($r))
                {
                    return $r;
                }
            }
            
        }
        function join_three_con($con,$tbl1,$tbl2,$tbl3,$str,$str2,$where)
        {
            $q="select * from `$tbl2` JOIN `$tbl1` ON $str JOIN `$tbl3` ON $str2 WHERE 1=1";
            foreach($where as $k=>$v)
            {
                $q.=" and $k='$v'";
            }
            //echo $q;exit;
            $al=$con->query($q);
            //
            if($al->num_rows!=0)
            {
                while($row=$al->fetch_object())
                {
                    $r[]=$row;
                }
                if(isset($r))
                {
                    return $r;
                }
            }
            
        }
    }
?>