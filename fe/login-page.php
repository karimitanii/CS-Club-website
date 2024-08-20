<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>LAU Computer Science Club Log in</title>

  <style>
    .custom-bg {
      background-color: #5087d6;
      /* Change this to your desired color */
    }

    .login-card {
      max-width: 600px; /* Increased max-width to make the box bigger */
      margin: auto;
      padding: 30px; /* Optional: Add some padding inside the card */
    }
  </style>
</head>

<body class="custom-bg">
  <section class="custom-bg p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card border-light-subtle shadow-sm login-card">
            <div class="card-body p-4">
              <div class="text-center mb-3">
                <a href="#!">
                  <img src="assets/img/cs_club_logo.png" alt="CS Club Logo" width="175" height="105">
                </a>
              </div>
              <h4 class="text-center">Welcome to LAU Computer Science Club Official Website</h4>
              <form action="../be/login.php" method="POST">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-dark btn-lg" type="submit">Log in now</button>
                  </div>
            </form>

              <div class="mt-4 text-center">
                <a href="registration.php" class="link-primary text-decoration-none">Don't have an account? Sign Up.</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="errorMessage">An error occurred. Please try again.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const urlParams = new URLSearchParams(window.location.search);
      const error = urlParams.get('error');

      if (error) {
        let errorMessage = "";

        if (error === "incorrect_password") {
          errorMessage = "The password you entered is incorrect. Please try again.";
        } else if (error === "user_not_found") {
          errorMessage = "No account found with this email. Please check your email or sign up.";
        } else {
          errorMessage = "An unknown error occurred. Please try again.";
        }

        document.getElementById('errorMessage').textContent = errorMessage;
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</body>

</html>
