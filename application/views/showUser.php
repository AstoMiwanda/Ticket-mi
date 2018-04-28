<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
</head>
<style type="text/css">
	body{
		width: 100%;
		margin: 0;
		font-family: 'Segoe UI',serif, sans-serif;
	}
	#header{
		width: 60%;
		background-color: #fff;
		margin: 20px auto;
		background-color: #f4f4f4;
		border-radius: 5px;
		padding-bottom: 25px;
	}
	#header .title{
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		text-align: center;
		padding: 15px;
		font-size: 18pt;
		background-color: #0984e3;
		color: #fff;
	}
	#header .table{
		margin-top: 25px;
		width: 80%;
	}
	#header .table th{
		text-align: center;
	}
	#header .table td{
		padding-left: 10px;
	}
</style>
<body>
<div id="header">
	<div class="title">Daftar User</div>
	<center>
	<a href="add">Tambah</a>
	<table border="1" class="table">
		<tr>
			<th>Username</th>
			<th>Fullname</th>
			<th>Level</th>
			<th colspan="2">Action</th>
		</tr>
		<?php foreach ($isi->result() as $value): ?>
		<tr>
			<td><?php echo $value->username; ?></td>
			<td><?php echo $value->fullname; ?></td>
			<td><?php echo $value->level; ?></td>
			<td><a href="delete/<?php echo $value->id ?>">Hapus</a></td>
			<td><a href="update/<?php echo $value->id ?>">Edit</a></td>
		</tr>
		<?php endforeach ?>
		</table>
	</center>
</div>

</body>
</html>