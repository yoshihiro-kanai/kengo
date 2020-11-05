<?php require '../header.php'; ?>
<?php require 'UDbConnecition.php'; ?>
<?php
?>

<body>
<table border="1">
<?php
	$db = new dbUtil();
	$dbServer = $db-> dbServer(); 
	$dbUser   = $db-> dbUser();
	$dbPassword = $db-> dbPassword();
	$pdo=new PDO($dbServer,$dbUser,$dbPassword);
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
    $sqlSelect = citySelect();
	$sql=$pdo->prepare($sqlSelect);
    $sql->execute([$_REQUEST['code']]);

    foreach ($sql as $row) {
        $i++;
        echo "<td>{$i}</td>";
        echo "<td>{$row['cityname']}</td>";
        echo "<td>{$row['cityCountryCode']}</td>";
        echo "<td>{$row['countryName']}</td>";
        echo "<td>{$row['district']}</td>";
        echo "<td>{$row['pop']}</td>";
        echo '</tr>';
    }

    echo $sqlSelect;
    //----------------------------------------------------
    //select文
    function citySelect()
    {
        $sql = "SELECT a.name as cityname, 
                       a.CountryCode as cityCountryCode, 
                       b.name as countryName,
                       a.District as district,
                       a.Population as pop 
                       FROM  city a , country b 
                       where a.CountryCode = b.Code 
					   and   a.CountryCode = ?
                       ORDER BY a.Population DESC";
        return $sql;
    }
   
?>
</table>
</body>
<?php require '../footer.php'; ?>