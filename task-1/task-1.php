<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="UTF-8">
      <title>Task 1</title>
	</head>
	<body>
	<?php

	$articleText = file_get_contents('text.txt'); // содержимое файла text.txt заносится в переменную $articleText
	$articleLink = "https://en.wikipedia.org/wiki/PHP"; //ссылка на статью
	$articlePreview = substr($articleText, 0, 199) . "..."; //обрезание до 200 символов и добавление в конец многоточия

	$array_articlePreview = explode(" ", $articlePreview); //массив слов анонса статьи

	//в цикле заменяются последние три слова на ссылку
	for ($i=3; $i>0; --$i){
		$array_articlePreview[count($array_articlePreview) - $i] = "<a href=$articleLink>".$array_articlePreview[count($array_articlePreview) - $i]."</a>";
	}
	$articlePreview=implode(" ", $array_articlePreview); //массив переводится в строку
	echo $articlePreview;

	/**Проблемы и возможные ошибки:
	* При обрезке статьи до определенного количества символов, возможно, последние слова будут написаны не полностью в зависимости от статьи и будет обрыв из букв.
	* Если на входе будет текст другой кодировки, то работать не будет
	* Проблемы с разделением текста на слова, если текст будет написан так (Lerdorf in 1994.The PHP reference) - сочетание "1994.The" - будет одним словом 
 	*/
     
	?>
	</body>
</html>