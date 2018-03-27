<?php
include "../src/AccessToken.php";
include "TestTool.php";

$appID = "970CA35de60c44645bbae8a215061b33";
$appCertificate = "5CFd2fd1755d40ecb72977518be15d3b";
$channelName = "7d72365eb983485397e3e3f9d460bdda";
$ts = 1111111;
$salt = 1;
$uid = "2882341273";
$expiredTs = 1446455471;


$expected = "006970CA35de60c44645bbae8a215061b33IACV0fZUBw+72cVoL9eyGGh3Q6Poi8bgjwVLnyKSJyOXR7dIfRBXoFHlEAABAAAAR/QQAAEAAQCvKDdW";
$builder = new AccessToken($appID, $appCertificate, $channelName, $uid);
$builder->message->salt = $salt;
$builder->message->ts = $ts;
$builder->addPrivilege($Privileges["kJoinChannel"], $expiredTs);
$result = $builder->build();

assertEqual($expected, $result);


//test 2 uid 0 case

$appID = "970CA35de60c44645bbae8a215061b33";
$appCertificate = "5CFd2fd1755d40ecb72977518be15d3b";
$channelName = "7d72365eb983485397e3e3f9d460bdda";
$ts = 1111111;
$salt = 1;
$uid = "0";
$expiredTs = 1446455471;


$expected = "006970CA35de60c44645bbae8a215061b33IABNRUO/126HmzFc+J8lQFfnkssUdUXqiePeE2WNZ7lyubdIfRAh39v0EAABAAAAR/QQAAEAAQCvKDdW";
$builder = new AccessToken($appID, $appCertificate, $channelName, $uid);
$builder->message->salt = $salt;
$builder->message->ts = $ts;
$builder->addPrivilege($Privileges["kJoinChannel"], $expiredTs);
$result = $builder->build();

assertEqual($expected, $result);


//test 2 uid 0 number case

$appID = "970CA35de60c44645bbae8a215061b33";
$appCertificate = "5CFd2fd1755d40ecb72977518be15d3b";
$channelName = "7d72365eb983485397e3e3f9d460bdda";
$ts = 1111111;
$salt = 1;
$uid = 0;
$expiredTs = 1446455471;


$expected = "006970CA35de60c44645bbae8a215061b33IACw1o7htY6ISdNRtku3p9tjTPi0jCKf9t49UHJhzCmL6bdIfRAAAAAAEAABAAAAR/QQAAEAAQCvKDdW";
$builder = new AccessToken($appID, $appCertificate, $channelName, $uid);
$builder->message->salt = $salt;
$builder->message->ts = $ts;
$builder->addPrivilege($Privileges["kJoinChannel"], $expiredTs);
$result = $builder->build();

assertEqual($expected, $result);


?>
