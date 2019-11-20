<?php


echo "<h2>chrono</h2>";
$t1 = microtime(true);
echo $t1;

file_put_contents("test.txt", date("H:i:s"), FILE_APPEND);

if (mt_rand(0,100)> 50)
{
    echo "<h3>envoi email (attente timeout...)</h3>";
    @mail("toto@mail.me", "sujet", "contenu");
}
else
{
    echo "<h3>pas envoi email</h3>";
}

echo "<h2>chrono</h2>";
$t2 = microtime(true);
echo $t2;

echo "<h2>DELTA</h2>";
echo 1000 * ($t2 - $t1);
