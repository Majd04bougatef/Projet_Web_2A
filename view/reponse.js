function verif() {
  let reponse = document.getElementById("reponse").value;

  if (reponse === "") {
    alert("Veuillez saisir la reponse.");
    return false;
  }

  return true;
}

  