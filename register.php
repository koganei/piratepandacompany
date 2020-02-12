<? include("header.php"); ?>

<script language="javascript">
document.getElementById("register_over").style.visibility = "visible";
</script>

<img src="images/pixel_blank.png" width="35" height="0" />
<img src="images/title_register.png" />

<br /><br /><br />

<center><div id="div_register_confirm" style="visibility: hidden; margin-bottom: 10px;"></div></center>

<form id="register_form">

<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td><span class="style1">F</span>irst Name</td>
		<td><input id="first_name" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">L</span>ast Name</td>
		<td><input id="last_name" type="text"/></td>
	</tr>

	<tr>
		<td><span class="style1">S</span>treet Address</td>
		<td><input id="street" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">C</span>ountry</td>
		<td><input id="country" type="text"/></td>
	</tr>

	<tr>
		<td><span class="style1">C</span>ity</td>
		<td><input id="city" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">P</span>ostal Code</td>
		<td><input id="postal_code" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">P</span>hone Number</td>
		<td><input id="phone" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">U</span>sername</td>
		<td><input id="username" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">P</span>assword</td>
		<td><input id="password" type="password"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">C</span>onfirm Password</td>
		<td><input id="confirm_password" type="password"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">E</span>mail</td>
		<td><input id="email" type="text"/></td>
	</tr>
	
	<tr>
		<td><span class="style1">C</span>onfirm Email</td>
		<td><input id="confirm_email" type="text"/></td>
	</tr>
	
	<tr>
		<td></td>
		<td valign="top">
		<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" align="left"/>
		&nbsp;&nbsp;<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Change Image ]</a>
		<br /><br /><br />
		<input type="text" id="captcha_code" name="captcha_code" maxlength="6" />
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td><input type="button" value="Register" onclick="register()" /></td>
	</tr>

</table>

</form>

<? include("footer.php"); ?>