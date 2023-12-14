function verif() {
    let nom = document.getElementById("nom").value;
    let prenom = document.getElementById("prenom").value;
    let sujet_rec = document.getElementById("sujet_rec").value;
    let desc_rec = document.getElementById("desc_rec").value;
  
    if (nom === "") {
      alert("Veuillez saisir le nom.");
      return false;
    }

    if (prenom === "") {
      alert("Veuillez saisir le prenom.");
      return false;
    }

    if (sujet_rec === "") {
      alert("Veuillez saisir le sujet.");
      return false;
    }
  
    if (desc_rec === "") {
      alert("Veuillez saisir la description.");
      return false;
    }
  
    return true;
  }
  