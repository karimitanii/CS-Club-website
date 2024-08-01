<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>LAU Computer Science Club Registration</title>
  
</head>
<body>
  <section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
              <div class="col-12">
                <div class="hero-container" data-aos="fade-in">
                  <h1>Computer Science LAU</h1>
                  <h1>
                    We are 
                    <span class="typed" data-typed-items=" Innovating the Future. , Biggest Club. , The Best In Tech. , Innovation Itself.,Empowering the Next Generation of Innovators.,Coding The Future."></span>
  </h1>
                </div>
              </div>
              <div class="col-12 col-md-6 left-section">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="assets/img/ids-prog.png" alt="Welcome to LAU Computer Science Club">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <div class="text-center mb-4">
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
                        <div class="d-flex gap-3 flex-column">
                          <form action="#!">
                            <div class="row gy-3 overflow-hidden">
                              <div class="col-12">
                                <div class="form-floating mb-3">
                                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                  <label for="email" class="form-label">Email</label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-floating mb-3">
                                  <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                  <label for="password" class="form-label">Password</label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="d-grid">
                                  <button class="btn btn-dark btn-lg" type="submit">Log in now</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <div class="row">
                            <div class="col-12">
                              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                <a href="registration.php" class="link-secondary text-decoration-none">If you are new, click here to become a member</a>
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
    </div>
  </section>
  
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    AOS.init();
    document.addEventListener('DOMContentLoaded', function() {
      var typed = new Typed('.typed', {
        strings: document.querySelector('.typed').getAttribute('data-typed-items').split(','),
        typeSpeed: 70,
        backSpeed: 30,
        backDelay: 2000,
        loop: true
      });
    });
  </script>
</body>
</html>
