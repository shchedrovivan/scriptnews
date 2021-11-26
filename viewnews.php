<?php
//вход только с id страницей
if(isset($_GET['subject'])){ 
//получает номер отсюда ?subject=xxx , xxx это id новости
$id = $_GET['subject'];
// ещет номер строки 
$needle = ( $id. "||");
$count = 0;
// открывает файл и обрабатывает
$handle = fopen("news.db", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // вон отсюда получет строку которая превратится в текст.
        $pos = strpos($line, $needle);
        if ($pos !== false) {
            
$lines = $line .PHP_EOL;
#####################################
             $mystr=$lines;
             // здесь строка разделяется на название , маленькое описание , описание , дата
             $parts=explode('||', $mystr);
?>
<input name="name" type="hidden" value="<?=$parts[1]?>">
<input name="id" type="hidden" value="<?=$parts[0]?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<h2><?=$parts[1]?></h2>
<p><em>дата: <?=$parts[4]?></em></p>
<hr />
<p><?=$parts[2]?></p>
<p style="text-align: left;"></p>
<hr>
<?php
        }
        $count++;
    }
    fclose($handle);
} else {
}
  } 
  else{ ?>
          
  <?php
  $news = file_get_contents("news.db");
#  $textedit = "редактировать";
    $news = explode("\n", $news);
  for ($i = 0; $i < count($news); $i++) {
    $new = explode("||", $news[$i]);
  $textedit = $new[5];
  

    ?>
<h2><?=$new[1]?></h2>
<p><?=$new[3]?></p>

<p><a href="?subject=<?=$new[0]?>">просмотреть</a></p><hr />
<?php } ?>
<?php } ?>