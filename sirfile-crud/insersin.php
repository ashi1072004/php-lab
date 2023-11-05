<?php
include("./connection.php");

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>

</head>



<body>
<h1>fjkvbekbnle</h1>
	<div class="container">
		
		<div class="row justify-content-center ">

			<div class="col-6 bg-light mt-4 p-5">
				<form id="data">
					<div class="mb-3">
						<label for="" class="form-label">Name</label>
						<input type="text" name="s-name" id="" class="form-control" placeholder="Enter name">

					</div>
					<div class="mb-3">
						<label for="" class="form-label">Father Name</label>
						<input type="text" name="s-f_name" id="" class="form-control" placeholder="Enter name">

					</div>
					<div class="mb-3">
						<label for="" class="form-label">Class</label>
						<input type="text" name="s-class" id="" class="form-control" placeholder="Enter name">

					</div>
					<div class="mb-3">
						<label for="" class="form-label">Section</label>
						<input type="text" name="s-sec" id="" class="form-control" placeholder="Enter name">

					</div>
					<div class="mb-3">
						<label for="" class="form-label">Address</label>
						<textarea class="form-control" name="s-address" id="" rows="3"></textarea>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">email</label>
						<input type="email" name="s-gmail" id="" class="form-control" placeholder="Enter email">

					</div>
					<div class="mb-3">
						<label for="" class="form-label">mobile</label>
						<input type="number" name="s-mobile" id="" class="form-control" placeholder="Enter mobile">

					</div>

					<div class="mb-3">
						<label class="form-label">Gender</label>
						<select class="form-select form-select-lg" name="s-gender">
							<option selected>Select one</option>
							<option value="male">Male</option>
							<option value="female">Female</option>

						</select>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">User Pic</label>
						<input type="file" class="form-control" name="S-pic">

					</div>

					<input type="submit" value="submit" id="sub" name="sub" class="btn  btn-primary" />
				</form>
			</div>

		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>

          $(document).ready(function(){
                $("#sub").on("click",function(e){
                    e.preventDefault();
				 var formData=new FormData(data);
                   $.ajax({
					url:"./ajax/singleinsert.php",
					method:"POST",
					contentType:false,
					processData:false,
					data:formData,
					success:function(res){
                        if(res==1){
                           alert("Data Has Been Inserted");
						   $("form").trigger("reset");
						}else if(res==2){

							alert("Data Has Been Not Inserted");
						
						}else{
							alert("img invalid");
						}
					}
					
				   });

				});
		  });

	</script>
</body>

</html>