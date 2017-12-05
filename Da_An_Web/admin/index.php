<?php
include "../config/config.php";
include ROOT."/include/function.php";
if (!isset($_SESSION)) session_start();
spl_autoload_register("loadClass");
$db= new Db();
//$cart = new Cart();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by INDEZINER</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="clockp.js"></script>
<script type="text/javascript" src="clockh.js"></script> 
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin, <a href="#">Visit site</a> | <a href="#" class="messages">(3) Messages</a> | <a href="#" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a class="current" href="index.html">Admin Home</a></li>
                   
                    </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <form>
            <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
            <input type="image" class="search_submit" src="images/search.png" />
            </form>            
            </div>
    
            <div class="sidebarmenu">
				<a class="menuitem submenuheader" href="">Admin</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?ac=loai">Sửa đổi thông tin cá nhân</a></li>
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="">Quản lý khách hàng</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Thông tin khách hàng</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Quản lý sản phẩm</a>
                <div class="submenu">
                    <ul>
                    <li><a href="index.php?act=hangsanxuat">Hãng sản xuất</a></li>
                    <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
					
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="" >Quản lý đơn hàng</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Đơn hàng mới</a></li>
                    <li><a href="">Đơn hàng đang xử lý</a></li>
                    <li><a href="">Danh sách dơn hàng đã giao</a></li>
                   
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Quản lý đơn nhập</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">Nhập hàng mới</a></li>
                    <li><a href="index.php?act=nhacc">Nhà cung cấp</a></li>
                   
                    </ul>
                </div>
				
                <a class="menuitem" href="">User Reference</a>
                <a class="menuitem" href="">Blue button</a>
                
                <a class="menuitem_green" href="">Green button</a>
                
                <a class="menuitem_red" href="">Red button</a>
                    
            </div>
            
            
            
            
            
            
            
            
         
              
    
    </div>  
    
    <div class="right_content">
        <?php
		
        $act =isset($_GET["act"])?$_GET["act"]:"";
		//Sản phẩm
        if ($act=="sanpham")
        {
            include "include/qlsanpham/sanpham.php";
        }
		if ($act=="chitietsanpham")
        {
            include "include/qlsanpham/chitietsanpham.php";
        }
        if ($act=="del_sanpham")
        {
            include "include/qlsanpham/del_sanpham.php";
        }
        if (($act=="edit_sanpham") || ($act=="edit_sanpham2"))
        {
            include "include/qlsanpham/edit_sanpham.php";
        }
        if ($act=="insert_sanpham")
        {
            include "include/qlsanpham/ins_sanpham.php";
        }
		//Hãng sản xuất
		 if ($act=="hangsanxuat")
        {
            include "include/qlhangsanxuat/hangsanxuat.php";
        }
        if ($act=="del_hangsanxuat")
        {
            include "include/qlhangsanxuat/del_hangsanxuat.php";
        }
        if (($act=="sua_hangsanxuat") ||($act=="sua_hangsanxuat2"))
        {
            include "include/qlhangsanxuat/sua_hangsanxuat.php";
        }
        if ($act=="insert_hangsanxuat")
        {
            include "include/qlhangsanxuat/ins_hangsanxuat.php";
        }
		//hình sản phẩm
		if ($act=="hinh")
        {
            include "include/qlsanpham/hinh.php";
        }
        if ($act=="del_hinh")
        {
            include "include/qlsanpham/del_hinh.php";
        }
        if (($act=="edit_hinh") ||($act=="edit_hinh2"))
        {
            include "include/qlsanpham/edit_hinh.php";
        }
        //if ($act=="insert_hinh")
        //{
        //    include "include/qlsanpham/ins_hinh.php";
        //}
		//Quản lý nhà cung cấp
		 if ($act=="nhacc")
        {
            include "include/qlnhacungcap/nhacc.php";
        }
        if ($act=="del_nhacc")
        {
            include "include/qlnhacungcap/del_nhacc.php";
        }
        if (($act=="edit_nhacc") ||($act=="edit_nhacc2"))
        {
            include "include/qlnhacungcap/edit_nhacc.php";
        }
        if ($act=="insert_nhacc")
        {
            include "include/qlnhacungcap/ins_nhacc.php";
        }
		



        ?>
    </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>