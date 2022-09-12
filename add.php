<?php
echo "INSERT INTO `movie`(`name`, `type`, `time`, `date`, `pub`, `dir`, `movie`, `img`, `intro`, `sh`, `rank`) VALUES ";
for ($i=1; $i < 10; $i++) { 
    $type = rand(1,4);
    $date = ['2022-09-13','2022-09-13','2022-09-14','2022-09-11','2022-09-12'];
    echo "('院線片$i', '$type', '90', '{$date[$type]}', '院線片$i 發行商', '院線片$i 導演', '03B0{$i}v.mp4', '03B0$i.png', '院線片$i 劇情簡介', '1', '$i'),";
}

?>


<hr>


<?php
echo "INSERT INTO `poster`(`name`, `img`, `ani`, `sh`, `rank`) VALUES ";

for ($i=1; $i < 10; $i++) { 
    $ani = rand(1,3);
    echo "('預告片$i','03A0$i.jpg','$ani','1','$i'),";
}

?>