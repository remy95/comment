<?php
include ('lib_sql.php');
?>
<h1>Last news</h1>
<hr />
<?php
$v1 = mysql_query('SELECT * FROM articles ORDER BY id DESC LIMIT 0,3');
while($info_articles = mysql_fetch_array($v1)) {
?>
Article #<?php echo $info_articles['id'];?> by <?php echo $info_articles['auteur'];?> <i><?php echo $info_articles['titre'];?></i><br />
<?php echo $info_articles['contenu'];?><br /><?php echo "<a href='post.php?id=".$info_articles['id']."'>Comment the article</a><hr />";?>
<?php
}
?>
