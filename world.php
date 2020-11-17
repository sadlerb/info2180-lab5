<?php
header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET["country"];
$context = $_GET["context"];
if ($context != "cities"){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}else{
  $stmt = $conn->query("SELECT cities.name, cities.district,cities.population FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>
<table>
<?php
if ($context != "cities"){
  findCountries($results);
}else{
  findCities($results);
}
?>
</table>


<?php function findCountries($results){
  echo"<tr>
  <th>Name</th>
  <th>Continent</th>
  <th>Independence</th>
  <th>Head of State</th>
</tr>";
foreach ($results as $row):?>
<tr><?= "<td>".$row['name']. "</td>" . "<td>" . $row['continent'] . "</td>" . "<td>" . $row['independence_year'] . "<td>" . $row['head_of_state']  ; ?></tr>
<?php endforeach;

  };?>


<?php function findCities($results){
  echo"<tr>
  <th>Name</th>
  <th>District</th>
  <th>Population</th>
</tr>";
foreach ($results as $row):?>
<tr><?= "<td>".$row['name']. "</td>" . "<td>" . $row['district'] . "</td>" . "<td>" . $row['population'] . "<td>";?></tr>
<?php endforeach;

  };?>

