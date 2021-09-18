<!DOCTYPE html>
<html lang="en">
 

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preload" href=main.css as="style">
<link rel="stylesheet" href=main.css>
<link rel="preload" href=custom.css as="style">
<link rel="stylesheet" href=custom.css>
<title>Event QR Code Scanner</title>
<meta property="og:title" content="Event QR Code Scanner" />
<meta property="og:locale" content="en_US" />
<meta name="description" content="Event QR Code Scanner" />
<meta property="og:description" content="Event QR Code Scanner" />

<meta property="og:site_name" content="Event QR Code Scanner" />
<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="Event QR Code Scanner" />

</head>
 <body data-instant-allow-query-string data-instant-allow-external-links>
  
   <main class="default-content" aria-label="Content">
     <div class="wrapper-content">
      
<style>
    html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}

body {

	color: #fff;
	background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
#reader {
    width: 740px;
    background-color: white;
    margin: 3%;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    border-radius: 15px;
}
@media(max-width: 600px) {
	#reader {
		width: 300px;
	}
}
.empty {
    display: block;
    width: 100%;
    height: 20px;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert-info {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.linktree2
{
    width:160px;
    height:140px;
    background-size:cover;
    background-repeat:no-repeat;
    background-position:50% 50%
}
.linktree
{width:260px;
height:100px;
background-size:cover;
background-repeat:no-repeat;
background-position:50% 50%}
</style>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/default.min.css">
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <div class="col-md-12" style="text-align: center; padding-top: 5px; padding-bottom: 10px;">
        <img src="https://anshumanfauzdar.me/MLSA-Events/Assets/MLSA.png" class="linktree2" alt="MLSA">
        <img src="https://anshumanfauzdar.me/MLSA-Events/Assets/hackClub.png" class="linktree" alt="HackClub">
    </div>
      <div class="col-md-12" style="text-align: center;font-size: 2rem; font-weight: 900;">
      Event QR Code Scanner
      </div>

<div class="container">
	<div class="row">
		<div class="col-md-12" style="text-align: center;margin-bottom: 20px;  color: black;">
			<div id="reader" style="display: inline-block;"></div>
		</div>
	</div>
    <div class="row">
		<div class="col-md-12" style="text-align: center;margin-bottom: 20px; background-color: white; color: black;  border-radius: 15px;">
			
			<div class="empty" style="display: none;"></div>
			<div id="scanned-result"></div>
		</div>
	</div>
</div>


<br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
<script src="html5-qrcode.min.js"></script>
<script>
function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}
/** Ugly function to write the results to a table dynamically. */
function printScanResultPretty(codeId, decodedText, decodedResult) {
	let resultSection = document.getElementById('scanned-result');
    let tableBodyId = "scanned-result-table-body";
    if (!document.getElementById(tableBodyId)) {
        let table = document.createElement("table");
        table.className = "styled-table";
        table.style.width = "100%";
        resultSection.appendChild(table);
        let theader = document.createElement('thead');
        let trow = document.createElement('tr');
        let th1 = document.createElement('td');
        th1.innerText = "Count";
        // th1.setAttribute("style", "padding-left:7%;");
        // let th2 = document.createElement('td');
        // th2.innerText = "Format";
        let th3 = document.createElement('td');
        th3.innerText = "Welcome to event";
        // th3.setAttribute("style", "padding-left:33%;");
        trow.appendChild(th1);
        // trow.appendChild(th2);
        trow.appendChild(th3);
        theader.appendChild(trow);
        table.appendChild(theader);
        let tbody = document.createElement("tbody");
        tbody.id = tableBodyId;
        table.appendChild(tbody);
    }
    let tbody = document.getElementById(tableBodyId);
    let trow = document.createElement('tr');
    let td1 = document.createElement('td');
    td1.innerText = `${codeId}`;
    // let td2 = document.createElement('td');
    // td2.innerText = `${decodedResult.result.format.formatName}`;
    let td3 = document.createElement('td');
    td3.innerText = `${decodedText}`;
    trow.appendChild(td1);
    // trow.appendChild(td2);
    trow.appendChild(td3);
    tbody.appendChild(trow);
    if(decodedText!=''){
        sendData(decodedText);
    }
}
docReady(function() {
	hljs.initHighlightingOnLoad();
	var lastMessage;
	var codeId = 0;
	function onScanSuccess(decodedText, decodedResult) {

		if (lastMessage !== decodedText) {
			lastMessage = decodedText;
            printScanResultPretty(codeId, decodedText, decodedResult);
            ++codeId;
		}
	}
	let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", 
        { 
            fps: 10,
            qrbox: 250,
            experimentalFeatures: {
                useBarCodeDetectorIfSupported: true
            }
        });
	html5QrcodeScanner.render(onScanSuccess);
});
</script>
     </div>
   </main>

 </body>

</html>

<script>
   function sendData( barcode ){
       let information = {barcode };
       $.ajax({
           url:"data.php",
           type:"GET",
           data:information,
           success:function(result){
               console.log(result);
           }
       })
   }

 </script>  