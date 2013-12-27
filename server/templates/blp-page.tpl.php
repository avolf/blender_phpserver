<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
<title><?php echo SITE_NAME; ?></title>
<?php if ($htpl!="") include $htpl ?>
</head>
<body>
<div id="page">
<?php echo SITE_NAME; ?><br>
<a class="button" href="index.php" >Home</a>
<a class="button" href="newjob.php" >New Job</a>
<a class="button" href="editjob.php" >Edit</a>
<a class="button" href="configdb.php" >DB Config</a>
<br><br>
<?php if ($btpl!="") include $btpl ?>
</div>
</body>
</html>
