<?php 
include_once "conection.php";

session_start();


if (!isset($_SESSION['email'])) {
    header("Location: offreopp.php");
    exit; 
}

if (isset($_SESSION['id_r'])) {
    header("Location: offreopp.php");
    exit; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/apply.css">
    <title>Projects</title>
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="offreopp.php"> <span id="close">&times;</span> </a>
<form class="form1" method="post">
                
                <p class="message">Hope you get the job you want!</p>
                    <label>
                        Phone number
                        <input id="ln" class="input" type="text" placeholder="" required="" name="">
                       
                    </label>
        
                <label>
                    Your gender
                    <select name="sexe" id="" >
                      <option value="sexe" selected disabled>Sex</option>
                      <option value="homme">homme</option>
                      <option value="femme">femme</option>
            </select>
                </label> 
                <label for="">
                    Your level
                <select name="niveau_etude" id="niveau_etude" >
                        <option value="" disabled selected>Niveau d'étude</option>
                        <option value="Niveau Secondaire">Niveau Secondaire</option>
                        <option value="Niveau Terminal">Niveau Terminal</option>
                        <option value="Baccalauréat">Baccalauréat</option>
                        <option value="TS Bac +2">TS Bac +2</option>
                        <option value="Licence (LMD), Bac + 3">DLicence (LMD), Bac + 3</option>
                        <option value="Master 1, Licence  Bac + 4">Master 1, Licence  Bac + 4</option>
                        <option value="Master 2, Ingéniorat, Bac + 5">Master 2, Ingéniorat, Bac + 5</option>
                        <option value="Magistère Bac + 7">Magistère Bac + 7</option>
                        <option value="doctorat">Doctorat</option>
                        <option value="Non Diplômante">Non Diplômante</option>
                        <option value="Formation Professionnelle">Formation Professionnelle</option>
                        <option value="Certification">Certification</option>
                    </select>
                </label>
                <label for="">
                    Your cv
                <div class="lflf"><p>Choose a file</p><input class="flfl" type="file"></div>
                </label>
                <label for="">
                    
                    <textarea placeholder="Describe your self...." name="" id=""></textarea>
                    
                </label>


                <button  class="submit" name="registr">Send</button>

    </form>


</div>



</body>
</html>