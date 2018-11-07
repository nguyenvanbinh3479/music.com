<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="public/img/icons/icon_logo.png">
        <link rel="stylesheet" href="public/css/style.css">
        <meta http-equiv="Content-Language" content="vi">
        <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true">     
		<link rel="stylesheet" href="public/css/bootstrap.min.css">
		<script src="public/js/jquery-3.3.1.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <!-- <script src="public/js/disable-copy.js"></script> -->
        <title>M.S.C - Home</title>
    </head>
    <body>
        <!--A Begin box header-->
        <div class="box-header" id="header">
            <div class="wrap">
                <div class="content-wrap">
                    <a class="logo" href="index.php"></a>
                    <div class="menu-subdomain">
                        <a href="index.php" target="_blank">MUSIC</a>
                        <a href="video.php" class="active">VIDEO</a>
                    </div>
                      <div id="box_search_quick" class="box_search">
                        <div class="bg-top-noel"></div>
                        <form id="formSearchQuick" method="GET" action="tim-kiem" onsubmit="return NCTQuickSearch.buttonSearchProcess();">
                            <input id="txtSearch" maxlength="45" name="q" type="text" class="i-search" value="" rel="Tìm bài hát, video, playlist, ca sĩ" autocomplete="off">                    
                            <input id="btnSearch" type="submit" class="b-search" value="SEARCH">
                            <div class="list-keyword" id="divHotKeyword">                            
                            </div>
                        </form>
                        <div id="divSuggestion" class="hideShowCase suggestion" m="0">                        
                            <div style="float:left; width:346px; max-height: 450px;">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 0px;"><div id="idScrllSuggestion" style="overflow: hidden; width: auto; height: 0px;">
                                    <ul id="contentSuggestion" class="content_search" style="text-transform:capitalize;"></ul>
                                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                        </div>
                    </div>
					<div class="follow">
						<a href="https://www.youtube.com/channel/UCf0SS3m2zdRtfaAgnr5kIBw/?sub_confirmation=1">
							<img src="public/img/icons/youtube.png" alt="">
						</a>
						<a href="http://123link.pw/WV3BLpxl">
							<img src="public/img/icons/facebook.png" alt="">
						</a>
						<a href="http://123link.pw/EKl2z">
							<img src="public/img/icons/google.png" alt="">
						</a>
						<a href="http://123link.pw/qaXD0FW">
							<img src="public/img/icons/blogger.png" alt="">
						</a>
					</div>
                </div>
            </div>
        </div>
        <!--End box header-->

        <!--A Begin sub-menu-header-->
        <div id="submenu" class="sub-menu-header">
            <div class="wrap">
                <div class="content-wrap">
                    <!--A Begin sub-menu-top-->   
                    <div class="menu-top">
                        <ul class="notifi" id="menuTop">
                            <li class="icon_logo_menu" id="icon_menu_logo">
                                <a href="index.php" title="Home" class="active">Home</a>
                            </li>
                            
                            <li>                                
                                <a href="songs.php" title="Songs">Songs</a>
                            </li>
                            
                            <li>
                                <a rel="follow" href="genres.php" title="Genres">Genres</a>
                            </li>
                            
                            <li>
                                <a rel="follow" href="singers.php" title="Singer">Singers</a>
                            </li>
                        </ul>
                    </div>
                    <!--End sub-menu-top-->

                </div>
            </div>
        </div>
        <!--End sub-menu-header-->

        <!--A Begin box content-->
        <div class="box-content">
            <div class="wrap">
                <div class="content-wrap">
                                    
                </div>
            </div>
        </div>
        <!--End box content-->

        <!--A Begin box footer-->
        <div class="footer">
            <div class="wrap">
                <div class="content-wrap">
                    <h6>@2018 M.S.C Channel. All Rights Reserved | Design by BinhNguyen</h6>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
        <!--End box footer-->

    </body>
</html>