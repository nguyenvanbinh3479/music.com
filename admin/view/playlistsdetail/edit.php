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
                                <li class="list-inline-item"><a href="admin.php?c=playlistdetail" style="color: #999;">Playlist Detail</a></li>
								<li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="admin.php?c=playlistdetail&a=edit&id=<?php echo $playlistdetail->id?>" style="color: #999;">Edit Playlist Detail</a></li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=playlistdetail" style="color: white;">Playlist Detail</a></button>
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
						<input type="hidden" name="id" value="<?php echo $playlistdetail->id; ?>">
						<input type="hidden" name="c" value="playlistdetail">
						<input type="hidden" name="a" value="update">
						<div class="row">   		
							<h2>Edit Playlist Detail</h2>
						</div>
						<div class="row">   		
							<label>Playlist:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="Playlists_id">
                                <?php
                                foreach ($list_playlist as $value)
                                {
                                    $playlist = (array) $value;
                                    $id = $playlist['id'];
                                    $Playlists_id = $playlistdetail->Playlists_id;
                                    $name = $playlist['ten'];
                                    if ($Playlists_id == $id) {
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
							<label>Bai Hat:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="Songs_id">
                                <?php
                                foreach ($list_song as $value)
                                {
                                    $song = (array) $value;
                                    $id = $song['id'];
                                    $Songs_id = $playlistdetail->Songs_id;
                                    $name = $song['ten'];
                                    if ($Songs_id == $id) {
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
							<button class="btn btn-success p-2 m-2" type="submit">Apply</button>                                             
						</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>