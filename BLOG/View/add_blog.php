<?php

include '../Controller/blogC.php';

$error = "";

// create blog
$blog = null;

// create an instance of the controller
$blogC = new blogC();
if (
    isset($_POST["titre_blog"]) &&
    isset($_POST["sujet_blog"]) &&
    isset($_POST["desc_blog"]) 
    // isset($_POST["date_blog"])
) {
    if (
        !empty($_POST['titre_blog']) &&
        !empty($_POST["sujet_blog"]) &&
        !empty($_POST["desc_blog"]) 
        // !empty($_POST["date_blog"])
    ) {
        $blog = new blog( null,  $_POST['titre_blog'],   $_POST['sujet_blog'],  $_POST['desc_blog'], new DateTime($_POST['date_blog']), 'MM12345676' );
        $blogC->addblog($blog);
        header('Location:listeblog.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    
</head>

<body>
 

    <div id="error">
        <?php echo $error; ?>
    </div>
<form action="" method="POST">
    <div class="container">
        <div class="modal">
            <div class="modal__header">
                <span class="modal__title">Nouveau Article</span>
                <button class="button button--icon">
                    <svg width="24" viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path>
                    </svg>
                </button>
            </div>
            <div class="modal__body">
                <div class="input">
                    <label class="input__label" for="titre_blog">Titre</label>
                    <input class="input__field" name="titre_blog" type="text" id="titre_blog" autocomplete="off">
                    <p class="input__description">The title must contain a maximum of 32 characters</p>
                </div>
                <div class="input">
                    <label class="input__label" for="sujet_blog">Sujet</label>
                    <input class="input__field" type="text" name="sujet_blog" id="sujet_blog" autocomplete="off">
                </div>
                <div class="input">
                    <label class="input__label" for="desc_blog">Description</label>
                    <textarea class="input__field input__field--textarea" name="desc_blog" id="desc_blog" autocomplete="off"></textarea>
                    <p class="input__description">Give your project a good description so everyone knows what it's for</p>
                    </div>
                    <!-- <label class="input__label" for="date_blog">Date de l'article:</label>
                    <input class="input__field" name="date_blog" type="date" id="date_blog" autocomplete="off"> -->
                
            </div>
            <div class="modal__footer">
                <button class="button button--primary">Créer</button>
                <button class="button button--primary" type="reset" value="Reset"> Reset</button>

                
            </div>
        </div>
    </div>
    <header>
    <div class="background-image"></div>
</header>

</form>

    <style>
        .button {
  appearance: none;
  font: inherit;
  border: none;
  background: none;
  cursor: pointer;
}

.container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
}

.modal {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 500px;
  background-color: #fff;
  box-shadow: 0 15px 30px 0 rgba(0, 125, 171, 0.15);
  border-radius: 10px;
}

.modal__header {
  padding: 1rem 1.5rem;
  border-bottom: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.modal__body {
  padding: 1rem 1rem;
}

.modal__footer {
  padding: 0 1.5rem 1.5rem;
}

.modal__title {
  font-weight: 700;
  font-size: 1.25rem;
}

.button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: 0.15s ease;
}

.button--icon {
  width: 2.5rem;
  height: 2.5rem;
  background-color: transparent;
  border-radius: 0.25rem;
}

.button--icon:focus, .button--icon:hover {
  background-color: #ededed;
}

.button--primary {
  background-color: #007dab;
  color: #FFF;
  padding: 0.75rem 1.25rem;
  border-radius: 0.25rem;
  font-weight: 500;
  font-size: 0.875rem;
}

.button--primary:hover {
  background-color: #006489;
}

.input {
  display: flex;
  flex-direction: column;
}

.input + .input {
  margin-top: 1.75rem;
}

.input__label {
  font-weight: 700;
  font-size: 0.875rem;
}

.input__field {
  display: block;
  margin-top: 0.5rem;
  border: 1px solid #DDD;
  border-radius: 0.25rem;
  padding: 0.75rem 0.75rem;
  transition: 0.15s ease;
}

.input__field:focus {
  outline: none;
  border-color: #007dab;
  box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.25);
}

.input__field--textarea {
  min-height: 100px;
  max-width: 100%;
}

.input__description {
  font-size: 0.875rem;
  margin-top: 0.5rem;
  color: #8d8d8d;
}

header{
    min-height: 100vh;
    background: linear-gradient(rgba(152, 193, 248, 0.4), rgba(255, 248, 248, 0.4)), url(https://i.pinimg.com/564x/b8/d9/db/b8d9dbbecf1144a150f4230255a112d4.jpg) center/cover no-repeat fixed;
    display: flex;
    flex-direction: column;
    justify-content: stretch;
}
    
    </style>
    

</body>
</html>



