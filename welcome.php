<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://studentambassadors.microsoft.com/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;900&display=swap" rel="stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Welcome To Event 🎉</title>
    <style>
        body{
            background-color: #121212;
            color: white;
        }
        .animated {
            -webkit-animation-duration: 5s;
            animation-duration: 5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
         }
         
         @-webkit-keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
         }
         
         @keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
         }
         
         .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
         }
         
         @-webkit-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }
         
         @keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }
         
         .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
         }

.temporary.hide-opacity{
    opacity: 0;
}

.temporary {
    -webkit-transition: opacity 3s ease-in-out;
    -moz-transition: opacity 3s ease-in-out;
    -ms-transition: opacity 3s ease-in-out;
    -o-transition: opacity 3s ease-in-out;
     opacity: 1;
}
    </style>
</head>
<body>
    <div class="d-flex justify-content-center">
       <div style="padding-top:2%; padding-bottom: 3%; padding-right: 3%;">
        <img src="https://i.imgur.com/eQ0CKOE.gif" width="100px" height="100px" alt="">
    </div> 
       <h1 style="padding-top:5%; padding-bottom: 3%;"> Welcome to Event </h1>
       <div style="padding-top:2%; padding-bottom: 3%; padding-left: 3%;">
        <img src="https://i.imgur.com/eQ0CKOE.gif" width="100px" height="100px" alt="" style="-webkit-transform: scaleX(-1); transform: scaleX(-1);">
    </div>
        </div>

<div class="d-flex justify-content-center">
    <table class="table-dark table-borderless" style="border-spacing: 35px;
    border-collapse: separate;">

        <tbody>
          <tr class="animated fadeIn">
            <!-- <th scope="row"><h2>1</h2> </th> -->
            <td><h2 id="updatedBarcodeValue"></h2> </td>
          </tr>
          <tr style="display: none;">
            <th scope="row"><h2>2</h2> </th>
            <td><h2>Jacob</h2> </td>
          </tr>
          <tr style="display: none;">
            <th scope="row"><h2>3</h2> </th>
            <td><h2>Jacob</h2> </td>
          </tr>
        </tbody>
      </table>
</div>
<div class="animated fadeOut">
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_fnjH1K.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; display: inline; position:absolute; bottom:0;"  loop autoplay></lottie-player>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_fnjH1K.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; display: inline; position:absolute; bottom:0; padding-left: 25%;"  loop autoplay></lottie-player>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_fnjH1K.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; display: inline; position:absolute; bottom:0; padding-left: 50%;"  loop autoplay></lottie-player>
    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_fnjH1K.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; display: inline; position:absolute; bottom:0; padding-left: 75%;"  loop autoplay></lottie-player>
    
</div>
    
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
      <script>
          function updateValue(){
            $.ajax({
                url:"barcodes/data.txt",
                type:"GET",
                dataType:"json",
                success:function(result){

                    let lastData = result[result.length-1];
                    $("#updatedBarcodeValue").html(lastData['barcode'])
                    
                }
            })
          }


          setInterval(updateValue,1000)
      </script>
</body>
</html>