<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="admin.php?c=home">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="admin.php?c=user" style="color: #999;">User</a></li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=user" style="color: white;">User</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<!-- END PAGE CONTAINER-->

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
			<div id="wrapper">
				<div class="container">
					<form method="post" action="admin.php">
						<input type="hidden" name="id" value="<?php echo $user->id; ?>">
						<input type="hidden" name="c" value="user">
						<input type="hidden" name="a" value="update">
						<div class="row">   		
							<h2>Edit user</h2>
						</div>
						<div class="row">   		
							<label>Email:</label>
						</div>
						<div class="row">   		
							<input type="text" class="form-control p-2 m-2" name="email" value="<?php echo $user->email; ?>" required>
						</div>
						<div class="row">   		
							<label>Password:</label>
						</div>
						<div class="row">   	
							<input type="text" class="form-control p-2 m-2" name="password" value="<?php echo $user->password; ?>" required>
						</div>
						<div class="row">   		
							<label>Role:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="role">
								<?php 
									$role = $user->role;
									if ($role == "admin") {
										echo "<option value='$role' selected>admin</option>";
										echo "<option value='user'>user</option>";
									}else {
										echo "<option value='$role' selected>user</option>";
										echo "<option value='admin'>admin</option>";
									}
								?>
							</select>
						</div>
						<div class="row">   		
							<label>Status:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="status">
								<?php 
									$status = $user->status;
									$visible = "visible";
									if ($status == "visible") {
										echo "<option value='$status' selected>visible</option>";
										echo "<option value='disable'>disable</option>";
									}else {
										echo "<option value='$status' selected>disable</option>";
										echo "<option value='$visible'>visible</option>";
									}
								?>
							</select>
						</div>
						<div class="row">   
							<button class="btn btn-success p-2 m-2" type="submit">Apply</button>                                             
						</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>