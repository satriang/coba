<!DOCTYPE html>
<html> 
<head>
<title>Tutorial Membuat Verifikasi 2 Password | ZRACODER13 </title>
<meta charset="UTF-8">
<meta name="viewports" content="width=device-width intial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css"> 
</head>

<body class="body">
 <div class="content">
  <div class="header">
   <p>FORM DAFTAR</p>
   <a href="#">ZRACODER13</a>
  </div>
   <div class="body-form">
    <form action="bla.php" method="post" name="validasi_form" onsubmit="return validasi_input(this)">
     <table>
      <tr>
       <td width="200">Username</td>
       <td><input type="text" id="username" name="username"/></td>
      </tr>
      <tr>
       <td>Email</td>
       <td><input type="text" name="email" id="email"></td>
      </tr>
      <tr>
       <td>Password</td>
       <td><input type="Password"  onchange="checkPass()" id="password_1" name="password_1"></td>
      </tr>
      <tr>
       <td>Confirm Password</td>
       <td><input type="Password"  onchange="checkPass()"  id="password_2" name="password_2">
        <span id="pesan" class="pesan-confirm"></span>
       </td>
      </tr>
     </table>
      <div class="footer-table">
       <table>
        <input type="submit" name="daftar_process" value="DAFTAR"/>
       </table>
      </div>
    </form>
   </div>
 </div>

</body>
<script type="text/javascript" src="validasi.js"></script>
</html>