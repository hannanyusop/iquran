<?php
if(isset($_REQUEST))
{
    mysql_connect("localhost","root","");
    mysql_select_db("quran");
    error_reporting(E_ALL && ~E_NOTICE);

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    if(isMobile()){
        $device_type = "Mobile/Tablet";
    }
    else {
       $device_type = "Laptop/PC";
    }

    $sql="INSERT INTO `statistics` (`ip_address`, `hostname`, `country`, `state`, `city`,  `postal`, `device_type`) VALUES
('$_REQUEST[ip]', '".gethostname()."', '$_REQUEST[country]', '$_REQUEST[region]', '$_REQUEST[city]', '$_REQUEST[postal]', '$device_type')";
    $result=mysql_query($sql);
    if($result){
        echo "You have been successfully subscribed.";
    }
}
?>