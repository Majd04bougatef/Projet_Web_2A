<?php
include '../controller/userC.php';
$error = "";
$user = null;
$userC = new userC();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cin = $_POST["cin"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $sexe = $_POST["sexe"];
    $telephone = $_POST["telephone"];
    $nationalite = $_POST["nationalite"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $diplome = $_POST["diplome"];
    $specialite = $_POST["specialite"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $lieu_cabinet = $_POST["lieu_cabinet"];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $targetDir = "images/";
        $filename = basename($_FILES["image"]["name"]);
        $targetPath = $targetDir . $filename;
        $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

        $validImageExtensions = ['jpg', 'jpeg', 'png'];

        if (in_array(strtolower($fileType), $validImageExtensions)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);

            $user = new user(
                NULL,
                $cin,
                $nom,
                $prenom,
                $age,
                $sexe,
                $telephone,
                $nationalite,
                $email,
                $password,
                $role,
                $diplome,
                $specialite,
                $pays,
                $ville,
                $lieu_cabinet,
                $filename
            );

            $userC->adduser($user);

        } else {
            $error = "Invalid file format. Please upload a JPG, JPEG, or PNG file.";
        }
    } else {
        $error = "File upload failed. Please try again.";
    }
}
?>
<!-- ... (your HTML code) ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/page_login_create/style.css">
    <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/imglogo.png" rel="apple-touch-icon">

    <title>Modern Login Page | AsmrProg</title>
</head>
<body>

    


    <div class="container" id="container" >
        <div class="form-container sign-up">
        <form method="POST" enctype="multipart/form-data">
                <h1>Create Account</h1>
                <div class="grid w-full max-w-xs items-center gap-1.5">
                    <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Picture</label>
                    <input id="image" name="image" accept=".jpg, .jpeg, .png"  type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                </div>
                <div class="coter" style="display:flex;">
                    <input type="text" id="nom" name="nom" placeholder="Nom" style="margin-left:5px;" >
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom" style="margin-left:5px;">
                </div>

                <div class="coter" style="display:flex;">
                    <input type="text" id="cin" name="cin" placeholder="Cin" style="margin-left:5px;">
                    <input type="age" id="age" name="age" placeholder="Age" style="margin-left:5px;">
                </div>

                <div class="coter" style="display:flex;">
               
                

                <select id="nationalite" name="nationalite">
                    <option value="">Sélectionner une pays</option>
                    <option value="afghanistan">Afghanistan</option>
                    <option value="albania">Albania</option>
                    <option value="algeria">Algeria</option>
                    <option value="zimbabwe">Zimbabwe</option>
                </select>

                <input type="text" id="telephone" name="telephone" placeholder="Télephone"style="margin-left:5px;">
                </div>
                <div class="coter" style="display:flex;">
                <input type="email" id="email" name="email" placeholder="Email" style="margin-left:5px;">
                
                <input type="password" id="password" name="password" placeholder="Password" style="margin-left:5px;">
                </div>

                <div class="coter" style="display:flex;">
                <select id="sexe" name="sexe"  style="margin-left:5px;">
                    <option value="m">male</option>
                    <option value="f">female</option>
                </select>
                <select id="role" name="role" style="margin-left:5px;">
                    <option value="patient">patient</option>
                    <option value="medecin">Medecin</option>    
                </select>
                </div>
                
                    <div id="doctorFields" style="display:none;">
                    <div class="coter" style="display:flex;">
                    <select id="specialite" name="specialite" style="margin-left:5px;">
                        <option value="">Sélectionner votre spécialité</option>
                        <option value="generaliste">Géneraliste</option>
                        <option value="Cardiologie">Cardiologie</option>
                        <option value="Dermatologie">Dermatologie</option>
                        <option value="Orthopedste">Orthopediste</option>
                        <option value="Pediatre">Pediatre</option>
                        <option value="Ophthalmologie">Ophthalmologie</option>
                    </select>
                        <input type="text" id="diplome" name="diplome" placeholder="diplome"style="margin-left:5px;"><br>        
                    </div>
                    <div class="coter" style="display:flex;">
                        <input type="text" id="pays" name="pays" placeholder="pays"style="margin-left:5px;"><br>
                        <input type="text" id="ville" name="ville" placeholder="ville"style="margin-left:5px;"><br>
                    </div>
                        <input type="lieu_cabinet" id="lieu_cabinet" name="lieu_cabinet" placeholder="lieu_cabinet"><br>
                    </div>
                <button type="submit"  name="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
        
            <form method="POST" action="../view/login.php">
                <h1>SIGN IN</h1>
                <!-- Your input fields -->
                <input type="email" placeholder="Email" name="email_signin">
                <input type="password" placeholder="Password" name="password_signin">
                <button type="submit" name="signin_submit">Sign In</button>
                <a href="../view/forget.php">forget password</a>


            </form>

        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/page_login_create/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {           
            const roleSelect = document.getElementById('role');
            const doctorFields = document.getElementById('doctorFields');
            function toggleDoctorFields() {
                doctorFields.style.display = roleSelect.value === 'medecin' ? 'block' : 'none';
            }
            toggleDoctorFields();
            roleSelect.addEventListener('change', toggleDoctorFields);
        });
        </script>
</body>

</html>