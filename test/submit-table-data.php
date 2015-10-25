<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
                      
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>จัดการสินค้า</title>
  </head>

  <body>
	<form method="post" action="display-table-data.php" target="_blank">
		 <table>
			<tr>
				<td><input type="text" name="field1[]" /></td>
				<td><input type="text" name="field2[]" /></td>
			<tr>
			<tr>
				<td><input type="text" name="field1[]" /></td>
				<td><input type="text" name="field2[]" /></td>
			<tr>
		</table>
		<input type="submit" value="submit"/>
	</form>
  </body>
</html>
