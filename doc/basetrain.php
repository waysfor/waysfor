<?php
	$conn = mysql_connect("localhost", "root", "sonata");
mysql_query("set names utf8");

    if (!$conn) {
        echo "Unable to connect to DB: " . mysql_error();
        exit;
    }

    if (!mysql_select_db("simplazy_waysfor")) {
        echo "Unable to select mydbname: " . mysql_error();
        exit;
    }

    //查询旧数据
	$sql = "SELECT *
            FROM cp
            WHERE  1";

    $result = mysql_query($sql);

    while ($row = mysql_fetch_assoc($result)) {
		//在这构造新语句，最后复制写来，通过phpmyadmin执行SQL那里导入
		//旧表字段和新表字段对应好了就可以了
       /*
		echo "INSERT INTO  `waysfor`.`class` (`id` ,`classtpye` ,`classname` ,`trainer` ,`price` ,`discount` ,`classobj` ,`starttime` ,`endtime` ,`description` ,`content` ,`recommend` ,`entertime`)	VALUES ('', '', '".$row['OCSort']."', '', '".$row['Price']."' ,'9' ,'".$row['OcObject']."' ,'".$row['OcTimeStart']."' ,'".$row['OctimeEnd']."' ,'' ,'".$row['ClassCon']."' ,'".$row['recommend']."' ,'".$row['Listtime']."');
		";
		*/
		$sql.= "INSERT INTO  `waysfor`.`history` (`id` ,`status` ,`classname` ,`opentime` ,`classtype` ,`object` ,`classcontent` ,`trainername` ,`trainercontent` ,`posttime` ,`recommend`)	VALUES ('', '2', '".$row['cpname']."', '' , '".$row['cpsort']."', '', '".$row['cpcon']."', '".$row['trainer']."', '', '".$row['listtime']."', '".$row['recommend']."');
		";
		file_put_contents('cp.txt' ,$sql);
		echo '<br />';
    }

    mysql_free_result($result);
?>