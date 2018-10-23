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
                            </ul>
                        </div>
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
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <a href="admin.php?c=user">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo count($list_user)?></h2>
                                        <span>Users</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="admin.php?c=song">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-music"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo count($list_song)?></h2>
                                        <span>Songs</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="admin.php?c=singer">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo count($list_singer)?></h2>
                                        <span>Singers</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="admin.php?c=category">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo count($list_category)?></h2>
                                        <span>Categories</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <a href="admin.php?c=album">
                                        <h2 class="number"><?php echo count($list_album)?> </h2>
                                        <span class="desc">Albums</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-album"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <a href="admin.php?c=author">
                                        <h2 class="number"><?php echo count($list_author)?> </h2>
                                        <span class="desc">Authors</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-face"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--blue">
                                    <a href="admin.php?c=playlist">
                                        <h2 class="number"><?php echo count($list_playlist)?> </h2>
                                        <span class="desc">Playlists</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-playlist-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <a href="admin.php?c=comment">
                                        <h2 class="number"><?php echo count($list_comment)?> </h2>
                                        <span class="desc">Comments</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-comment-more"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item statistic__item--blue">
                                    <a href="admin.php?c=hear">
                                        <h2 class="number"><?php echo count($list_hear)?> </h2>
                                        <span class="desc">Hears</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-hearing"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item statistic__item--red">
                                    <a href="admin.php?c=like">
                                        <h2 class="number"><?php echo count($list_like)?> </h2>
                                        <span class="desc">Likes</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-label-heart"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item statistic__item--green">
                                    <a href="admin.php?c=playlistdetail">
                                        <h2 class="number"><?php echo count($list_playlistdetail)?> </h2>
                                        <span class="desc">Playlists Detail</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-playlist-audio"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>