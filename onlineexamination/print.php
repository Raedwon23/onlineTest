<html>
<body>
<?php 
$username = "root"; 
$password = ""; 
$database = "jatin"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM demo;


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
          <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        
        $field1name = $row["col2"];
        $field2name = $row["col3"];
        $field3name = $row["col4"];
        $field4name = $row["col5"];
		$field5name = $row["col6"];		

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>