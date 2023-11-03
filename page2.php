<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
   

<?php                                            //un tableau PHP $quest 
    $quest = [
        1 => [ 'Question' => '1. What does PHP stand for ?',
               'choix' => [ 'A' => 'PHP Hypertext Preprocessor',
                         'B' => 'Personal Hypertext Proprocessor',
                         'C' => 'Private Home Page' ],
               'repense' =>['A'],
               'type' => 'checkbox'
         ],
        2 => ['Question' => '2. The PHP syntax is most similar to :',
              'choix' => [ 'A' => 'JavaScript',
                           'B' => 'Perl and C',
                           'C' => 'VBScript' ],
              'repense' => [ 'B' ],
              'type' => 'radio'
         ],
        3 => ['Question' => '3. How do you information from a from that is submitted using the "get" methode ?',
              'choix' => [ 'A' => 'Request.Form;',
                           'B' => '$_GET[];',
                           'C' => 'Request.QueryString;' ],
              'repense' => [ 'B'],
              'type' => 'checkbox'
         ],
        4 => [ 'Question' => '4. Whene using the POST method, variables are displayed in thr URL',
               'choix' => ['A' => 'FALSE',
                           'B' => 'TRUE', ],
               'repense' =>['A'],
               'type' => 'radio'
         ],
        5 => [ 'Question' => '5. IN PHP you can both single quotes and double quates for strings:',
                 'choix' => [ 'A' => 'FALSE',
                              'B' => 'TRUE',],
                 'repense' => ['B'],
                 'type' => 'radio'
         ],
        6 => ['Question' => '6. How many iteration will cause the following loop for ($i = 0; $i <= 5; $i++) ',
                 'repense' => ['6'],
                 'type' => 'text'
        ],
         7 => ['Question' => '7. What is the correct way to create a function in PHP',
                'choix' => [ 'A' => 'function myFunction()',
                             'B' => 'create myFunction()',
                             'C' => 'new_function myFunction()', ],
               'repense' => [ 'A'],
               'type' => 'checkbox'
         ],
         8 => [ 'Question' => '8. Which superglobal variable holds information about headers, paths, and script locations ?',
                 'choix' => [ 'A' => '$GOULABALS',
                              'B' => '$_SERVER',
                              'C' => '$_GET',
                              'D' => '$_SESSION' ],
                 'repense' => ['B'],
                 'type' => 'radio',
        ],
         9 => ['Question' => '9. Knowing that $var = 6; What is the value of: $var += 2; ? ',
             'repense' => ['8'],
             'type' => 'text'
         ]
  ];

    if (isset($_POST['choix'])){
        $choix = $_POST['choix'];                      //recevoir les choix de l'utilisateur

        $total = count($_POST['choix']);              //calcul le nbr de questions
            
           
        echo '<div class="resultat">';

         $counter = 0;

        foreach ($quest as $Ques => $Value){            //une boucle pour afficher les questions

            echo'<span style="text-decoration: underline black;">' .$Value['Question']. '</span> <br /> <br>';

           for ($i = 0, $c = count($Value['repense']); $i < $c; $i++) {   // une boucle pour afficher les repenses  et son resulta selon le type

            echo '<div class="resultat">';

            if($Value["type"]=="text"){                  

                  if ($choix[$Ques] != $Value['repense'][$i]){            
                   echo 'Votre reponse: <span style="color: red;">'.$choix[$Ques].'</span><br>';
                   echo 'La bonne reponse: <span style="color: green;">'.$Value['repense'][$i]. '</span><br>';
                  }else{
                  
                  echo 'Votre reponse: <span style="color: green;">'.$Value['repense'][$i].'</span> <br>'; $counter++; 
                  echo'<div class="one"> ';
                  echo'+1';
                  echo'</div>';
                   }
                
            }
            else

                if ($choix[$Ques] != $Value['repense'][$i] ){

                 echo 'Votre reponse: <span style="color: red;">'.$Value['choix'][$choix[$Ques]].'</span><br>'; 
                 echo 'La bonne reponse: <span style="color: green;">'.$Value['choix'][$Value['repense'][$i]].'</span><br>';
                 } else {
                 
                 echo 'Votre reponse: <span style="color: green;">'.$Value['choix'][$choix[$Ques]].'</span><br>'; $counter++;
                 echo'<div class="one"> ';
                 echo'+1';
                 echo'</div>';
            }
        }
            
            
           echo '<br /> <br /> *************************************************************************************<br /> <br />';

             if ($counter == " ") {                     // calcul et afficher le score 
                 $counter='0';
                $results = "Votre score: $counter/ $total"; 
             } else { 
                 $results = "Votre score: $counter/ $total"; 
                 }}
                 
                 echo '<h2>'.$results.'</h2>';
                 echo'</div>';
    } else{
    ?>
    <div class="contenu">
    <h1> Quiz ABOUT PHP</h1>                                
                                                                                       <!-- le formulaire de quiz-->

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="quiz">
        
        <?php foreach ($quest as $Ques => $Value){    // une boucle pour afficher les quastions

            $ty = $Value['type']; 
            ?>
           <br><br>
           <div class="qst">
            <h3><?php echo $Value['Question']; ?></h3><br>
            <?php                                              //afficher les choix selon le type
             if($ty =="text"){
                    
                ?>

                <input type='text' name="choix[<?php echo $Ques; ?>]" value='' placeholder="enter here" id="ride" onkeyup="isEmpty()" /><br>
             <?php 
              }else{
                foreach ($Value['choix'] as $symbol => $repons){ 
                $print = 'question-'.$Ques.'-choix-'.$symbol;
              
              ?>
            
            <div class ="choixReponse">
                
                  <input type="<?php echo $ty ; ?>" name="choix[<?php echo $Ques; ?>]" id="<?php echo $print; ?>" value="<?php echo $symbol; ?>" id="ride" onkeyup="isEmpty()" />
                   <label for="<?php echo $print; ?>"><?php echo $symbol; ?>) <?php echo $repons; ?> </label>
            </div>

            <?php }} ?>
            </div>
        <?php } ?>
        <div class ="ok">
        <br>                                                   <!-- bouton no cliquable-->
        <input type="submit" value="ENVOYE" id="btn" disabled />
        
        </div>
        
        </form>
        </div>
    <?php
    }
    ?>
  </div>

<script >                       //fonction rendre le bouton cliquable si l'utilisateur remplir tout les case de donnee
       function isEmpty(){
           let ride = document.getElementById("ride").value;
           
           if(ride != "" ){
               document.getElementById("btn").removeAttribute("disabled");
           }
       }
   </script>
</body>
</html>
