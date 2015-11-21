<?php echo \application\lib\Tag::getDoctype() . "\n"; ?>
<html lang="en">
<head>
	<?php /*
	<title>Bootstrap 101 Template</title>
	*/?>
	<?php $this->header(); ?>
</head>
<body role="document">
<nav class="navbar navbar-nav navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Website.com</a>
		</div>
		<form class="navbar-form navbar-right">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search..." aria-describedby="basic-addon1"><span id="basic-addon1" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
			</div>
		</form>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
		</div><!--/.nav-collapse -->

	</div>
</nav>

<div class="container theme-showcase" role="main">
	<div class="row">
		<div class="col-lg-3 col-md-4">
			<div class="container-block">User</div>
		</div>
		<div class="col-lg-6 col-md-8">
			<div class="container-block">
				<div class="container-block-inner">Home</div>
				<div class="container-block-inner container-block-border-top"><?php echo $this->content(); ?></div>
			</div>
		</div>
		<div class="col-lg-3 visible-lg">
			<div class="container-block container-block-inner">News</div>
		</div>
	</div>
</div> <!-- /container -->

<?php $this->footer(); ?>
</body>
</html>