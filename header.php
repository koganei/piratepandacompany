<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Archanges & Protection</title>

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<script language="javascript">

function show(element) {
	document.getElementById(element).style.visibility='visible';
}

function hide(element) {
	document.getElementById(element).style.visibility='hidden';
}

function resize_left_menu() {
	if (document.getElementById('left_menu').offsetHeight >= 1000 && document.getElementById('content').offsetHeight < 1100) {
		document.getElementById('filler_bg_div').style.height = "200px";
		document.getElementById('footer_bg').style.marginTop = "200px";
	}
	else if (document.getElementById('left_menu').offsetHeight < 1100 && document.getElementById('content').offsetHeight < 1050) {
			document.getElementById('filler_bg_div').style.height = "0px";
			document.getElementById('footer_bg').style.marginTop = "0px";
	}
}

function wiccan_info_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_wiccan_info").style.visibility == "hidden") {
		document.getElementById("links_wiccan_info").style.visibility = "visible";
		document.getElementById("links_wiccan_info").style.position = "static";
	}
	else {
		document.getElementById("links_wiccan_info").style.visibility = "hidden";
		document.getElementById("links_wiccan_info").style.position = "absolute";
	}
}

function angelology_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_angelology").style.visibility == "hidden") {
		document.getElementById("links_angelology").style.position = "static";
		document.getElementById("links_angelology").style.visibility = "visible";
	}
	else {
		document.getElementById("links_angelology").style.position = "absolute";
		document.getElementById("links_angelology").style.visibility = "hidden";
	}
}

function divination_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_divination").style.visibility == "hidden") {
		document.getElementById("links_divination").style.position = "static";
		document.getElementById("links_divination").style.visibility = "visible";
	}
	else {
		document.getElementById("links_divination").style.position = "absolute";
		document.getElementById("links_divination").style.visibility = "hidden";
	}
}

function psychic_abilities_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_psychic_abilities").style.visibility == "hidden") {
		document.getElementById("links_psychic_abilities").style.position = "static";
		document.getElementById("links_psychic_abilities").style.visibility = "visible";
	}
	else {
		document.getElementById("links_psychic_abilities").style.position = "absolute";
		document.getElementById("links_psychic_abilities").style.visibility = "hidden";
	}
}

function spirituality_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_spirituality").style.visibility == "hidden") {
		document.getElementById("links_spirituality").style.position = "static";
		document.getElementById("links_spirituality").style.visibility = "visible";
	}
	else {
		document.getElementById("links_spirituality").style.position = "absolute";
		document.getElementById("links_spirituality").style.visibility = "hidden";
	}
}

function witchcraft_menu(current) {
	if (current != "yes") { resize_left_menu(); }
	if (document.getElementById("links_witchcraft").style.visibility == "hidden") {
		document.getElementById("links_witchcraft").style.position = "static";
		document.getElementById("links_witchcraft").style.visibility = "visible";
	}
	else {
		document.getElementById("links_witchcraft").style.position = "absolute";
		document.getElementById("links_witchcraft").style.visibility = "hidden";
	}
}

function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function send_comment() {
		name = document.getElementById("name").value;
		email = document.getElementById("email").value;
		comment = document.getElementById("comment").value;
		captcha_code = document.getElementById("captcha_code").value;
		http.open('get', 'scripts/send_comment.php?name='+name+'&email='+email+'&comment='+comment+'&captcha_code='+captcha_code);
		http.onreadystatechange = handle_send_comment;
		http.send(null);
}

function handle_send_comment() {
	if(http.readyState == 4){
        var response = http.responseText;
        var update = new Array();

        if(response.indexOf('|' != -1)) {
            update = response.split('|');
			document.getElementById('div_send_comment_confirm').innerHTML = update[0];
			document.getElementById('div_send_comment_confirm').style.visibility = "visible";
			if (update[1] != "retry") { document.getElementById('send_comment_form').reset(); }
        }
    }
}

function register() {
		first_name = document.getElementById("first_name").value;
		last_name = document.getElementById("last_name").value;
		street = document.getElementById("street").value;
		country = document.getElementById("country").value;
		city = document.getElementById("city").value;
		postal_code = document.getElementById("postal_code").value;
		phone = document.getElementById("phone").value;
		username = document.getElementById("username").value;
		password = document.getElementById("password").value;
		confirm_password = document.getElementById("confirm_password").value;
		email = document.getElementById("email").value;
		confirm_email = document.getElementById("confirm_email").value;
		captcha_code = document.getElementById("captcha_code").value;
		http.open('get', 'scripts/register.php?first_name='+first_name+'&last_name='+last_name+'&street='+street+'&country='+country+'&city='+city+'&postal_code='+postal_code+'&phone='+phone+'&username='+username+'&password='+password+'&confirm_password='+confirm_password+'&email='+email+'&confirm_email='+confirm_email+'&captcha_code='+captcha_code);
		http.onreadystatechange = handle_register;
		http.send(null);
}

function handle_register() {
	if(http.readyState == 4){
        var response = http.responseText;
        var update = new Array();

        if(response.indexOf('|' != -1)) {
            update = response.split('|');
			document.getElementById('div_register_confirm').innerHTML = update[0];
			document.getElementById('div_register_confirm').style.visibility = "visible";
			if (update[1] != "retry") { document.getElementById('register_form').reset(); }
        }
    }
}

</script>

</head>

<body>
<center>

<div id="top_menu">
	
	<img id="home_over" border="0" src="images/home_over.png" width="73" height="28" style="position: absolute; left: -10px; top: 20px; visibility: hidden;" />
	<a href="index.php" onMouseOver=show("home_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "index.php"); if ($pos === false) { ?> onMouseOut=hide("home_over"); <? } ?>><img border=0 src="images/home.png" width="48" height="32"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	<img border=0 src="images/link_separator.png" width="4" height="34" style="margin-top: -20px">
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
	<img id="about_us_over" border="0" src="images/about_us_over.png" width="108" height="29" style="position: absolute; left: 60px; top: 20px; visibility: hidden;" />
	<a href="about_us.php" onMouseOver=show("about_us_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "about_us.php"); if ($pos === false) { ?> onMouseOut=hide("about_us_over"); <? } ?>><img border=0 src="images/about_us.png" width="92" height="29"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	<img border=0 src="images/link_separator.png" style="margin-top: -20px">
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
	<img id="store_over" border="0" src="images/store_over.png" width="67" height="32" style="position: absolute; left: 173px; top: 20px; visibility: hidden;" />
	<a href="store.php" onMouseOver=show("store_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "store.php"); if ($pos === false) { ?> onMouseOut=hide("store_over"); <? } ?>><img border=0 src="images/store.png" width="53" height="27"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	<img border=0 src="images/link_separator.png" style="margin-top: -20px">
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
	<img id="services_over" border="0" src="images/services_over.png" width="97" height="33" style="position: absolute; left: 243px; top: 20px; visibility: hidden;" />
	<a href="services.php" onMouseOver=show("services_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "services.php"); if ($pos === false) { ?> onMouseOut=hide("services_over"); <? } ?>><img border=0 src="images/services.png" width="77" height="27"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	<img border=0 src="images/link_separator.png" style="margin-top: -20px">
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
	<img id="contact_us_over" border="0" src="images/contact_us_over.png" width="111" height="31" style="position: absolute; left: 344px; top: 20px; visibility: hidden;" />
	<a href="contact_us.php" onMouseOver=show("contact_us_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "contact_us.php"); if ($pos === false) { ?> onMouseOut=hide("contact_us_over"); <? } ?>><img border=0 src="images/contact_us.png" width="98" height="29"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	<img border=0 src="images/link_separator.png" style="margin-top: -20px">
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
	<img id="register_over" border="0" src="images/register_over.png" width="96" height="28" style="position: absolute; left: 457px; top: 20px; visibility: hidden;" />
	<a href="signin.php" onMouseOver=show("register_over"); <? $pos = strpos($_SERVER["REQUEST_URI"], "signin.php"); if ($pos === false) { ?> onMouseOut=hide("register_over"); <? } ?>><img border=0 src="images/register.png" width="75" height="27"></a>
	<img border=0 src="images/pixel_blank.png" width="0" height="0">
	
</div>

<div id="left_menu">

	<a href="javascript:wiccan_info_menu()"><img border=0 src="images/wiccan_info.png" width="267" height="53"></a>
	<div style="position: absolute; top: 25px; left: 10px;"><img border="0" src="images/wiccan_star.png" width="43" height="48" /></div>
	
	<div id="links_wiccan_info" style="visibility: hidden;">
		<img id="wicca_info_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_is_wicca" href="what_is_wicca.php" onMouseOver=show("wicca_info_star_1"); onMouseOut=hide("wicca_info_star_1");>What is Wicca?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="wicca_vs_witchcraft_vs_paganism" href="wicca_vs_witchcraft_vs_paganism.php" onMouseOver=show("wicca_info_star_2"); onMouseOut=hide("wicca_info_star_2");>Wicca Vs Witchcraft Vs Paganism</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="branches_of_wicca" href="branches_of_wicca.php" onMouseOver=show("wicca_info_star_3"); onMouseOut=hide("wicca_info_star_3");>Branches of Wicca</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="correspondences" href="correspondences.php" onMouseOver=show("wicca_info_star_4"); onMouseOut=hide("wicca_info_star_4");>Correspondences</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="wheel_of_the_year" href="wheel_of_the_year.php" onMouseOver=show("wicca_info_star_5"); onMouseOut=hide("wicca_info_star_5");>Wheel of the Year</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="wiccan_rede" href="wiccan_rede.php" onMouseOver=show("wicca_info_star_6"); onMouseOut=hide("wicca_info_star_6");>Wiccan Rede</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="wicca_info_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="the_13_principles" href="the_13_principles.php" onMouseOver=show("wicca_info_star_7"); onMouseOut=hide("wicca_info_star_7");>The 13 Principles</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
	
	<a href="javascript:angelology_menu()"><img border=0 src="images/angelology.png" width="267" height="53"></a>
	<div id="links_angelology" style="visibility: hidden;">
		<img id="angelology_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_is_angelology" href="what_is_angelology.php" onMouseOver=show("angelology_star_1"); onMouseOut=hide("angelology_star_1");>What is Angelology?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_are_angels" href="what_are_angels.php" onMouseOver=show("angelology_star_2"); onMouseOut=hide("angelology_star_2");>What are Angels?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_are_guardian_angels" href="what_are_guardian_angels.php" onMouseOver=show("angelology_star_3"); onMouseOut=hide("angelology_star_3");>What are Guardian Angels?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="the_angel_hierarchy" href="the_angel_hierarchy.php" onMouseOver=show("angelology_star_4"); onMouseOut=hide("angelology_star_4");>The Angel Hierarchy</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="the_72_angels" href="the_72_angels.php" onMouseOver=show("angelology_star_5"); onMouseOut=hide("angelology_star_5");>The 72 Angels</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="angel_correspondences" href="angel_correspondences.php" onMouseOver=show("angelology_star_6"); onMouseOut=hide("angelology_star_6");>Angel Correspondences</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="angelology_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="prayers_invocations_and_rituals" href="prayers_invocations_and_rituals.php" onMouseOver=show("angelology_star_7"); onMouseOut=hide("angelology_star_7");>Prayers, Invocations and Rituals</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
	
	<a href="javascript:divination_menu()"><img border=0 src="images/divination.png" width="267" height="53"></a>
	<div id="links_divination" style="visibility: hidden;">
		<img id="divination_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_is_divination" href="what_is_divination.php" onMouseOver=show("divination_star_1"); onMouseOut=hide("divination_star_1");>What is Divination?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="types_of_divination" href="types_of_divination.php" onMouseOver=show("divination_star_2"); onMouseOut=hide("divination_star_2");>Types of divination</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="methods_of_divination" href="methods_of_divination.php" onMouseOver=show("divination_star_3"); onMouseOut=hide("divination_star_3");>Methods of divination</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="divination_in_ancient_vs_modern_time" href="divination_in_ancient_vs_modern_time.php" onMouseOver=show("divination_star_4"); onMouseOut=hide("divination_star_4");>Divination in Ancient vs Modern time</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="divination_in_religious_texts" href="divination_in_religious_texts.php" onMouseOver=show("divination_star_5"); onMouseOut=hide("divination_star_5");>Divination in Religious texts</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="divination_around_the_world" href="divination_around_the_world.php" onMouseOver=show("divination_star_6"); onMouseOut=hide("divination_star_6");>Divination around the World</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="divination_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="learn_divination" href="learn_divination.php" onMouseOver=show("divination_star_7"); onMouseOut=hide("divination_star_7");>Learn Divination</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
	
	<a href="javascript:psychic_abilities_menu()"><img border=0 src="images/psychic_abilities.png" width="267" height="53"></a>
	<div id="links_psychic_abilities" style="visibility: hidden;">
		<img id="psychic_abilities_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="what_is_a_psychic_ability" href="what_is_a_psychic_ability.php" onMouseOver=show("psychic_abilities_star_1"); onMouseOut=hide("psychic_abilities_star_1");>What is a Psychic ability?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="list_of_psychic_abilities" href="list_of_psychic_abilities.php" onMouseOver=show("psychic_abilities_star_2"); onMouseOut=hide("psychic_abilities_star_2");>List of psychic abilities</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="parapsychology" href="parapsychology.php" onMouseOver=show("psychic_abilities_star_3"); onMouseOut=hide("psychic_abilities_star_3");>Parapsychology</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="stages_of_psychic_development" href="stages_of_psychic_development.php" onMouseOver=show("psychic_abilities_star_4"); onMouseOut=hide("psychic_abilities_star_4");>Stages of Psychic Development</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="learn_psychic_abilities" href="learn_psychic_abilities.php" onMouseOver=show("psychic_abilities_star_5"); onMouseOut=hide("psychic_abilities_star_5");>Learn Psychic abilities</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="differences_between" href="differences_between.php" onMouseOver=show("psychic_abilities_star_6"); onMouseOut=hide("psychic_abilities_star_6");>Differences between...</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="psychic_abilities_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="psychic_abilities_more" href="psychic_abilities_more.php" onMouseOver=show("psychic_abilities_star_7"); onMouseOut=hide("psychic_abilities_star_7");>More</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
	
	<a href="javascript:spirituality_menu()"><img border=0 src="images/spirituality.png" width="267" height="53"></a>
	<div id="links_spirituality" style="visibility: hidden;">
		<img id="spirituality_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="definition_of_spirituality" href="definition_of_spirituality.php" onMouseOver=show("spirituality_star_1"); onMouseOut=hide("spirituality_star_1");>Definition of Spirituality</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="spirituality_vs_spiritualism" href="spirituality_vs_spiritualism.php" onMouseOver=show("spirituality_star_2"); onMouseOut=hide("spirituality_star_2");>Spirituality vs Spiritualism</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="spiritual_beliefs" href="spiritual_beliefs.php" onMouseOver=show("spirituality_star_3"); onMouseOut=hide("spirituality_star_3");>Spiritual Beliefs</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="difference_between_religion_and_spirituality" href="difference_between_religion_and_spirituality.php" onMouseOver=show("spirituality_star_4"); onMouseOut=hide("spirituality_star_4");>Differences between Religion and Spirituality</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="meditation_inner_peace_and_enlightenment" href="meditation_inner_peace_and_enlightenment.php" onMouseOver=show("spirituality_star_5"); onMouseOut=hide("spirituality_star_5");>Meditation, Inner Peace and Enlightenment</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="spiritual_paths" href="spiritual_paths.php" onMouseOver=show("spirituality_star_6"); onMouseOut=hide("spirituality_star_6");>Spiritual Paths</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="spirituality_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="useful_tools" href="useful_tools.php" onMouseOver=show("spirituality_star_7"); onMouseOut=hide("spirituality_star_7");>Useful tools</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
	
	<a href="javascript:witchcraft_menu()"><img border=0 src="images/witchcraft.png" width="267" height="53"></a>
	<div id="links_witchcraft" style="visibility: hidden;">
		<img id="witchcraft_star_1" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="definition_of_witchcraft" href="definition_of_witchcraft.php" onMouseOver=show("witchcraft_star_1"); onMouseOut=hide("witchcraft_star_1");>Definition of Witchcraft</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_2" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="witchcraft_history" href="witchcraft_history.php" onMouseOver=show("witchcraft_star_2"); onMouseOut=hide("witchcraft_star_2");>Witchcraft History</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_3" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="how_to_become_a_witch" href="how_to_become_a_witch.php" onMouseOver=show("witchcraft_star_3"); onMouseOut=hide("witchcraft_star_3");>How to become a Witch?</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_4" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="the_basics" href="the_basics.php" onMouseOver=show("witchcraft_star_4"); onMouseOut=hide("witchcraft_star_4");>The Basics</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_5" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="laws_and_pillars" href="laws_and_pillars.php" onMouseOver=show("witchcraft_star_5"); onMouseOut=hide("witchcraft_star_5");>Laws and Pillars</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_6" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="different_type_of_magick" href="different_type_of_magick.php" onMouseOver=show("witchcraft_star_6"); onMouseOut=hide("witchcraft_star_6");>Different type of Magick</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" /><br />
		
		<img id="witchcraft_star_7" border="0" src="images/star_left_links.png" width="19" height="20" style="position: absolute; left: -5px; margin-top: -3px; visibility: hidden;" />
		<a id="glossary_of_witchcraft_terms" href="glossary_of_witchcraft_terms.php" onMouseOver=show("witchcraft_star_7"); onMouseOut=hide("witchcraft_star_7");>Glossary of Witchcraft terms</a>
		<br /><img src="images/pixel_blank.png" width="0" height="10" />
	</div>
</div>

<div id="body_bg">

	<div id="content">