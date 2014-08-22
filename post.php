<?php
include ('lib_sql.php');

if (!isset($_GET['id']))
	header('Location: blog.php');
else
	$id_get = intval($_GET['id']);
	

$v1 = mysql_query('SELECT * FROM articles where id = "'.$id_get.'"');
$info_articles = mysql_fetch_array($v1);
?><h1><?php echo $info_articles['titre']?></h1> par <?php echo $info_articles['auteur']?>
<br />
<?php echo nl2br(htmlspecialchars($info_articles['contenu']));?>
<hr /><?php
if (isset($_POST['pseudo']) && isset($_POST['message']))
{
$pseudo = mysql_escape_string($_POST['pseudo']);
$message = mysql_escape_string($_POST['message']);
mysql_query('insert into commentaire values("","'.$pseudo.'","'.$message.'","")') or die(mysql_error());
}
?>
<?php 
$v2 = mysql_query('select * from commentaire');
while ($com = mysql_fetch_array($v2))
{?>
#<?php echo $com['id'];?> par <?php echo htmlspecialchars($com['auteur']);?><br />
<?php echo nl2br(htmlspecialchars($com['contenu']));?><br />
<?php
}
?>

<form action = "post.php" method ="post">
<input type="text" name="pseudo"/></br>
<textarea name="message"></textarea></br>
<input type="submit" value="commenter" />
</form>