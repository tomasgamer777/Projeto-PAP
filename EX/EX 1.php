<html>
<body>
<table border="1">
<tr> <td><b> Números </td>
	 <td><b> Cubos </td>
<?php
 for ($i=1; $i <= 5; $i++) {
  $q= $i * $i * $i;
  echo "<tr> <td> $i </td>";
  echo "<td> $q </td> </tr>";
 }
?>
</table>
</body>
</html> 