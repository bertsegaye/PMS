
        <?php 
        include "../db/connection.php";
        ?>
  
			  
              <script type = "text/javascript" >
               function preventBack()
               {
               window.history.forward();
               } 
               setTimeout("preventBack()", 0); 
               window.onunload=function(){null};
                </script> 
                                                  
              <?php
              $tables = array();
              $query = mysqli_query($con,'SHOW TABLES');
              while($row = mysqli_fetch_row($query))
              {
                   $tables[] = $row[0];
              }

              $result = "";
              foreach($tables as $table)
              {
              $query = mysqli_query($con,'SELECT * FROM '.$table );
              $num_fields = mysqli_num_fields($query);
              $result .= 'DROP TABLE IF EXISTS '.$table.';';
              $row2 = mysqli_fetch_row(mysqli_query($con,'SHOW CREATE TABLE '.$table ));
              $result .= "\n\n".$row2[1].";\n\n";

              for ($i = 0; $i < $num_fields; $i++)
               {
              while($row = mysqli_fetch_row($query))
              {
                 $result .= 'INSERT INTO '.$table.' VALUES(';
                   for($j=0; $j<$num_fields; $j++)
                   {
                     $row[$j] = addslashes($row[$j]);
                     $row[$j] = str_replace("\n","\\n",$row[$j]);
                     if(isset($row[$j]))
                     {
                         $result .= '"'.$row[$j].'"' ; 
                      }
                      else
                      { 
                          $result .= '""';
                      }
                      if($j<($num_fields-1))
                      { 
                          $result .= ',';
                      }
                  }
                     $result .= ");\n";
              }
              }
              $result .="\n\n";
              }

              //Create Folder
              $folder = 'C:/xampp/htdocs/PMS/BackupDb/';
              if (!is_dir($folder))
              mkdir($folder, 0777, true);
              chmod($folder, 0777);

              //$date = date('m-d-Y-h-m-s'); 
              $filename = $folder."prisonerdb"; 

              $handle = fopen($filename.'.doc','w+');
              fwrite($handle,$result);
              fclose($handle);
              ?>

                  
                  <?php
                  
    echo "<script>alert(' data backed up successfully...Path: ".$filename."   '); window.location.href='backup.php';
                  </script>";                   
                  ?>

         