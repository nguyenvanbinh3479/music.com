<?php 
  if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
  require_once(PATH_PUBLIC . '/template/admin/header.php');
?>  
<div class="row">
  <div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">data table</h3>
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
          <a href="admin.php?c=user&a=create" style="color: white;"><i class="zmdi zmdi-plus"></i>add user</a>
        </button>
          <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
              <select class="js-select2" name="type">
                  <option selected="selected">Export</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
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
                <th>email</th>
                <th>password</th>
                <th>role</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($list_user as $user) { ?>   
            <tr class="tr-shadow">
                <td>
                    <label class="au-checkbox">
                        <input type="checkbox">
                        <span class="au-checkmark"></span>
                    </label>
                </td>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->password; ?></td>
                <td> <span class="status--process"><?php echo $user->role; ?></span></td>
                <td class="desc"><?php echo $user->status; ?></span></td>
                <td>
                    <div class="table-data-feature">
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                        <a href="admin.php?c=user&a=edit&id=<?php echo $user->id; ?>">
                          <i class="zmdi zmdi-edit"></i>
                        </a>
                      </button>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <a href="admin.php?c=user&a=delete&id=<?php echo $user->id; ?>">
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