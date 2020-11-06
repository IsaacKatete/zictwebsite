<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addstudent'])) {
  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
	if (isset($_POST['age'])){
	$age = $_POST['age']; 
  	$symptoms = $_POST['symptoms'];
	$pcontact = $_POST['pcontact'];  	 	
  	$photo = explode('.', $_FILES['photo']['name']);
  	$photo = end($photo); 
  	$photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  

  	$query = "INSERT INTO `patients`(`name`, `roll`, `age`, `symptoms`, `pcontact`, `photo`) VALUES ('$name', '$roll', '$age','$symptoms', '$pcontact','$photo');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
  		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
  	}
  }
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Patient<small class="text-warning"> Add New Patient!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Patient</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Patients Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Patient's Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required>
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Computer No:</label>
		    <input name="roll" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control"  id="roll" required>
	  	</div>
        <div class="form-group">
		    <label for="age">Age</label>
		   <input name="age" type="text" class="form-control" id="age"  value="<?= isset($age)? $age: '' ; ?>" placeholder="age" required>
		    	
	  	</div>
	  	<div class="form-group">
        
		    <label for="symptoms">Symptoms</label>
		    <input name="symptoms" type="text" class="form-control" id="symptoms"  value="<?= isset($symptoms)? $symptoms: '' ; ?>" placeholder="symptoms" required>
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Mobile No:</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact"  value="<?= isset($pcontact)? $pcontact: '' ; ?>" placeholder="e.g.09...." required>
	  	</div>
	  	
	  	<div class="form-group">
		    <label for="photo">Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo" required>
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>