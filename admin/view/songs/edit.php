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
                                <li class="list-inline-item"><a href="admin.php?c=song" style="color: #999;">Song</a></li>
								<li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="admin.php?c=song&a=edit&id=<?php echo $song->id?>" style="color: #999;">Edit Song</a></li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=song" style="color: white;">Song</a></button>
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
						<input type="hidden" name="id" value="<?php echo $song->id; ?>">
						<input type="hidden" name="c" value="song">
						<input type="hidden" name="a" value="update">
						<div class="row">   		
							<h2>Edit Song</h2>
						</div>
						<div class="row">   		
							<label>Ca si: </label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="Singers_id">
                                <?php
                                foreach ($list_singer as $value)
                                {
                                    $singer = (array) $value;
                                    $id = $singer['id'];
                                    $Singers_id = $song->Singers_id;
                                    $name = $singer['ten'];
                                    if ($Singers_id == $id) {
                                        echo "<option value='$id' selected>$name
                                        </option>";
                                    }else {
                                        echo "<option value='$id'> $name
                                        </option>";
                                    }
                                }            
                                ?>  
							</select>
						</div>
						<div class="row">   		
							<label>Album:</label>
						</div>
						<div class="row">   	
							<select class="form-control p-2 m-2" name="Albums_id">
                                <?php
                                foreach ($list_album as $value)
                                {
                                    $album = (array) $value;
                                    $id = $album['id'];
                                    $Albums_id = $song->Albums_id;
                                    $name = $album['ten'];
                                    if ($Albums_id == $id) {
                                        echo "<option value='$id' selected>$name
                                        </option>";
                                    }else {
                                        echo "<option value='$id'> $name
                                        </option>";
                                    }
                                }            
                                ?>  
							</select>
						</div>
						<div class="row">   		
							<label>The Loai:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="Categories_id">
                                <?php
                                foreach ($list_category as $value)
                                {
                                    $category = (array) $value;
                                    $id = $category['id'];
                                    $Categories_id = $song->Categories_id;
                                    $name = $category['ten'];
                                    if ($Categories_id == $id) {
                                        echo "<option value='$id' selected>$name
                                        </option>";
                                    }else {
                                        echo "<option value='$id'> $name
                                        </option>";
                                    }
                                }            
                                ?>  
							</select>
						</div>
						<div class="row">   		
							<label>Tac Gia:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="Authors_id">
                                <?php
                                foreach ($list_author as $value)
                                {
                                    $author = (array) $value;
                                    $id = $author['id'];
                                    $Authors_id = $song->Authors_id;
                                    $name = $author['ten'];
                                    if ($Authors_id == $id) {
                                        echo "<option value='$id' selected>$name
                                        </option>";
                                    }else {
                                        echo "<option value='$id'> $name
                                        </option>";
                                    }
                                }            
                                ?>
							</select>
						</div>
						<div class="row">   		
							<label>Ten Bai Hat:</label>
						</div>
						<div class="row">
								<input type="text" class="form-control p-2 m-2" name="ten" value="<?php echo $song->ten; ?>">
						</div>
						<div class="row">   		
							<label>Anh:</label>
						</div>
                        <div class="row">
                            <label class="btn btn-primary btn-file">
                                Browse <input type="file" accept="image/*" name="anh" style="display: none;" onchange="loadFile(event)">
                                <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                                </script>
                            </label>
                            <img id="output" style="width: 300px; height: 200px;" src="public/img/songs/<?php echo $song->anh; ?>"/>
						</div>
						<div class="row">   		
							<label>Loi Bai Hat:</label>
						</div>
						<div class="row">
                            <textarea class="form-control" rows="10" cols="50" class="form-control p-2 m-2" name="loi"><?php echo $song->loi; ?></textarea>
						</div>
						<div class="row">   		
							<label>Link:</label>
						</div>
						<div class="row">
                            <input type="file" accept="audio/*" name="link"><?php echo $song->link?>
						</div>
						<div class="row">   		
							<label>Ngay:</label>
						</div>
						<div class="row">   	
							<input type="date" class="form-control p-2 m-2" name="ngay" value="<?php echo $song->ngay; ?>">
						</div>
						<div class="row">   
							<button class="btn btn-success p-2 m-2" type="submit">Apply</button>                                             
						</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>