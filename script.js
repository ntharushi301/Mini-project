function showForm(userType) {
            // 1. Get all elements
            const studentForm = document.getElementById('studentForm');
            const adminForm = document.getElementById('adminForm');
            const studentTab = document.getElementById('studentTab');
            const adminTab = document.getElementById('adminTab');

            // 2. Hide all forms and remove active class from all tabs
            studentForm.classList.remove('active');
            adminForm.classList.remove('active');
            studentTab.classList.remove('active');
            adminTab.classList.remove('active');

            // 3. Show the selected form and highlight the clicked tab
            if (userType === 'student') {
                studentForm.classList.add('active');
                studentTab.classList.add('active');
            } else if (userType === 'admin') {
                adminForm.classList.add('active');
                adminTab.classList.add('active');
            }
}

 // Password Visibility Toggle
        function toggleVisibility(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }

        // Year visibility logic for Student & Batch Rep
        const roleSelect = document.getElementById('roleSelect');
        const yearGroup = document.getElementById('yearGroup');

        roleSelect.addEventListener('change', function() {
            if (this.value === 'student' || this.value === 'batch_rep') {
                yearGroup.classList.remove('hidden');
            } else {
                yearGroup.classList.add('hidden');
            }
        });

        const form = document.getElementById('registrationForm');
        const pass1 = document.getElementById('pass1');
        const pass2 = document.getElementById('pass2');
        const errorMsg = document.getElementById('passwordError');

        form.addEventListener('submit', function(event) {
            // 1. Check if passwords match
            if (pass1.value !== pass2.value) {
            // 2. Prevent form from sending to the database
                 event.preventDefault(); 
        
        // 3. Show error message
                 errorMsg.textContent = "Passwords do not match!";
                 errorMsg.style.display = "block";
        
        // 4. Optional: Add a red border to the input
                pass2.style.borderBottom = "2px solid #ff4d4d";
            } else {
        // Clear error if they do match
                errorMsg.style.display = "none";
                pass2.style.borderBottom = "2px solid var(--dark-teal)";
            }     
        });

