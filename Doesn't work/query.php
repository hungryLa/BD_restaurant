<?php
   require_once('../config.php');
if (($_POST['rad']) && ($_POST['do']))
{
           $query=get_post('query'.$_POST['rad']);
           $par=get_post('par'.$_POST['rad']);
		       $val=get_post('val'.$_POST['rad']);
           if ($val)
           {
             if($_POST['rad']==3) $query=$query.$par."'".$val."%'";
			                 else $query=$query.$par."'".$val."'";
           }
           $res=mysql_query($query);
           $n=mysql_num_rows($res);
           $m=mysql_num_fields($res);
           $m1=100/$m/1.5; 
		    echo "<table border='2' align='center' width='".$m1."%'>";
            echo "<tr><td colspan='".$m."'><b><i>".$query."</i></b></td></tr>";
			if ($n<>0) 
		   {
           for($i=0; $i<$n; $i++)
            {
             $row=mysql_fetch_row($res);
             echo "<tr>";
             for ($j=0; $j<$m; $j++)
               echo "<td>".$row[$j]."</td>";
             echo "</tr>";
             }
			 echo "<tr><td colspan='".$m."'>запрос вернул ".$n." запись(и,ей)</td></tr>";
		    }
		    else echo "<tr><td colspan='".$m."'>запрос вернул 0 записей</td></tr>";
			echo "</table>";
}

     echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
        echo "<br><br>";
        echo "<table border=0 width=50% align=center>";
              echo "<tr><th colspan='3' >Запросы</th></tr>";
              echo "<tr>";
              echo "<td width=10% align=right><input type=radio name='rad' value='1'>";
              echo "<td width=80%>1. Вывести список отделов, номер которых больше </td>";
              echo "<td width=10%><input type=text name='val1' size='1' value=''></td>";   
              echo "<input type=hidden name='query1'  value='select named,typ from dep join typdep on id=idtyp '>";
              echo "<input type=hidden name='par1'  value=' where numd > '>";
              echo "</tr>";

              echo "<tr>";
              echo "<td width=10% align=right><input type=radio name='rad' value='2'>";
              echo "<td width=80%>2. Вывести отдел, номер которого равен 1 </td>";
              echo "<input type=hidden name='query2'  value='select * from dep where numd=1 '>";
              echo "</tr>";

              echo "<tr>";
              echo "<td width=10% align=right><input type=radio name='rad' value='3'>";
              echo "<td width=80%>3. Вывести отделы, название которых начинаются с  </td>";
              echo "<td width=10%><input type=text name='val3' size='1' value=''></td>";   
              echo "<input type=hidden name='query3'  value='select named from dep '>";
              echo "<input type=hidden name='par3'  value=' where named like '>";
              echo "</tr>";

              echo "<tr>";
              echo "<td colspan=3 align='center'><input type=submit name='do' value='Выполнить'>";
              echo "</tr>";
        echo "</table>";

			  echo "<br><br>";
			  echo "<table border=0 width=40% align=center><tr>";
              echo "<td>Вывести отделы, тип которых </td>";
			  $result1=MYSQL_QUERY("select * from typdep ") or die ("Ошибка при выполнении запроса: " .mysql_error ()); 
              echo "<td><select name=idtyp>";
                while ($row1 = mysql_fetch_array($result1)) 
                { echo "<option value=".$row1['id'].">".$row1['typ']."</option>";}
              echo "</select></td>";   
              echo "<td><input type=submit name='do4' value='Выполнить'></td></tr>";			  
              if ($_POST['do4'])
			  {	  
			   echo "<tr><td colspan=3 align=left><b>select named from dep join typdep on id=idtyp where id=".$_POST['idtyp']."</b></td></tr>";
			   $res=mysql_query("select named from dep join typdep on id=idtyp where id=".$_POST['idtyp']);
				while ($row = mysql_fetch_array($res)) 
			  echo "<tr><td colspan=3 align=left>".$row['named']."</td></tr>";}
			  echo "</table>";


   echo "</form>";

         MYSQL_CLOSE(); 
function get_post($var)
{
return mysql_real_escape_string($_POST[$var]);
}
?> 

<a href='dep.php' target='_self'> Назад</a>