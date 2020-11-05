<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=world;charset=utf8', 
    'kanai', 'password1');
?>

<body>
<table border="1">
<?php
    //ヘッダー
    $i = 0;
    $no = "№";
    $cityname ="都市名";
    $cityCountryCode = "国コード";
    $countryName = "国名称";
    $district = "都道府県、州";
    $Population = "人口";
    echo '<tr>';
    echo "<td>{$no}</td>";
    echo "<td>{$cityname}</td>";
    echo "<td>{$cityCountryCode}</td>";
    echo "<td>{$countryName}</td>";
    echo "<td>{$district}</td>";
    echo "<td>{$Population}</td>";
    echo '</tr>';

    $sql = "SELECT a.name as cityname, a.CountryCode as cityCountryCode, b.name as countryName,a.District as district,
    a.Population as pop FROM  city a , country b where a.CountryCode = b.Code ORDER BY a.Population DESC";
    $res = $pdo->query($sql);

    foreach ($res as $row) {
        
        //echo '<p>';
        //echo $i, ':';
        //echo $row['CountryCode'], ':';
        //echo $row['Name'], ':';
        //echo $row['District'];
        //echo '</p>';
        $i++;
        echo "<td>{$i}</td>";
        echo "<td>{$row['cityname']}</td>";
        echo "<td>{$row['cityCountryCode']}</td>";
        echo "<td>{$row['countryName']}</td>";
        echo "<td>{$row['district']}</td>";
        echo "<td>{$row['pop']}</td>";
        echo '</tr>';
    }
    
?>
</table>
</body>
<?php require '../footer.php'; ?>
