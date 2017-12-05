 <script type="text/javascript" src="../../jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#hsx1').submit(function()
	{
		var flag= true;
		var th =$.trim($('#th1').val());
		if(th=='')
		{
			$('#th1_error').text('Tên hãng không được để trống');
			flag=false;
		}
		else
		$('#th1_error').text('');
		return flag;
	
	});
});
</script>  
<?php
$act=getIndex("act");
$mancc =getIndex("mancc");
$nhacungcap = new nhacungcap();

if ($act=="edit_nhacc") 
{
	$data = $nhacungcap->getDetail($mancc);
	
		
		if (Count($data)==0) {exit;}

			if ($mancc =="") exit;
		?>            
		 
			<h2>Quản lý nhà cung cấp</h2> 
			<form action="index.php?act=edit_nhacc2" method="post" id="hsx1">
			Mã nhà cung cấp &nbsp; <input type="hidden" name="mancc"  value="<?php echo $data["mancc"];?>"><?php echo $data["mancc"];?><br><br>
			Tên nhà cung cấp  &nbsp;<input type="text" name="tenncc" value="<?php echo $data["tenncc"];?>" id="th1"><label id="th1_error" class="error"></label><br><br>
			<input type="submit" name="them" value="Save"id="them"><br><br>
		</form>
	  <br>   
		<?php
		}

if ($act=="edit_nhacc2" ) //update
{

  $nhacungcap->editnhacungcap($_POST["mancc"],$_POST["tenncc"]);

	
 ?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=nhacc';
</script>
<?php 

}
?>

