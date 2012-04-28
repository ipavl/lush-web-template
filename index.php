<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
  ob_start (); // Buffer output
?> 
<html>
<head>
  <title>Home | Site Title</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>

<body>

<div id="container">
	<?php include('includes/header.php'); ?>

	<div id="content">
		<?php
			if (isset($_GET['page']))
			{
				$p = $_GET['page'];

				$file_check = "includes/pages/" . $p . "";

				if (file_exists($file_check))
				{
					include($file_check);
					$pageTitle = $p . ' | Site Title';
					$pageContents = ob_get_contents (); // Get all the page's HTML into a string
					ob_end_clean (); // Wipe the buffer
  
					// Replace the <title> text with $pageTitle (with first letter uppercased), and print the HTML
						echo str_replace ('Home | Site Title', ucfirst($pageTitle), $pageContents);
				} else {
					echo 'The requested page could not be found.';
					$pageContents = ob_get_contents (); // Get all the page's HTML into a string
					ob_end_clean (); // Wipe the buffer
					echo str_replace ('Home | Site Title', 'Error | Site Title', $pageContents);
				}
			} else {
				//echo 'No page specified.';
				include('includes/pages/index');
			}
		?>

	</div>
	<?php include('includes/footer.php'); ?>
</div>

</body>
</html>