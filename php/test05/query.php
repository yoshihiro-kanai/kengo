<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=world;charset=utf8', 
    'kanai', 'password1');
?>

<body>
<table border="1">
<?php
    $i = 0;
    $no = "№";
    $country ="CountryCode";
    $name = "Name";
    $dis = "District";

    echo '<tr>';
    echo "<td>{$no}</td>";
    echo "<td>{$country}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$dis}</td>";
    echo '</tr>';


    foreach ($pdo->query('select * from city order by CountryCode') as $row) {
        //echo '<p>';
        //echo $i, ':';
        //echo $row['CountryCode'], ':';
        //echo $row['Name'], ':';
        //echo $row['District'];
        //echo '</p>';
        $i++;
        echo "<td>{$i}</td>";
        echo "<td>{$row['CountryCode']}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td>{$row['District']}</td>";
        echo '</tr>';
    }
    
?>
</table>
</body>
<?php require '../footer.php'; ?>
