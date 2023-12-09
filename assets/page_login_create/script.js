const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
document.addEventListener('DOMContentLoaded', function() {           
    const roleSelect = document.getElementById('role');
    const doctorFields = document.getElementById('doctorFields');
    function toggleDoctorFields() {
        doctorFields.style.display = roleSelect.value === 'm' ? 'block' : 'none';
    }
    toggleDoctorFields();
    roleSelect.addEventListener('change', toggleDoctorFields);
});