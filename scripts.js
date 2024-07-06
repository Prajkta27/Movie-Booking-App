// document.addEventListener('DOMContentLoaded', () => {
//     const registerForm = document.getElementById('registerForm');
//     const loginForm = document.getElementById('loginForm');
//     const bookForm = document.getElementById('bookForm');

//     if (registerForm) {
//         registerForm.addEventListener('submit', async (e) => {
//             e.preventDefault();
//             const name = document.getElementById('name').value;
//             const email = document.getElementById('email').value;
//             const password


document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const bookForm = document.getElementById('bookForm');

    // Registration form submission
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value; // Complete the variable declaration

            try {
                const response = await fetch('register.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ name, email, password })
                });
                const result = await response.json();
                if (result.success) {
                    alert('Registration successful!');
                } else {
                    alert('Registration failed: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    }

    // Login form submission
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            try {
                const response = await fetch('login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });
                const result = await response.json();
                if (result.success) {
                    alert('Login successful!');
                } else {
                    alert('Login failed: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    }

    // Booking form submission
    if (bookForm) {
        bookForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const user_id = document.getElementById('user_id').value;
            const movie_id = document.getElementById('movie_id').value;
            const seats = document.getElementById('seats').value;

            try {
                const response = await fetch('book.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ user_id, movie_id, seats })
                });
                const result = await response.json();
                if (result.success) {
                    alert('Booking successful!');
                } else {
                    alert('Booking failed: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    }
});
