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
	//--main-----------------------------------------------
    //ヘッダー
    $i = 0;
    $no = "№";
    $cityname ="都市名";
    $cityCountryCode = "国コード";
    echo '<tr>';
    echo "<td>{$no}</td>";
    echo "<td>{$cityname}</td>";
    echo "<td>{$cityCountryCode}</td>";
    echo '</tr>';

	$sql=$pdo->prepare('SELECT Name,CountryCode FROM city where CountryCode=?');
    $sql->execute([$_REQUEST['code']]);

    foreach ($sql as $row) {
        $i++;
        echo "<td>{$i}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td>{$row['CountryCode']}</td>";
        echo '</tr>';
    }

    echo $sql;
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