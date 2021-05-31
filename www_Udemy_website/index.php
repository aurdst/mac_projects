<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>

 <nav>
  <h2>Hebergor2000</h2>
 </nav>

 <?php

    // function Racine($a, $b, $c){

    //     if ($a == 0 or $b == 0 or $c == 0){
    //         echo 'The function is unvaliable';
    //         exit;
    //     }
    //     $delta = $b * $b - (4* $a * $c);
    //     if ($delta < 0){
    //         echo 'I dont have the solution';
    //     }elseif($delta == 0){
    //         $result = - $b/(2 * $a);
    //         echo 'The solution is '.$result;
    //     }elseif($delta > 0){
    //         $racineA = (-$b-sqrt($delta))/2*$a;
    //         $racineB = (-$b+sqrt($delta))/2*$a;

    //         echo 'The solution X1 is : '.$racineA.'<br>
    //               The second solution X2 is : '.$racineB;
    //     }
    // }

    // Racine(4, 7, 5);

    // HOSTING IMG IN SERV

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0 ){
        
        $error = 1;

        if($_FILES['image']['size']<= 3000000){
            
            $infoImg = pathinfo($_FILES['image']['name']);
            $extentionImg = $infoImg['extension'];
            $extentionArray = array(
                'jpg', 'jpeg', 'png', 'pdf', 'gif'
            );
            if(in_array($extentionImg, $extentionArray)){

                $link = 'uploads/'.time().rand().rand().'.'.$extentionImg;

                move_uploaded_file($_FILES['image']['tmp_name'],
                 $link);
                echo 'File is send';
                $error = 0;
            }else{
                echo 'Error with your files try with other extension';
            }

        }
    }else{
        echo'Error with files';
    }
    ?>

    <form method="POST" action="index.php" enctype="multipart/form-data">
            <p>
                <h1>Uploader img</h1>
                
                <?php
                    if(isset($error) && $error == 0){
                        echo '<img src="'.$link.'" alt="image_upload" class="img_upload">';
                        echo '<br><br>Votre lien vers l\'image : <input type="text" value="http://localhost/'.$link.'"/>';
                    }elseif (isset($error) && $error == 1){
                        echo 'ERROR. Veuillez verifier votre extension ainsi que la taille de votre image (max : 3Mo)
                        puis réesayer.';
                    }
                ?>

                <input required type="file" name="image"/><br>
                <button type="sumbmit">Send your img</button>
                <br><br><br>
                <button>
                    Click here for view your image
                </button>
    </form>



</body>
</html>