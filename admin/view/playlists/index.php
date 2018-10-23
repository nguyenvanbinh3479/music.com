<?php 
  if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
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
                                <li class="list-inline-item"><a href="admin.php?c=playlist" style="color: #999;">Playlist</a></li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                          <a href="admin.php?c=home" style="color: white;">Home</a></button>
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
          <div class="row">
            <div class="col-md-12">
              <!-- DATA TABLE -->
              <h3 class="title-5 m-b-35">Playlist table</h3>
              <div class="table-data__tool">
                <div class="table-data__tool-left">
                  <div class="rs-select2--light rs-select2--md">
                      <select class="js-select2" name="property">
                          <option selected="selected">All Properties</option>
                          <option value="">Option 1</option>
                          <option value="">Option 2</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                  </div>
                  <div class="rs-select2--light rs-select2--sm">
                      <select class="js-select2" name="time">
                          <option selected="selected">Today</option>
                          <option value="">3 Days</option>
                          <option value="">1 Week</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                  </div>
                  <button class="au-btn-filter">
                  <i class="zmdi zmdi-filter-list"></i>filters</button>
                </div>
                <div class="table-data__tool-right">
                  <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit">
                    <a href="admin.php?c=playlist&a=create" style="color: white;"><i class="zmdi zmdi-plus"></i>add Playlist</a>
                  </button>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <select class="js-select2" name="type">
                            <option selected="selected">Export</option>
                            <option value="">Excel</option>
                            <option value="">Word</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                  <thead>
                      <tr>
                          <th>
                              <label class="au-checkbox">
                                  <input type="checkbox">
                                  <span class="au-checkmark"></span>
                              </label>
                          </th>
                          <th>id</th>
                          <th>User</th>
                          <th>Ten</th>
                          <th>Anh</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list_playlist as $playlist) { ?>   
                      <tr class="tr-shadow">
                          <td>
                              <label class="au-checkbox">
                                  <input type="checkbox">
                                  <span class="au-checkmark"></span>
                              </label>
                          </td>
                            <td><?php echo increment_once($index); ?></td>
                                <?php 
                                foreach($list_user as $user){
                                $arr_playlist = (array)$playlist;
                                $arr_user = (array)$user;
                                if($arr_user['id'] == $arr_playlist['Users_id']){
                                ?><td><?php echo $arr_user['email']; ?></td><?php
                                }
                                }?>
                            <td><?php echo $playlist->ten; ?></td>
                            <td><img src="public/img/playlists/<?php echo $playlist->anh; ?>" style="width: 50px; height: 50px;"></img></td>      
                          <td>
                              <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                  <a href="admin.php?c=playlist&a=edit&id=<?php echo $playlist->id; ?>">
                                    <i class="zmdi zmdi-edit"></i>
                                  </a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                  <a href="admin.php?c=playlist&a=delete&id=<?php echo $playlist->id; ?>">
                                    <i class="zmdi zmdi-delete"></i>
                                  </a>
                                </button>
                              </div>
                          </td>
                      </tr>
                      <tr class="spacer"></tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- END DATA TABLE -->
            </div>
          </div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>