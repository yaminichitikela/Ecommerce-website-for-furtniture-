<?php
include("config.php");




if (isset($_GET['empID']) && $_GET['empID'] != "") {

	$sql_delete_Emp = "DELETE FROM Employee WHERE Employee_ID ='{$_GET['empID']}'";
	if (mysqli_query($con, $sql_delete_Emp)) {
		echo '<script>alert("Employee Deleted successfully")
  window.location.href="ManageEmployees.php"
  </script>';
	}

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript">
 $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
});
 </script>
    <style>

.gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}

body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>



      
</head>
    <title>Jersey Shore Furniture Employee Management</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div>
    <a class="nav-link"> <img  src="pictures/HomeLogo.png" width='200' height='100' /></a>
   </div>
    <div class="container-fluid"></div>
    <div class="container-fluid"></div>
    <div class="container-fluid"></div>
    
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
             	   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<a  class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"> 
              			  Welcome, <?php echo $_SESSION['EmpName'] ?> 
           				 </a>
                    <li class="nav-item">
                        <a class="nav-link" href="product_Management.php">Products</a>
                    </li>
                   
                    </div>
                    <div>
						<?php if($_SESSION['EmpName'] != "Admin") { ?>
                    <a class="nav-link" href="customerlogin.php"> <img  src="pictures/logout.png" href="ManagerView.php" width='30' height='30' /></a>
					<?php } else { ?>
						<a class="nav-link" href="DatabaseEmployeeView.php"> <img  src="pictures/logout.png" href="DatabaseEmployeeView.php" width='30' height='30' /></a>
						<?php } ?>
                    </div>
                    
                   
                </ul>
               

        </div>       
    </nav>

    
    
<section class="h-100 gradient-custom">
<form method="post" action="ManageEmployees.php">

  <div class="container py-5">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<?php if ($_SESSION['EmpName']=='Admin') { ?>	
					<div class="col-sm-6">
						<a href="employee_adding.php" class="btn btn-success"  data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
												
					</div>
					<?php } ?>
					
				</div>
			</div>
      <table class="table table-striped table-hover">
				<thead>
					<tr>
					
						<th>Emp #</th>
						<th>Name</th>
						<th>Email</th>
            			<th>Login_ID</th>
						<th>Manager?</th>
						<th>Actions</th>
					</tr>
				</thead>
        <tbody>
<?php

  //$Product_ID = $_REQUEST['Product_ID'];
	$employeeSQL = "select employee_id,Concat(FIRST_name,' ',Last_name) 'Full Name',email,Login_ID,(CASE WHEN Is_Manager =1  THEN 'Yes' ELSE 'No' end) AS 'Manager' from employee";
 
  $query_result = mysqli_query($con, $employeeSQL);
  $total_rows = mysqli_num_rows($query_result);


  while ($row = mysqli_fetch_assoc($query_result)) {


?>				
					<tr>
						
						<td><?php echo $row['employee_id'] ?></td>
						<td><?php echo $row['Full Name'] ?></td>
           				 <td><?php echo $row['email'] ?></td>
            				<td><?php echo $row['Login_ID'] ?></td>
            			<td><?php echo $row['Manager'];?></td>						
						<td>
							<input type="hidden" name="empID[]" value ='<?php echo $row['employee_id'] ?>' />
						<a href="employee_adding.php?empID=<?php echo $row['employee_id'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>	
						<?php if ($_SESSION['EmpName']=='Admin') { ?>	
						<a href="ManageEmployees.php?empID=<?php echo $row['employee_id'] ?>"  class="delete" onclick="return  confirm('do you want to delete the Employee?')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>			
						<?php } ?>
					</td>
					</tr>
					
				
      <?php
  }

      ?>
      </tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing  <b><?php echo $total_rows ?></b> entries</div>
			
			</div>
		</div>
	</div>        
</div>
 
  </div>
  </form>
</section>
    


</body>
</html>