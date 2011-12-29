<?php
	$conn = mysql_connect("localhost", "root", "sonata");
mysql_query("set names utf8");

    if (!$conn) {
        echo "Unable to connect to DB: " . mysql_error();
        exit;
    }

    if (!mysql_select_db("waysfor")) {
        echo "Unable to select mydbname: " . mysql_error();
        exit;
    }

    //查询旧数据
	$sql = "SELECT *
            FROM trainer_resource
            WHERE  1";

    $result = mysql_query($sql);

    while ($row = mysql_fetch_assoc($result)) {
		$sql.= "INSERT INTO  `waysfor`.`trainer` (`id` ,`fname` ,`name` ,`trainertype` ,`content` ,`price` ,`listtime` ,`recommend`)	VALUES ('', '', '".$row['name']."', '".$row['trainertype']."' , '".addslashes($row['content'])."', '".$row['price']."', '".$row['listtime']."', '1');
		";
		file_put_contents('trainer.txt' ,$sql);
		echo '<br />';
    }

    mysql_free_result($result);
?>