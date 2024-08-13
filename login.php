<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Sign-Up Page</title>
    <link rel="stylesheet" href="style.login.css">
</head>
<body>
    <header>
        <a href="homepage.html" class="homeicon">Home</a>
        <nav>
            <!-- <input type="checkbox" id="toggle">
            <label for="toggle" class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </label> -->
            <ul>
                <li><a href="feedback.html">Feedback</a></li>
                <li><a href="future_endavors.html">Future Goals</a></li>
                <li><a href="services.html">Services</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <?php
        include 'db.php'; // Include database connection file

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the form is for login or signup
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Call loginUser() function
                if (loginUser($email, $password)) {
                    echo "User logged in successfully";
                } else {
                    echo "Login failed";
                }
            } elseif (isset($_POST['signup'])) {
                $name = $_POST['name'];
                $location = $_POST['location'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Call signupUser() function
                if (signupUser($name, $location, $email, $password)) {
                    echo "User signed up successfully";
                } else {
                    echo "User signup failed";
                }
            }
        }
        ?>
        <section class="login">  
            <h1>Welcome Back</h1>
            <form>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button onclick="window.location.href = 'picture.html';" accesskey="Enter" type="submit">Login</button>
            </form>
        </section>
        <section class="signup">
            <h1>Hello Friend</h1>
            <form action="sign_up.php" method="post">
                <input type="text" placeholder="Name" required>
                <input type="text" placeholder="Location" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button onclick="window.location.href = 'picture.html';" accesskey="Enter" type="submit">Sign Up</button>
            </form>
        </section>
    </main>
    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            var Name = document.getElementById("Name").value;
            var Location = document.getElementById("Location").value;
            var Email = document.getElementById("Email").value;
            var Password = document.getElementById("Password").value;
            var error = document.getElementById("SignupError");

            // Perform client-side validation
            if (Name === "" || Location === "" || Email === "" || Password === "") {
                error.textContent = "All fields are required";
                event.preventDefault(); // Prevent form submission
            }
            // Add more validation rules as needed
        });
    </script>



</body>
</html>