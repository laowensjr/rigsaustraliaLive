<?php 
ob_start();
session_start();
?>
<html>
<head>
<title>Rig Sales Australia #1 Buy Sell Auction Your Rig</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #39F;
}
.bg {
	border: 2px solid #ffffff;
	padding: 1px 4px;
	border-radius: 50px;
	}
	.fadein { 
position:relative; height:400px; width:770px; margin:0 auto;
background: url("slideshow-bg.png") repeat-x scroll left top transparent;
padding: 10px;
 }
.fadein img {
	position:absolute;
	left:0px;
	top:0px;
	width: 739px;
	height: 409px;
}

-->
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 4000);
});
</script>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/buyOVER.jpg','images/sellOVER.jpg','images/auctionOVER.jpg','images/BUYmidAD_OVER.jpg','images/SELLmidAD_OVER.jpg','images/AUCTIONmidAD_OVER.jpg','images/sdOver.jpg','images/blastholeOVER.jpg','images/surplusOVER.jpg','images/newProductOVER.jpg','images/advertiseOVER.jpg','images/makeArequestOVER.jpg')">
<!-- Save for Web Slices (RIGSAUSTRALIA_index.psd) -->
<div>
  <table id="Table_01" width="1225" height="1585" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" style="border: 2px solid #ffffff; padding: 1px 4px; border-radius: 50px; azimuth:center;" >
    <tr>
      <td colspan="18"><br />
        <img src="images/index_01.jpg" width="951" height="2" alt=""></td>
      <td width="273" height="55" colspan="17" rowspan="2"><div style="font-size:12px">
        <?php 
//Connects to your Database 
//Make this more OO SEE Folder name FINAL_webPages
mysql_connect("localhost", "owenspcc_laowens", "lo19315761") or die(mysql_error()); 
 mysql_select_db("owenspcc_rigsalesaustralia") or die(mysql_error());
 //Checks if there is a login cookie
 if(isset($_COOKIE['logincookie']))
 //if there is, it logs you in and directes you to the overview page
 { 
 	
   
   //Set Cookies
	$username = $_COOKIE['logincookie']; 
 	$pass = $_COOKIE['passcookie'];
 	 	$check = mysql_query("SELECT * FROM sellers WHERE username = '$username'")or die(mysql_error());
 	while($info = mysql_fetch_array( $check )) 	
 		{
 		if ($pass != $info['password']) 
 			{
 			 			}
 		else
 			{
 			//header("Location: login/overview.php");
			
echo 'Welcome '.$info['bizname'].'! <a href="login/overview.php">Your Dashboard</a> '; 
 			}
 		}
 }
 //if the login form is submitted 
 if (isset($_POST['submitL'])) { // if form has been submitted
 // makes sure they filled it in
 	if(!$_POST['username'] | !$_POST['pass']) {
 		echo 'Required Field Missing<a href='.$_SERVER['PHP_SELF'].'>Try again.</a><br />';
 	}
 	// checks it against the database
 	if (!get_magic_quotes_gpc()) {
 		$_POST['username'] = addslashes($_POST['username']);
 	}
 	$check = mysql_query("SELECT * FROM sellers WHERE username = '".$_POST['username']."'")or die(mysql_error());
 //Gives error if user dosen't exist
 $check2 = mysql_num_rows($check);
 if ($check2 == 0) {
 		echo 'That user does not exist in our database. <a href=registration.php>Register</a><br />';
 				}
 while($info = mysql_fetch_array($check)) 	
 {
 $_POST['pass'] = stripslashes($_POST['pass']);
 	$info['password'] = stripslashes($info['password']);
 	$_POST['pass'] = md5($_POST['pass']);
 //gives error if the password is wrong
 	if ($_POST['pass'] != $info['password']) {
 		echo 'Incorrect password <a href='.$_SERVER['PHP_SELF'].'>Try again.</a><br />';
 	}
 else 
 { 
 
 // if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(logincookie, $_POST['username'], $hour); 
setcookie(passcookie, $_POST['pass'], $hour);	 
 // Set session variables 
   $_SESSION['username'] = $_POST['username'];
   $_SESSION['pass'] = $_POST['pass'];
   //$_SESSION['lname'] = $_POST['lname'];
   //$_SESSION['email'] = $_POST['email'];
   //$_SESSION['phone'] = $_POST['phone'];
//then redirect them to the overview area 
//header("Location: login/overview.php"); 
//echo 'Welcome '.$info['bizname'].'!';
//When You Login You See This
echo 'Welcome '.$info['bizname'].'! <a href="login/overview.php">Your Dashboard</a> '; 
 } 
} 
} 
else 
{	 
 
 // if they are not logged in 
 ?>
      </div>
        <br />
        <div  align="right"  id="myDetails" style="background-color:#FFF;">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            &nbsp;
            <input name="username" type="text" size="10" />
            &nbsp;&nbsp;
            <input name="pass" type="password" size="10" />
            <input type="submit" name="submitL" id="Go" value="Login" />
            <div style="font-size:12px"> New Seller? <a style="background-color:#000; color: #FFF;" href="registration.php">Click here to Register</a>&nbsp;<br />
              <a href="login/overview.php">My Rigs/Equipment Dashboard</a></div>
          </form>
          <?php 
 } 
 
 ?>
        </div></td>
      <td><img src="images/spacer.gif" width="1" height="2" alt=""></td>
    </tr>
    <tr>
      <td colspan="13" rowspan="3"><a href="rigsalesaustralia.com"> <img src="images/bigLogoHome.jpg" width="612" height="107" border="0" alt="Rig Sales Australia"></a></td>
      <td colspan="5" rowspan="3">&nbsp;</td>
      <td><img src="images/spacer.gif" width="1" height="53" alt=""></td>
    </tr>
    <tr>
      <td colspan="17"><img src="images/index_05.jpg" width="273" height="23" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="23" alt=""></td>
    </tr>
    <tr>
      <td><img src="images/index_06.jpg" width="8" height="31" alt=""></td>
      <td colspan="4"><a href="buy.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image139','','images/buyOVER.jpg',1)"><img src="images/buy.jpg" name="Image139" width="38" height="31" border="0"></a></td>
      <td><img src="images/index_08.jpg" width="19" height="31" alt=""></td>
      <td colspan="3"><a href="registration.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image140','','images/sellOVER.jpg',1)"><img src="images/sell.jpg" name="Image140" width="49" height="31" border="0"></a></td>
      <td><img src="images/index_10.jpg" width="20" height="31" alt=""></td>
      <td colspan="2"><a href="auction/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image141','','images/auctionOVER.jpg',1)"><img src="images/auction.jpg" name="Image141" width="84" height="31" border="0"></a></td>
      <td colspan="5"><img src="images/index_12.jpg" width="55" height="31" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="31" alt=""></td>
    </tr>
    <tr>
      <td colspan="35"><img src="images/index_13.jpg" width="1224" height="21" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr>
      <td colspan="10"><img src="images/middlePic_topleft.jpg" width="454" height="178" alt=""></td>
      <td colspan="25" rowspan="9" background="images/middlePic_Center.jpg" style="background-repeat:no-repeat;" ><a href='registration.php'><?php include('slideRun.php');?></a></td>
      <td><img src="images/spacer.gif" width="1" height="178" alt=""></td>
    </tr>
    <tr>
      <td colspan="10"><img src="images/middlePic_01_02.jpg" width="454" height="26" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="26" alt=""></td>
    </tr>
    <tr>
      <td colspan="10"><img src="images/index_17.jpg" width="454" height="14" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="14" alt=""></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="8"><img src="images/index_18.jpg" width="92" height="276" alt=""></td>
      <td colspan="5"><a href="buy.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image142','','images/BUYmidAD_OVER.jpg',1)"><img src="images/BUYmidAD.jpg" name="Image142" width="310" height="48" border="0"></a></td>
      <td rowspan="7"><img src="images/index_20.jpg" width="52" height="275" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="48" alt=""></td>
    </tr>
    <tr>
      <td colspan="5"><img src="images/index_21.jpg" width="310" height="16" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="16" alt=""></td>
    </tr>
    <tr>
      <td colspan="5"><a href="registration.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image143','','images/SELLmidAD_OVER.jpg',1)"><img src="images/SELLmidAD.jpg" name="Image143" width="310" height="31" border="0"></a></td>
      <td><img src="images/spacer.gif" width="1" height="31" alt=""></td>
    </tr>
    <tr>
      <td colspan="5"><img src="images/index_23.jpg" width="310" height="31" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="31" alt=""></td>
    </tr>
    <tr>
      <td colspan="5"><a href="auction/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image144','','images/AUCTIONmidAD_OVER.jpg',1)"><img src="images/AUCTIONmidAD.jpg" name="Image144" width="310" height="24" border="0"></a></td>
      <td><img src="images/spacer.gif" width="1" height="24" alt=""></td>
    </tr>
    <tr>
      <td colspan="5" rowspan="2"><img src="images/index_25.jpg" width="310" height="125" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="104" alt=""></td>
    </tr>
    <tr>
      <td colspan="25"><img src="images/index_26.jpg" width="770" height="21" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="21" alt=""></td>
    </tr>
    <tr>
      <td colspan="4"><img src="images/index_27.jpg" width="281" height="1" alt=""></td>
      <td colspan="6" rowspan="3"><a href="inventory/inventory.php?page=blastholedrills" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image146','','images/blastholeOVER.jpg',1)"><img src="images/blasthole.jpg" name="Image146" width="250" height="117" border="0"></a></td>
      <td rowspan="6"><img src="images/index_29.jpg" alt="" width="60" height="148" border="0"></td>
      <td colspan="3" rowspan="5"><a href="inventory/inventory.php?page=surplus" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image147','','images/surplusOVER.jpg',1)"><img src="images/surplus.jpg" name="Image147" width="273" height="135" border="0"></a></td>
      <td colspan="17" rowspan="2"><img src="images/index_31.jpg" width="273" height="5" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="1" alt=""></td>
    </tr>
    <tr>
      <td colspan="3" rowspan="5"><img src="images/index_32.jpg" width="40" height="147" alt=""></td>
      <td colspan="4" rowspan="2"><a href="inventory/inventory.php?page=surfacedrills" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image145','','images/sdOver.jpg',1)"><img src="images/sd.jpg" name="Image145" width="275" height="116" border="0"></a></td>
      <td rowspan="5"><img src="images/index_34.jpg" width="58" height="147" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="4" alt=""></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="4"><img src="images/index_35.jpg" alt="" width="37" height="143" border="0"></td>
      <td colspan="10" rowspan="2"><a href="inventory/inventory.php?page=newprodsnservices" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image148','','images/newProductOVER.jpg',1)"><img src="images/newProduct.jpg" name="Image148" width="209" height="126" border="0"></a></td>
      <td colspan="3" rowspan="5"><img src="images/index_37.jpg" width="40" height="157" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="112" alt=""></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="3"><img src="images/index_38.jpg" width="275" height="31" alt=""></td>
      <td colspan="6" rowspan="3"><img src="images/index_39.jpg" alt="" width="250" height="31" border="0"></td>
      <td><img src="images/spacer.gif" width="1" height="13" alt=""></td>
    </tr>
    <tr>
      <td colspan="10" rowspan="3"><img src="images/index_40.jpg" width="200" height="32" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="5" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/index_41.jpg" width="268" height="13" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="13" alt=""></td>
    </tr>
    <tr>
      <td rowspan="14"><img src="images/index_42.jpg" width="20" height="813" alt=""></td>
      <td width="956" height="670" colspan="19" rowspan="7"><img src="images/images/premium6.jpg" width="956" height="670"></td>
      <td colspan="2"><img src="images/index_44.jpg" width="9" height="14" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="14" alt=""></td>
    </tr>
    <tr>
      <td rowspan="13"><img src="images/index_45.jpg" width="5" height="799" alt=""></td>
      <td colspan="12"><a href="advertise.php?sidead=1"><img src="images/sideADspace.jpg" alt="" width="208" height="485" border="0"></a></td>
      <td colspan="2" rowspan="8"><img src="images/index_47.jpg" width="35" height="699" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="485" alt=""></td>
    </tr>
    <tr>
      <td colspan="12"><img src="images/index_48.jpg" width="208" height="23" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="23" alt=""></td>
    </tr>
    <tr>
      <td colspan="5" rowspan="2"><img src="images/index_49.jpg" width="71" height="66" alt=""></td>
      <td colspan="3"><a href="advertise.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image149','','images/advertiseOVER.jpg',1)"><img src="images/advertise.jpg" name="Image149" width="72" height="13" border="0"></a></td>
      <td colspan="4" rowspan="2"><img src="images/index_51.jpg" width="65" height="66" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="13" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/index_52.jpg" width="72" height="53" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="53" alt=""></td>
    </tr>
    <tr>
      <td colspan="3" rowspan="9"><img src="images/index_53.jpg" width="35" height="225" alt=""></td>
      <td colspan="7"><a href="request.php?type=new" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image150','','images/makeArequestOVER.jpg',1)"><img src="images/makeArequestREGULAR.jpg" name="Image150" width="154" height="56" border="0"></a></td>
      <td colspan="2" rowspan="4"><img src="images/index_55.jpg" width="19" height="125" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="56" alt=""></td>
    </tr>
    <tr>
      <td colspan="7" rowspan="3"><img src="images/index_56.jpg" width="154" height="69" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="26" alt=""></td>
    </tr>
    <tr>
      <td colspan="19"><img src="images/index_57.jpg" width="956" height="14" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="14" alt=""></td>
    </tr>
    <tr>
      <td rowspan="6"><img src="images/index_58.jpg" width="11" height="129" alt=""></td>
      <td colspan="3" rowspan="4"><a href="advertise.php?footerad=1"> <img src="images/footerAD1.jpg" width="223" height="115" border="0" alt=""></a></td>
      <td rowspan="4"><img src="images/index_60.jpg" width="8" height="115" alt=""></td>
      <td colspan="5" rowspan="4"><a href="advertise.php?footerad=2"> <img src="images/footerAD2.jpg" width="223" height="115" border="0" alt=""></a></td>
      <td rowspan="4"><img src="images/index_62.jpg" width="11" height="115" alt=""></td>
      <td colspan="4" rowspan="4"><a href="advertise.php?footerad=3"> <img src="images/footerAD3.jpg" width="222" height="115" border="0" alt=""></a></td>
      <td rowspan="4"><img src="images/index_64.jpg" width="10" height="115" alt=""></td>
      <td rowspan="4"><a href="advertise.php?footerad=4"> <img src="images/footerAD4.jpg" width="223" height="115" border="0" alt=""></a></td>
      <td colspan="2" rowspan="6"><img src="images/index_66.jpg" width="25" height="129" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="29" alt=""></td>
    </tr>
    <tr>
      <td rowspan="5"><img src="images/index_67.jpg" width="6" height="100" alt=""></td>
      <td width="189" height="29" colspan="9"><a href="mailto:rigsale1@bigpond.net.au">rigsale1@bigpond.net.au</a></td>
      <td rowspan="5"><img src="images/index_69.jpg" width="13" height="100" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="29" alt=""></td>
    </tr>
    <tr>
      <td colspan="9"><img src="images/index_70.jpg" width="189" height="28" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="28" alt=""></td>
    </tr>
    <tr>
      <td width="189" height="35" colspan="9" rowspan="2"><b>041 3907649</b></td>
      <td><img src="images/spacer.gif" width="1" height="29" alt=""></td>
    </tr>
    <tr>
      <td colspan="16" rowspan="2"><img src="images/index_72.jpg" width="920" height="14" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="6" alt=""></td>
    </tr>
    <tr>
      <td colspan="9"><img src="images/index_73.jpg" width="189" height="8" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="8" alt=""></td>
    </tr>
    <tr>
      <td><img src="images/spacer.gif" width="20" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="9" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="52" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="162" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="8" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="53" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="58" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="29" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="52" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="31" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="116" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="11" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="60" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="35" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="10" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="223" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="8" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="17" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="5" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="4" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="12" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="19" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="6" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="30" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="13" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="20" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="39" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="45" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="1" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="15" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="4" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="22" height="1" alt=""></td>
      <td><img src="images/spacer.gif" width="13" height="1" alt=""></td>
      <td></td>
    </tr>
  </table>
</div>
<!-- End Save for Web Slices -->
</body>
</html>
<?php 
ob_end_flush();
?>