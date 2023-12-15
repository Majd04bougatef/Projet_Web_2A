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
    <style>
    .coter {
        display: flex;
        margin-bottom: 10px; /* Ajoutez une marge en bas pour espacer les champs */
    }

    #nombreAleatoire,
    #confermation {
        flex: 1; /* Fait en sorte que les champs occupent le même espace */
        margin-left: 5px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #nombreAleatoire[readonly] {
        background-color: #f5f5f5; /* Ajoutez une couleur de fond pour indiquer que le champ est en lecture seule */
        cursor: not-allowed;
    }

    #confermation:focus {
        border-color: #007bff; /* Change la couleur de la bordure lorsqu'il est en focus */
        outline: none; /* Supprime la bordure bleue ajoutée par défaut */
    }
</style>

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
                    <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea">Korea</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian ">Palestinian</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and TheGrenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian  ">Syrian  </option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania  </option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="tunisie">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
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
                    <div class="coter" style="display:flex;">
                    <input type="text" id="nombreAleatoire" name="nombreAleatoire" placeholder="Nombre Aléatoire"style="margin-left:5px;" readonly>
                
                    <input type="text" id="confermation" name="confermation" placeholder="confirmation"style="margin-left:5px;"><br>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour générer un nombre aléatoire
    function genererNombreAleatoire() {
        return Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    }

    // Mettre à jour la valeur du champ "Nombre Aléatoire" lors du chargement de la page
    var nombreAleatoireInput = document.getElementById('nombreAleatoire');
    nombreAleatoireInput.value = genererNombreAleatoire();

    // Vérifier la valeur du champ "Confirmation" lors de la soumission du formulaire
    var formulaire = document.querySelector('form');
    formulaire.addEventListener('submit', function(event) {
        var confirmationInput = document.getElementById('confirmation');
        if (nombreAleatoireInput.value !== confirmationInput.value) {
            alert('La confirmation ne correspond pas au nombre aléatoire.');
            event.preventDefault(); // Empêcher la soumission du formulaire
        }
    });
});
</script>



</body>

</html>