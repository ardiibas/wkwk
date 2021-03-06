<?php

	session_start();
if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
  header('location:lol.php');
}

if (isset($_SESSION['level']) && $_SESSION['level'] != 'admin') {
	header('location:pembelian.php');
}

require_once('lib/DBPupuk.php');
	require_once('lib/db_pegawai.php');

	$peg = new Pegawai();
	$data = $peg->readAllPegawai();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PWL - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Database</span>Pupuk</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Pembelian</a></li>
			<li><a href="apenjualan.php"><svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>Penjualan</a></li>
			<li class="active"><a href="pegawai.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Pegawai</a></li>
			<li><a href="pupuk.php"><svg class="glyph stroked calendar blank"><use xlink:href="#stroked-calendar-blank"/></svg>Pupuk</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="lol.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Pegawai</h1>
			</div>
		</div><!--/.row-->

		<div class="table">
			<table class="table table-striped custab">
				<thead>
					<tr>
						<th>Id Pegawai</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No. Telp</th>
						<th>Jenis Kelamin</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php foreach ($data as $a):?>
					<tr>
						<td><?php echo $a['id_pegawai'] ?></td>
						<td><?php echo $a['nama'] ?></td>
						<td><?php echo $a['alamat'] ?></td>
						<td><?php echo $a['telp'] ?></td>
						<td><?php echo $a['gender'] ?></td>
						<td class="text-center"><a class='btn btn-info btn-xs' href="upegawai.php?id=<?php echo $a['id_pegawai']?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="dpegawai.php?id=<?php echo $a['id_pegawai']?>" class="btn btn-danger btn-xs" onclick="if(confirm('peesan')) window.location=this.href;return false;"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>

		<a href="tpegawai.php"><button class="btn btn-primary">Tambah Data</button></a>

	</div><!--/.main-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
