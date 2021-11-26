<?php
if(isset($_GET['subject'])){ 
$id = $_GET['subject'];
#####################################
$needle = ( $id. "||");
$count = 0;
$handle = fopen("news.db", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $pos = strpos($line, $needle);
        if ($pos !== false) {
            
$lines = $line .PHP_EOL;
#####################################
             $mystr=$lines;
             //space is used as delimiter
             $parts=explode('||', $mystr);
?>
<form action="submit.php" method="post">
<input name="name" type="hidden" value="<?=$parts[1]?>">
<input name="id" type="hidden" value="<?=$parts[0]?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
название<br><textarea name="subject" placeholder="название" cols="30" rows="2" autofocus="" required=""><?=$parts[1]?></textarea></h2><br>
дата<br><textarea name="date" placeholder="дата" cols="10" rows="2" autofocus="" required=""><?=$parts[4]?></textarea><b></b></td><br>
описание<br><textarea name="description" placeholder="описание" cols="90" rows="15" autofocus="" required=""><?=$parts[2]?></textarea></td><br>
маленькое описание<br><textarea name="small_description" placeholder="маленькое описание" cols="90" rows="1" autofocus="" required=""><?=$parts[3]?></textarea></td><br><hr>
      <input name="id" type="hidden" value="<?=$parts[0]?>">
      <input name="meta" value="<?=$lines?>">
<input value="создать" type="submit" name="go-submit-editnews"/><hr>

</form>
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
<p><a href="?subject=<?=$new[0]?>">редактировать</a></p><hr />
<?php } ?>
<?php } ?>