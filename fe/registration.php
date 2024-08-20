<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>LAU Computer Science Club Registration</title>

  <style>
    .custom-bg {
      background-color: #5087d6;
      /* Change this to your desired color */
    }
  </style>
</head>

<body class = "custom-bg">
  <section class="custom-bg p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
              <div class="col-12 d-flex align-items-center justify-content-center p-4">
                <div class="w-100">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-4">
                          <div class="text-center mb-3">
                            <a href="#!">
                              <img src="assets/img/cs_club_logo" alt="BootstrapBrain Logo" width="175" height="105">
                            </a>
                          </div>
                          <h4 class="text-center">Welcome to LAU Computer Science Club Official Website</h4>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <form action="../be/signup.php" method="POST">
                          <div class="row gy-3">
                            <div class="col-12 col-md-6">
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" required>
                                <label for="full_name" class="form-label">Full Name</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                <label for="email" class="form-label">Email</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <label for="password" class="form-label">Password</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" required>
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="tel" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" required>
                                <label for="mobile_number" class="form-label">Mobile Number</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" required>
                                <label for="nationality" class="form-label">Nationality</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="profession" id="profession" placeholder="Profession" required>
                                <label for="profession" class="form-label">Profession</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-grid">
                                <button class="btn btn-dark btn-lg" type="submit">Sign-up now</button>
                              </div>
                            </div>
                          </div>
                        </form>
                        <div class="row">
                          <div class="col-12 mt-4">
                            <div class="d-flex gap-2 flex-column flex-md-row justify-content-md-center">
                              <a href="login-page.php" class="link-primary text-decoration-none">Already have an account? Log in.</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</body>

</html>