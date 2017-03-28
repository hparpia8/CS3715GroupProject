<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    
	<link rel="stylesheet" href="style/main.css?version=1">
</head>
<body>

	<div id="wrapper">

		<h1 align="center" id="head">BLOG</h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div id="desc" >';
						echo '<h1 ><a id="title" href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p id="date">Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a id="details" href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>


</body>
</html>