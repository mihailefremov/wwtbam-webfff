<?php if(!isset($_SESSION)) { session_start(); }?>
<?php 	

 if(isset($_SESSION) and isset($_SESSION["loginstatus_wwtbam-fff"]))	
 {
 	if (($_SESSION["loginstatus_wwtbam-fff"]=="")) #(getlastaction()<date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')))))			
 	{ 
 		header("location:loginform.php");
 	}
 } else if (isset($_REQUEST["LogOut"])) {
	 if (strtolower($_REQUEST["LogOut"]=="yes")) {
		 header("location:logout.php");
	 }	 
 }
 else 
 {
 	header("location:loginform.php");
 }
 
?>

<body style="background-color: #02192f; height: 95%;">
	<table align="center" style="font-size: 28px;margin-left:auto; margin-right: auto;font-family: sans-serif;">
		<tbody>
			<tr style="font-size: 4px">
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"></td>
				<td class="img" id="question" style="background-image:url(images/Question.png);background-size: 100% 100%;width: 950;height: 87px;color: white;text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
		</tbody>
	</table>
	<table align="center" style="font-size: 28px;margin-left:auto; margin-right: auto;font-family: sans-serif;">
		<tbody>
			<tr>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr style="height:10px">
				<td style="text-align: center;"></td>
				<td onclick="ClickedAnswer(1)" class="img" id="answer1" style="background-image:url(images/AC.png);background-size: 100% 100%; width:600px; height: 70px; color: white; text-align: left;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr style="height:10px">
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"></td>
				<td onclick="ClickedAnswer(2)" class="img" id="answer2" style="background-image:url(images/AC.png);background-size: 100% 100%; width:600px; height: 70px; color: white; text-align: left;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr style="height:10px">
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"></td>
				<td onclick="ClickedAnswer(3)" class="img" id="answer3" style="background-image:url(images/AC.png);background-size: 100% 100%; width:600px; height: 70px; color: white; text-align: left;" onclick="ClickedAnswer(3)"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr style="height:10px">
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"></td>
				<td onclick="ClickedAnswer(4)" class="img" id="answer4" style="background-image:url(images/AC.png);background-size: 100% 100%; width:600px; height: 70px; color: white; text-align: left;" onclick="ClickedAnswer(4)"></td>
			</tr>
		</tbody>
	</table>
	<table align="center" style="font-size: 28px;margin-left:auto; margin-right: auto;font-family: sans-serif;">
		<tbody>
			<tr style="height:10px">
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"></td>
				<td onclick="DeleteAnswer()" class="img" style="background-image:url(images/RedButton.png);background-size: 100% 100%; width:133px; height: 83px; color: white; text-align: center;" >DEL</td>
				<td style="text-align: center; width: 50px;"></td>
				<td id="givenAns1" class="img" style="background-image:url(images/BlueButton.png);background-size: 100% 100%; width:94px; height: 42px; color: white; text-align: center;"></td>
				<td id="givenAns2" class="img" style="background-image:url(images/BlueButton.png);background-size: 100% 100%; width:94px; height: 42px; color: white; text-align: center;"></td>
				<td id="givenAns3" class="img" style="background-image:url(images/BlueButton.png);background-size: 100% 100%; width:94px; height: 42px; color: white; text-align: center;"></td>
				<td id="givenAns4" class="img" style="background-image:url(images/BlueButton.png);background-size: 100% 100%; width:94px; height: 42px; color: white; text-align: center;"></td>
				<td style="text-align: center; width: 50px;"></td>
				<td onclick="ConfirmAnswer()" id="ConfirmButton" class="img" style="background-image:url(images/GreenButton.png);background-size: 100% 100%; width:133px; height: 83px; color: white; text-align: center;">OK</td>
				<td style="text-align: center;"></td>
				<!-- <td class="img" style="background-image:url(images/BlueButton.png); background-repeat: no-repeat; width: 94px; height: 42px; color: white; text-align: left; background-size: contain;" onclick="window.location='#1'">A1</td> -->
			</tr>
		</tbody>
	</table>
	<div hidden id="givenanswer" value=""></div>
	
	<script src="js/stopwatch.js"></script>
	<script src="js/helpers.js"></script>
	
	<script> 
	var parser = new DOMParser();
	var currentfffplaystate;
	var currentfffcontestantinfo;
	
	var stateid = "0";
	
	var contestantposition=0;
	var ipaddressfffplaystate="127.0.0.1";
	var ipprotocolfffplaystate="http";
		
	var isanswerconfirmed=-1;
		
	<?php
	
	if (isset($_REQUEST["ContestantPosition"])) {
		echo "contestantposition=" . $_REQUEST["ContestantPosition"] . ";";
	}	
	
	$xml = new DOMDocument('1.0', 'utf-8');
	$xml->load('config/config.xml');
	$nodes = $xml->getElementsByTagName('IPADDRESSFFFPLAYSTATE') ;
	if ($nodes->length > 0) {
		echo "ipaddressfffplaystate='" . $nodes->item(0)->nodeValue . "';";
	}
	
	echo "\r\n";
	echo "	";
	
	$nodes = $xml->getElementsByTagName('IPPROTOCOLFFFPLAYSTATE') ;
	if ($nodes->length > 0) {
		echo "ipprotocolfffplaystate='" . $nodes->item(0)->nodeValue . "';";
	}
	
	?>
	
	var playstateloc=ipprotocolfffplaystate+"://"+ipaddressfffplaystate+"";
		
	PopulatePlayState();
	PopulateContestantInfo();
	<!-- setTimeout(function() { -->
		<!-- PopulatePlayState(); -->
	<!-- }, 300); -->
	
	window.setInterval(function(){
		PopulatePlayState();
		PopulateContestantInfo();
	  /// call your function here
	}, 200);
	
	window.setInterval(function(){
		XmlParser();
	  /// call your function here
	}, 200);
	
	function ClickedAnswer(event) {
		if (isanswerconfirmed!==0) {return};
		
		var p=document.getElementById('givenanswer');
		if (p.innerHTML.includes(event)) {
			return;
		}
		document.getElementById('answer'+event).style.backgroundImage='url(images/FINAL.png)';
		p.innerHTML +=event;
		OnClickedAnswer();
	}
	
	function DeleteAnswer() {
		
		for (var i=1;
		i <=4;
		i++) {
			document.getElementById('answer'+i).style.backgroundImage='url(images/AC.png)';
		}
		var p=document.getElementById('givenanswer');
		p.innerHTML="";
		OnClickedAnswer();
		document.getElementById("ConfirmButton").innerHTML="OK";
	}
	
	function ConfirmAnswer() {
		if (isanswerconfirmed!==0) {return};
		
		var p=document.getElementById('givenanswer');
		//alert(p.innerHTML + "  " + displayStopwatch);
		 
		//p.innerHTML="";
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById("ConfirmButton").innerHTML="✔";
			}
		}
		;
		xhttp.open("GET", playstateloc+"/wwtbam-state/PostFFFPlayData.php?ContestantPosition="+contestantposition+"&GivenAnswer="+p.innerHTML+"&TimeOfAnswer="+displayStopwatch+"", true);	
		xhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
		xhttp.send();
		
		isanswerconfirmed=-1;
	}
	
	function OnClickedAnswer() {
		var p=document.getElementById('givenanswer');
		var arr=p.innerHTML.split('');
		var arleng=arr.length;
		if (arleng===0) {
			document.getElementById('givenAns1').innerHTML=' ';
			document.getElementById('givenAns2').innerHTML=' ';
			document.getElementById('givenAns3').innerHTML=' ';
			document.getElementById('givenAns4').innerHTML=' ';
			return;
		}
		for (var i=arleng;
		i <=4;
		i++) {
			arr[i]=' ';
		}
		document.getElementById('givenAns1').innerHTML=Change1234toABCD(arr[0]);
		document.getElementById('givenAns2').innerHTML=Change1234toABCD(arr[1]);
		document.getElementById('givenAns3').innerHTML=Change1234toABCD(arr[2]);
		document.getElementById('givenAns4').innerHTML=Change1234toABCD(arr[3]);
	}
	
	function PopulatePlayState() {
		//https://www.w3schools.com/xml/ajax_intro.asp
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				currentfffplaystate=this.responseText;
			}
		}
		;
		xhttp.open("GET", playstateloc+"/wwtbam-state/GetFFFPlayState.php", true);	
		xhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
		xhttp.send();
	}
	
	function PopulateContestantInfo() {
		//https://www.w3schools.com/xml/ajax_intro.asp
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				currentfffcontestantinfo=this.responseText;
			}
		}
		;
		xhttp.open("GET", playstateloc+"/wwtbam-state/GetFFFPlayData.php?ContestantPosition="+contestantposition, true);	
		xhttp.setRequestHeader('Access-Control-Allow-Origin', '*');
		xhttp.send();
	}
	
	function XmlParser() {					
	//document.getElementById('currentfffplaystate').innerHTML=xmlDoc.getElementsByTagName("FFFPlayState")[0].childNodes[0].nodeValue;
		var xmlDoc = parser.parseFromString(currentfffplaystate,"text/xml");
		
		var laststateid = xmlDoc.getElementsByTagName("STATEID")[0].childNodes[0].nodeValue
		
		if (laststateid===stateid){
			return;
		}
		
		stateid=laststateid;
		
		InterfaceChange(xmlDoc);
		
	}
	
	function InterfaceChange(xmlDoc){
		var playstate = xmlDoc.getElementsByTagName("FFFPLAYSTATE")[0].childNodes[0].nodeValue.toUpperCase();
	
		if (playstate==='READQ') {//READQ1234READY //READQ1234  //STANDBYFFFGAME  //CONTESTANTNAMETOWN
			DeleteAnswer(); 
			document.getElementById("question").innerHTML=xmlDoc.getElementsByTagName("QUESTIONTEXT")[0].childNodes[0].nodeValue;
			document.getElementById("answer1").innerHTML="";	
			document.getElementById("answer2").innerHTML="";
			document.getElementById("answer3").innerHTML="";	
			document.getElementById("answer4").innerHTML="";
			
			isanswerconfirmed=-1;
			
			reset();
			
		} else if (playstate==='READQ1234READY') {
			DeleteAnswer();
			document.getElementById("question").innerHTML=xmlDoc.getElementsByTagName("QUESTIONTEXT")[0].childNodes[0].nodeValue;
			document.getElementById("answer1").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "A: "+xmlDoc.getElementsByTagName("ANSWER1TEXT")[0].childNodes[0].nodeValue;		
			document.getElementById("answer2").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "B: "+xmlDoc.getElementsByTagName("ANSWER2TEXT")[0].childNodes[0].nodeValue;
			document.getElementById("answer3").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "C: "+xmlDoc.getElementsByTagName("ANSWER3TEXT")[0].childNodes[0].nodeValue;		
			document.getElementById("answer4").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "D: "+xmlDoc.getElementsByTagName("ANSWER4TEXT")[0].childNodes[0].nodeValue;	

			isanswerconfirmed=-1;
			
			reset();

		} else if (playstate==='READQ1234') {
			DeleteAnswer();
			document.getElementById("question").innerHTML=xmlDoc.getElementsByTagName("QUESTIONTEXT")[0].childNodes[0].nodeValue;
			document.getElementById("answer1").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "A: "+xmlDoc.getElementsByTagName("ANSWER1TEXT")[0].childNodes[0].nodeValue;		
			document.getElementById("answer2").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "B: "+xmlDoc.getElementsByTagName("ANSWER2TEXT")[0].childNodes[0].nodeValue;
			document.getElementById("answer3").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "C: "+xmlDoc.getElementsByTagName("ANSWER3TEXT")[0].childNodes[0].nodeValue;		
			document.getElementById("answer4").innerHTML ="&nbsp;&nbsp;&nbsp;&nbsp;" + "D: "+xmlDoc.getElementsByTagName("ANSWER4TEXT")[0].childNodes[0].nodeValue;	
			
			isanswerconfirmed=0;
			
			reset();
			start();
			
		}  else if (playstate==='CONTESTANTNAMETOWN') {
			try {
				DeleteAnswer();
				
				var xmlDocCont = parser.parseFromString(currentfffcontestantinfo,"text/xml");	
				var contname = xmlDocCont.getElementsByTagName("CONTESTANTNAME")[0].childNodes[0].nodeValue;
				var conttown = xmlDocCont.getElementsByTagName("CONTESTANTTOWN")[0].childNodes[0].nodeValue;
						
				document.getElementById("question").innerHTML = contname.toUpperCase() + "<br />" + conttown.toUpperCase();
				document.getElementById("answer1").innerHTML="";	
				document.getElementById("answer2").innerHTML="";
				document.getElementById("answer3").innerHTML="";	
				document.getElementById("answer4").innerHTML="";
				
				isanswerconfirmed=-1;
				
			} catch (err) {
				alert("Contestant position is not set: " + err.message);
			}	 
					
		}
	}
	
	</script>
</body>