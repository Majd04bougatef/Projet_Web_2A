<?php 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style_home.css">
  </head>
  <body>
    
    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
          <a href = "index.html" class = "navbar-brand">MedTUN</a>
          <div class = "navbar-nav">
            <a href = "">home</a>
            <a href = "">blog</a>
            <a href = "formulaire_creationArticle.html">article</a>
          </div>
        </div>
      </nav>
      <div class = "banner">
        <div class = "container">
          <h1 class = "banner-title">
            <span>Med.TUN</span>  Blogs
            <p>Histoires personnelles. Perspectives d'experts. </p>
            <button>
                <a href="add_blog.php" class="Btn" >Création article ></a>
            <svg class="svg" viewBox="0 0 512 512" >
             <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
               </button>
           
          </h1>
          

          
          
          </form>
        </div>
      </div>
      <div class="loading">
        <svg width="64px" height="48px">
            <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="back"></polyline>
          <polyline points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24" id="front"></polyline>
        </svg>
      </div>
      
    </header>
  
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap');

:root{
    --Playfair: 'Playfair Display', serif;
    --Quicksand: 'Quicksand', sans-serif;
    --Roboto: 'Roboto', sans-serif;
    --dark: #3c393d;
    --exDark: #2b2b2b;
}
*{
    padding: 0;
    margin: 0;
    font-family: var(--Quicksand);
}
body{
    line-height: 1.4;
    color: var(--dark);
}
img{
    width: 100%;
    display: block;
}
.container{
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 1.2rem;
}


header{
    min-height: 100vh;
    background: linear-gradient(rgba(152, 193, 248, 0.4), rgba(255, 248, 248, 0.4)), url(https://i.pinimg.com/564x/10/6b/39/106b3933d14c5b52f9a6a3d8dfa1eae0.jpg) center/cover no-repeat fixed;
    display: flex;
    flex-direction: column;
    justify-content: stretch;
}
.navbar{
    background-color: rgb(104, 135, 238); 
    padding: 1.2rem;
}
.navbar-brand{
    color: #fff;
    font-size: 2rem;
    display: block;
    text-align: center;
    text-decoration: none;
    font-family: var(--Playfair);
    letter-spacing: 1px;
}
.navbar-nav{
    padding: 0.8rem 0 0.2rem 0;
    text-align: center;
}
.navbar-nav a{
    text-transform: uppercase;
    font-family: var(--Roboto);
    letter-spacing: 1px;
    font-weight: 500;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 0.4rem 0.1rem;
    letter-spacing: 3px;
    transition: opacity 0.5s ease;
}
.navbar-nav a:hover{
    opacity: 0.7;
}
.banner{
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: rgb(72, 91, 188)
}
.banner-title{
    font-size: 5.5rem;
    font-family: var(--Playfair);
    line-height: 1.2;
}
.banner-title span{
    font-family: var(--Playfair);
    color: var(--exDark);
}
.banner p{
    padding: 0rem 0 20rem 0;
    font-size: 1.2rem;
    text-transform: uppercase;
    font-family: var(--Roboto);
    font-weight: 500;
    word-spacing: 2px;
}
.loading svg polyline {
  fill: none;
  stroke-width: 5;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.loading svg polyline#back {
  fill: none;
  stroke: #ff4d5033;
}

.loading svg polyline#front {
  fill: none;
  stroke: #ff4d4f;
  stroke-dasharray: 48, 144;
  stroke-dashoffset: 192;
  animation: dash_682 1.4s linear infinite;
}

@keyframes dash_682 {
  72.5% {
    opacity: 0;
  }

  to {
    stroke-dashoffset: 0;
  }
}
.Btn {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 150px;
  height: 40px;
  border: none;
  padding: 2px 50px;
  background-color: blue;
  color: white;
  font-weight: 700;
  cursor: pointer;
  border-radius: 10px;
  box-shadow: 5px 5px 0px blue;
  transition-duration: .3s;
}

.svg {
  width: 13px;
  position: absolute;
  right: 0;
  margin-right: 20px;
  fill: white;
  transition-duration: .3s;
}

.Btn:hover {
  color: transparent;
}

.Btn:hover svg {
  right: 43%;
  margin: 0;
  padding: 0;
  border: none;
  transition-duration: .3s;
}

.Btn:active {
  transform: translate(3px , 3px);
  transition-duration: .3s;
  box-shadow: 2px 2px 0px rgb(140, 32, 212);
}