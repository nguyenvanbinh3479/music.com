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
                                <li class="list-inline-item"><a href="admin.php?c=author" style="color: #999;">Author</a></li>
								<li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="admin.php?c=author&a=edit&id=<?php echo $author->id?>" style="color: #999;">Edit Author</a></li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=author" style="color: white;">Author</a></button>
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
						<input type="hidden" name="id" value="<?php echo $author->id; ?>">
						<input type="hidden" name="c" value="author">
						<input type="hidden" name="a" value="update">
						<div class="row">   		
							<h2>Edit Author</h2>
						</div>
						<div class="row">
						<label>Ten:</label>
						</div>
						<div class="row">
						<input type="text" class="form-control p-2 m-2" name="ten" value="<?php echo $author->ten; ?>">
						</div>
						<div class="row">
						<label>anh:</label>
						</div>
						<div class="row">
							<label class="btn btn-success btn-file">
								Browse <input type="file" accept="image/*" name="anh" style="display: none;" onchange="loadFile(event)">
								<script>
								var loadFile = function(event) {
									var output = document.getElementById('output');
									output.src = URL.createObjectURL(event.target.files[0]);
								};
								</script>
							</label>
							<img id="output" style="width: 300px; height: 200px;" src="<?php echo $author->anh; ?>"/>
						</div>
						<div class="row">
						<label>thong tin:</label>
						</div>
							<div class="row">   	
								<textarea class="form-control" rows="10" cols="10" class="form-control p-2 m-2" name="thong_tin"><?php echo $author->thong_tin; ?></textarea>
							</div>
							<div class="row">   
								<button class="btn btn-success p-2 m-2" type="submit">Apply</button>                                             
						</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>