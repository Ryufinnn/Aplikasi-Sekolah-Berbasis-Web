
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
<style type="text/css">
<!--
.menu211 {border-style: solid;
border-width: 0px;
border-radius: 10px; /*Kode pembuat lengkungan sudut*/
background-color: #ffffff;
margin: 0 0 0 0;
}
.style1 {color: #FFFFFF}
.menu2111 {border-style: solid;
border-width: 0px;
border-radius: 10px; /*Kode pembuat lengkungan sudut*/
background-color: #ffffff;
margin: 0 0 0 0;
}
-->
</style>
<div id="content">
<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Profil Kantor </div>
				<ul id="home">
					
					<li class="b1"><a class="icon report" href="index.php?halaman=visimisi"><img src="images/list_icon1.jpg" width="13" height="13" />Visi dan Misi </a></li>
					<li class="b1"><a class="icon report" href="index.php?halaman=struktur"><img src="images/list_icon1.jpg" width="13" height="13" />Struktur Organisasi </a></li>
					<li class="b1"><a class="icon report" href="index.php?halaman=contact"><img src="images/list_icon1.jpg" width="13" height="13" />Hubungi Kami  </a></li>
				</ul>
			</div>
			
            <div class="box">
              <div class="h_title"><a href="?page=login">&#8250; <span class="style1">Login Admin </span></div>
  </div>
            </div>

