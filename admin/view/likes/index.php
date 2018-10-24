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
                                <li class="list-inline-item"><a href="admin.php?c=like" style="color: #999;">Like</a></li>
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
              <h3 class="title-5 m-b-35">Like table</h3>
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
                    <a href="admin.php?c=like&a=create" style="color: white;"><i class="zmdi zmdi-plus"></i>add Like</a>
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
                          <th>ID</th>
                          <th>User</th>
                          <th>Song</th>
                          <th>Ngay</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($list_like as $like) { ?>   
                      <tr class="tr-shadow">
                          <td>
                              <label class="au-checkbox">
                                  <input type="checkbox">
                                  <span class="au-checkmark"></span>
                              </label>
                          </td>
                            <td><?php echo increment_once($index); ?></td>
                            <?php 
                                $arr = (array) $list_song;
                                foreach ($arr as $key => $value) {
                                    $song = (array) $value;
                                    if ($song['id'] == $like->Songs_id)   
                                    echo '<td> '. $song['ten'] .' </td>';
                                }
                            ?>
                            <?php 
                                $arr = (array) $list_user;
                                foreach ($arr as $key => $value) {
                                    $user = (array) $value;
                                    if ($user['id'] == $like->Users_id)   
                                    echo '<td> '. $user['email'] .' </td>';
                                }
                            ?>
                                <td><?php $date = date_create($like->ngay); echo date_format($date, "d/m/Y"); ?></td>
                          <td>
                              <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                  <a href="admin.php?c=like&a=delete&Songs_id=<?php echo $like->Songs_id; ?>&Users_id=<?php echo $like->Users_id;?>">
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