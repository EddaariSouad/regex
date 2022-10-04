<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
<form method="POST">
    <div class="d-flex justify-content-center mt-3">
    <h2>Mot de passe (12 caractères):</h2>
    <input type="text" name=mdp>    
    </div> 
</form>

<?php
    // Valeur nommée dans la progresse-bar pour les %
    $valeur = 0;

    // Conditions pour paramètrer le mot de passe
    if(empty($_POST['mdp'])){
        $_POST['mdp'] = '';
    }

    if(isset($_POST['mdp'])){
        // Accepter les chiffres
        if(preg_match('#[0-9]#', $_POST['mdp'])){ 
        $valeur = $valeur + 20 ;
        }
        // Accepter les minuscules
        if(preg_match('#[a-z]#', $_POST['mdp'])){ 
            $valeur = $valeur + 20 ;
        } 
          // Accepter les majuscules
        if(preg_match('#[A-Z]#', $_POST['mdp'])){ 
            $valeur = $valeur + 20 ;
        } 
          // Accepter tout les caractères
        if(preg_match('#[^A-Za-z0-9]#', $_POST['mdp'])){ 
            $valeur = $valeur + 20 ;
        }
          // 12 caractères ou plus
        if(strlen($_POST['mdp']) >= 12){ 
            $valeur = $valeur + 20 ;
        }
    }
    if($valeur == 0){
        $color = 'grey' ;
    }
    if( $valeur == 20  ){
        $color = 'dark' ;
    }
    if( $valeur == 40  ){
        $color = 'primary' ;
    }
    if( $valeur == 60  ){
        $color = 'danger' ;
    }
    if( $valeur == 80  ){
        $color = 'success' ;
    }
    if( $valeur == 100  ){
        $color = 'secondary' ;
    }
    ?>


  <section class="container">
    <div class="progress mt-3">
        <div class="progress-bar progress-bar bg-<?php echo $color ?>" role="progressbar" style="width:<?php echo $valeur ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div> 
  </section>


<section class="container mt-5">
    <div>
    <ul class="list-group text-center">
        <?php  if( $valeur == 100  )
            { echo '<h2> Mot de passe securisé !!!</h2>' 
                    ;}
        else
            { echo '<p class="list-group-item-dark">Le mot de passe doit contenir : </p>' ;} ?>
        <?php 
            if(!preg_match('#[0-9]#', $_POST['mdp'])){ echo '<li class="list-group-item">1 chiffre</li>' ;} 
            if(!preg_match('#[a-z]#', $_POST['mdp'])){ echo '<li class="list-group-item">1 minuscule</li>';} 
            if(!preg_match('#[A-Z]#', $_POST['mdp'])){ echo '<li class="list-group-item">1 majuscule</li>' ;} 
            if(!preg_match('#[^A-Za-z0-9]#', $_POST['mdp'])){ echo '<li class="list-group-item">1 caractère special</li>' ;}
            if(strlen($_POST['mdp']) < 12){ echo '<li class="list-group-item">12 caractères</li>';} 
        ?>
    </ul>
    </div>
</section>
<footer class=" d-flex justify-content-center mt-3"> &copy;Eddaari Souad </footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>