



document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("symptomes");
    var labelText = document.getElementById("text");

    select.addEventListener("change", function() {
        var selectedValue = select.options[select.selectedIndex].value;

        if (selectedValue !== "") {
            labelText.style.visibility = "visible"; 
            labelText.querySelector(".text").textContent = "Enter " + selectedValue + ":";
            selectedOptionInput.value = selectedValue; // Set the hidden input value
        } else {
            labelText.style.visibility = "hidden"; 
            selectedOptionInput.value = ""; // Clear the hidden input value
        }
    });
});



