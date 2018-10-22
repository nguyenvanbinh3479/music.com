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
                                <li class="list-inline-item"><a href="admin.php?c=hear" style="color: #999;">Hear</a></li>                           
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="admin.php?c=hear&a=create" style="color: #999;">Create Hear</a></li>                           
							</ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=hear" style="color: white;">Hear</a></button>
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
					<input type="hidden" name="c" value="hear">
					<input type="hidden" name="a" value="store">
					<div class="row">   		
						<h2>Create Hear</h2>
					</div>
						<div class="row">   		
							<label>Bai Hat:</label>
						</div>
						<div class="row">   	
							<select class="form-control p-2 m-2" name="Songs_id">
								<?php foreach ($list_song as $key => $value) { 
									$arr = (array) $value;?>
                                    <option value="<?php print_r($arr['id']); ?> "> <?php print_r($arr['ten']);
                                 };?></option>
							</select>
						</div>
						<div class="row">   		
							<label>User:</label>
                        </div>
						<div class="row">   	
							<select class="form-control p-2 m-2" name="Users_id">
								<?php foreach ($list_user as $key => $value) { 
									$arr = (array) $value;?>
                                    <option value="<?php print_r($arr['id']); ?> "> <?php print_r($arr['email']);
                                 };?></option>
							</select>
						</div>
						<div class="row">   		
							<label>ngay:</label>
						</div>
						<div class="row">   	
							<input type="date" class="form-control p-2 m-2" name="ngay" required>
                            
						</div>
					<div class="row">   
						<button class="btn btn-primary p-2 m-2" type="submit">Apply</button>
					</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>	