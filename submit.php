<?php
if($_POST['go-submit-addnews']){
    // Исполняемый код
// последний раз отредактировано
// 23.11.2021 в 22:33
// 19.11.2021 в 20:33
// 13.11.2021 в 19:22
// конфиг
//куда все будет записывается 
$fileforwritenews = "news.db";
//
//это все от формы
//
// заголовок
$subject=$_POST['subject'];
// описание
$description = $_POST['description'];
// описание создает атрибут p и сжимает текст
$description_obrabotano = '<p>'.str_replace("\n\n", '</p><p>', $description_obrabotano).'</p>';
$description_obrabotano = str_replace("\n", '<br>', $description_obrabotano);
$description_obrabotano = str_replace("\n"," ",$description_obrabotano );
$description_obrabotano = str_replace("\r"," ",$description_obrabotano );
// мальнькое описание
$small_description = $_POST['small_description']; 
//дата создание товара
$date=$_POST['date'];
// получает количество строк 
  $fileonlines = $fileforwritenews; // указываем сам файл и путь к нему
  $id = count(file($fileonlines)); // высчитываем количество строк
// запись в файл 
$file_data = "\n $id||$subject||$description_obrabotano||$small_description||$date \n";
$file_data .= file_get_contents($fileforwritenews);
file_put_contents($fileforwritenews, $file_data);
// удаляет нуливую строку в файле
$linesonfila = file($fileforwritenews);  
unset($linesonfila[0]);
file_put_contents($fileforwritenews, implode('', $linesonfila)); 
echo "готово <br> <p><a href='news.db' title='открыть файл news.db'>открыть файл news.db</a></p>";
}
if($_POST['go-submit-editnews']){
$fileforwritenews = "news.db";

//атрибуты , редактрование в файле и форма

// заголовок
$subject = $_POST['subject'];

// описание создает атрибут p и сжимает текст
$description = $_POST['description'];
$description_obrabotanoo = $description;
//$description_obrabotanoo = str_replace("\n", "</p>\n<p>", $description_obrabotanoo);
$description_obrabotanoo = '<p>'.str_replace("\n\n", '</p><p>', $description_obrabotanoo).'</p>';
$description_obrabotanoo = str_replace("\n", '<br>', $description_obrabotanoo);
$description_obrabotanoo = str_replace("\n","",$description_obrabotanoo );
$description_obrabotanoo = str_replace("\r","",$description_obrabotanoo );
// мальнькое описание
$small_description = $_POST['small_description'];
// дата создание новости
$date = $_POST['date'];
// id товара
$id = $_POST['id'];
// echo "<input value='$id||$subject||$description_obrabotanoo||$small_description||$date'>";
$meta = $_POST['meta'];
$data = file_get_contents("news.db"); // Вывести данные из файла в переменную$data = preg_replace('/^[ \t]*[\r\n]+/m', '', $data);
// $data = str_replace("\n","",$data); // Заменить 2-ки на пустые места
// $data = str_replace("\r","",$data); // Заменить 2-ки на пустые места
$data = str_replace("$meta","$id||$subject||$description_obrabotanoo||$small_description||$date\n",$data); // Заменить 2-ки на пустые места
$handle = fopen("news.db","w+"); // Открыть файл, сделать его пустым
fwrite($handle,$data); // Записать переменную в файл
fclose($handle); // Закрыть файл
//////////////////////////////////////////////////////////////////////////////////
$base = file_get_contents("news.db");
$base = rtrim(preg_replace("/[\r\n]+/m","\r\n", $base));
$fp = fopen("news.db","w");
fwrite($fp, "$base");
fclose($fp);
echo "редактировано";
}
else {
    //текст 
    echo "нельзя";
}
?>