<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">
<?php include 'includes/navbar.php'; ?>
<div class="content-wrapper" style="background:#fff;">
<br><center><br>
<p><b><h1>Daftar Menjadi Mitra</h1></b></p>
<form id="contact" action="registrar.php" method="post">
            <?php if(!empty($notify)){ ?>
                <p class="notify <?php echo !empty($notifyClass)?$notifyClass:''; ?>"><?php echo $notify; ?></p>
            <?php } ?>
            
            <fieldset>
                <input placeholder="Nama" type="text" name="name" tabindex="1" required autofocus>
            </fieldset>
			
            <fieldset>
                <input placeholder="Email" type="text" name="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input placeholder="Password" type="text" name="password" tabindex="2" required>
            </fieldset>
            
            <fieldset>
                <button name="submit" onclick="myFunction()" type="submit" id="contact-submit" data-submit="...">Daftar</button>
            </fieldset>
			<p id="demo" style="color:red;"></p>
        </form>
</center>
<p><b><h2>Petunjuk Pendaftaran</h1></h2></p>

<ul>
<li><h3>Silahkan Isi formulir pendaftaran diatas</h3></li>
<li><h3>Kemudian lakukan pembayaran administrasi mitra senilai Rp 50.000 ke B.C.A : 8545275984 a/n Mohammad Rafii Burhanuddin</h3></li>
<li><h3>Kirim bukti transfer dan data diri ke Whatsapp:081215702727 <a href="https://wa.me/6281215702727" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-phone-square"></i>&nbsp;&nbsp;Kirim Bukti Transfer Via Whatsapp </a> dengan contoh format seperti dibawah ini</h3></li>
<img src="images/cdn/buktitf.png" style="margin-top:10px;" width="307px" height="477px" title="format kirim bukti transfer" alt="format kirim bukti transfer">
<li><h3>pasti kan nama yg anda daftarkan di formulir diatas sama dengan nama pentransfer, untuk menghindari kesalahan data</h3></li>
<li><h3>Setelah semua terpenuhi akun anda akan aktif dalam 1x24jam dan mendapatkan pemberitauan via email</h3></li>
</ul>
<br>
</div>

</div>

<body>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Trima Kasih telah mendaftar, kami akan mengaktifkan akun anda setelah pembayaran lunas";
}
</script>
<style>
#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}
 
#contact {
 
  padding: 20px;
  
  width:380px;

}
@media only screen and (max-width: 600px) {
	#contact{
		width:100%;
		}
}
 
#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}
 
#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}
 
fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}
 
#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}
 
#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}
 
#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}
 
#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #189cdc;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}
 
#contact button[type="submit"]:hover {
  background: #1988be;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}
 
#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}
 
.copyright {
  text-align: center;
}
 
#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}
 
::-webkit-input-placeholder {
  color: #888;
}
 
:-moz-placeholder {
  color: #888;
}
 
::-moz-placeholder {
  color: #888;
}
 
:-ms-input-placeholder {
  color: #888;
}
 
.notify {
    padding: 10px;
    background-color: #FFD76E;
    margin-bottom: 10px;
    border-radius: 3px;
    font-weight: bold;
}
</style>
<?php include 'includes/scripts.php'; ?>
</html>