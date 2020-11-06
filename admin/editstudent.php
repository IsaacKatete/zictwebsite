<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
	$age = $_POST['age'];
  	$symptoms = $_POST['symptoms'];
  	$pcontact = $_POST['pcontact'];
  	
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `patients` SET `name`='$name',`roll`='$roll',`age`='$age',`symptoms`='$symptoms',`pcontact`='$pcontact',`photo`='$photo' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			unlink('images/'.$oldPhoto);
		}	
  		header('Location: index.php?page=all-student&edit=success');
  	}else{
  		header('Location: index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Patient's Informations!<small class="text-warning"> Edit Patient!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Patients </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Patients</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `name`, `roll`, `age`, `symptoms`, `pcontact`, `photo`, `datetime` FROM `patients` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Patient's Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required>
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Computer No:</label>
		    <input name="roll" type="text" class="form-control"  id="roll" value="<?php echo $row['roll']; ?>" required>
	  	</div>
         	<div class="form-group">
		    <label for="age">Age</label>
            <input name="age" type="text" class="form-control" id="age" value="<?php echo $row['age']; ?>" required>
		
	  	</div>
	  	<div class="form-group">
		    <label for="symptoms">Symptoms</label>
		    <input name="symptoms" type="text" class="form-control" id="symptoms" value="<?php echo $row['symptoms']; ?>" required>
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Mobile</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?php echo $row['pcontact']; ?>"  placeholder="01........." required>
	  	</div>
	 
	  	<div class="form-group">
		    <label for="photo">Patient's Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Add Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>