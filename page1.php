<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="first_body">
    

 <div class ="case">
<form action="page2.php" method="POST">

    <div class="titre">
    &ensp;entrez vos nom&ensp;<br> <hr> <br>              <!-- afficher le titre-->
   </div>
                                                     <!-- recevoir les coordonnee de l'utilsateur utilisant input text-->
     <div class="info">
    NOM: &emsp; &thinsp; <input type="text" name="name" placeholder="nom" id="firstname" onkeyup="isEmpty()" /><br><br>
   
    PRENOM: <input type="text" name="famlyname" placeholder="prenom" id="lastname" onkeyup="isEmpty()" /><br><br>
    </div>
   
   <div class ="buton">                              <!-- bouton no cliquable-->
    <button id="btn" disabled type="submit"> COMMENCER LE QUIZ </button>
   </div>

   </form>
</div>
   <script >           //fonction rendre le bouton cliquable si l'utilisateur remplir tout les case de donnee
       function isEmpty(){
           let firstname = document.getElementById("firstname").value;
           let lastname = document.getElementById("lastname").value;
           if(firstname != "" && lastname != ""){
               document.getElementById("btn").removeAttribute("disabled");
           }
       }
   </script>

</body>
</html>