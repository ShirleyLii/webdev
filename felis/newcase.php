<?php
require 'lib/site.inc.php';
$view = new Felis\View();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Felis New Case</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="lib/css/felis.css">
</head>

<body>
<div class="case">
	<?php echo $view->header(); ?>
<form>
	<fieldset>
		<legend>New Case</legend>
		<p>Client:
			<select>
				<option>Helm, Levon</option>
				<option>Astor, Mary</option>
			</select>
		</p>

		<p>
			<label for="number">Case Number: </label>
			<input type="text" id="number" name="number" placeholder="Case Number">
		</p>

		<p><input type="submit" value="OK"> <input type="submit" value="Cancel"></p>

	</fieldset>
</form>


<footer>
	<p>Copyright © 2016 Felis Investigations, Inc. All rights reserved.</p>
</footer>

</div>

</body>
</html>
