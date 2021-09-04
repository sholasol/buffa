<?php
$serial =  shell_exec('wmic DISKDRIVE GET SerialNumber 2>&1');

echo  $serial;
echo(system("uname-a"));
?>