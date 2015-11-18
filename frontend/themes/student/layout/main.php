<?php echo \application\lib\Tag::getDoctype() . "\n"; ?>
<html lang="en">
<head>
	<?php /*
	<title>Bootstrap 101 Template</title>
	*/?>
	<?php $this->header(); ?>
</head>
<body>
<?php echo $this->content(); ?>
<?php $this->footer(); ?>
</body>
</html>