<?php include('server.php');
$edit_state=false;
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$edit_state=true;

$rec=mysqli_query($db,"SELECT * FROM crud WHERE id=$id");
$record=mysqli_fetch_array($rec);
$name=$record['name'];
$address=$record['address'];
$id=$record['id'];


}

?>
<!DOCTYPE html>
<html>

<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if(isset($_SESSION['msg'])):?>
	<div class="msg">
		<?php
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		?>
		</div>
		<?php endif?>
<table>
	<thead>
		<tr>
			<th> Nume</th>
			<th>Locatie</th>
			<th colspan="2">Actiune</th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_array($results)) { ?>
	<tr>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['address']?></td>
		<td>
		<a href="user.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
</td>
<td>
	<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Sterge</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Nume</label>
			<input type="text" name="name" value="<?php echo $name;?>">
		</div>
		<div class="input-group">
			<label>Locatie</label>
			<input type="text" name="address" value="<?php echo $address;?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn">Salveaza</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Actualizare</button>
			<?php endif ?>
			</div>
	</form>
</body>
</html>