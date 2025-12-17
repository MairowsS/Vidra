<?php
$rez = mysqli_query($link,"SELECT * FROM users WHERE id='$UID'");
$ans = mysqli_fetch_assoc($rez);
echo "<h1> Привет, ".$ans['login']."!</h1>";
echo "<a href='/?action=out'>Выход</a>";
if ($admin) {
    echo '   <div>
                <p>Этот раздел виден только админам</p>
            </div>
        ';
}
?>
