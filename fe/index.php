<?php
include '../be/session.php';
include "../be/functions.php";

// Check if the logged-in user is an admin
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
  header("Location: admin-dashboard.php");
  exit;
}

ensureLoggedIn();

// Retrieve user data
$userData = getUserData($_SESSION['user_id']);
$userName = $userData['name'];
$email = $userData['email'];
$birthday = $userData['dob'];
$nationality = $userData['nationality'];
$mobile = $userData['mobile_number'];
$profession = $userData['profession'];
$eventsAttended = $userData['events_attended'];


$_SESSION['user_name'] = $userData['name'];
$_SESSION['email'] = $userData['email'];
$_SESSION['mobile_number'] = $userData['mobile_number']; // Store mobile number in session
$_SESSION['dob'] = $userData['dob'];
$_SESSION['nationality'] = $userData['nationality'];
$_SESSION['profession'] = $userData['profession'];
$_SESSION['events_attended'] = $userData['events_attended'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Computer Science Club LAU Webiste</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body id="top">
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="assets/img/cs_club_logo.png" width="120" height="150" alt="BootstrapBrain Logo" class="img-fluid rounded-circle" />
        <h1 class="text-light"><?php echo $userName; ?></h1>
        <div class="d-grid">
          <button class="btn btn-dark btn-lg" type="button" onclick="toggleEditProfile()">Edit Profile</button>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li>
            <a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
          </li>
          <li>
            <a href="#rank" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Rank</span></a>
          </li>
          <li>
            <a href="#leaderboard" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Leaderboard</span></a>
          </li>
          <li>
            <a href="#events" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Events</span></a>
          </li>
          <li>
            <a href="#merch" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Merch</span></a>
          </li>
          <li>
            <a href="#About-Us" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>About us</span></a>
          </li>
          <li>
            <a href="#testimonials" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Testimonials</span></a>
          </li>

          <li>
            <a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact us </span></a>
          </li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Computer Science Club-LAU</h1>
      <h1>
        We are
        <span class="typed" data-typed-items=" Innovating the Future. , The Biggest Club. , The Best In Tech. , Innovation Itself.,Next Generation.,Coding The Future."></span>
      </h1>
    </div>
  </section>


  <!-- End Hero -->



  <!-- rank section -->

  <main id="main">


    <!-- PHP block to define  values  -->
    <?php
    $rankDetails = calculateUserRank($eventsAttended);
    $currentRank = $rankDetails['currentRank'];
    $nextRank = $rankDetails['nextRank'];
    $eventsToNextRank = $rankDetails['eventsToNextRank'];

    $percentageProgress = calculateProgressPercentage($eventsAttended, $eventsToNextRank);
    $eventsRemaining = $eventsToNextRank - $eventsAttended;

    // Calculate age
    $age = calculateAge($birthday);


    ?>





    <section id="rank" class="rank">
      <div class="container">
        <div class="section-title">
          <h2>Welcome Back <?php echo $userName; ?>!</h2>
        </div>


        <div id="profileInfo" style="display: none;">
          <form id="editProfileForm" action="../be/edit-profile.php" method="POST">
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Birthday:</strong>
                    <span id="birthdayDisplay"><?php echo $birthday; ?></span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Age:</strong>
                    <span id="ageDisplay"><?php echo $age; ?></span>
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Nationality:</strong>
                    <span id="nationalityDisplay"><?php echo $nationality; ?></span>
                    <input type="text" id="nationalityInput" name="nationality" value="<?php echo $nationality; ?>" class="form-control" style="display: none;">
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Mobile Number:</strong>
                    <span id="mobileDisplay"><?php echo $mobile; ?></span>
                    <input type="text" id="mobileInput" name="mobile" value="<?php echo $mobile; ?>" class="form-control" style="display: none;">
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Email Address:</strong>
                    <span id="emailDisplay"><?php echo $email; ?></span>
                    <!-- Email is typically not editable -->
                  </li>
                  <li>
                    <i class="bi bi-chevron-right"></i>
                    <strong>Profession:</strong>
                    <span id="professionDisplay"><?php echo $profession; ?></span>
                    <input type="text" id="professionInput" name="profession" value="<?php echo $profession; ?>" class="form-control" style="display: none;">
                  </li>
                </ul>
              </div>
            </div>
            <div class="d-grid">
              <button class="btn btn-success btn-lg" type="button" onclick="saveChanges()">Save Changes</button>
            </div>
          </form>

        </div>


      </div>


      <!-- Profile Update Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalLabel">Profile Update</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="updateMessage">
              <!-- The message will be dynamically inserted here -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <?php if (isset($_GET['update'])) : ?>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
            var message = '';

            <?php if ($_GET['update'] === 'success') : ?>
              message = 'Profile updated successfully!';
            <?php elseif ($_GET['update'] === 'error') : ?>
              message = 'There was an error updating your profile. Please try again.';
            <?php endif; ?>

            document.getElementById('updateMessage').textContent = message;
            updateModal.show();
          });
        </script>
      <?php endif; ?>

      <div class="container">
        <div class="section-title">
          <h2>Current Rank</h2>
          <p>
            You are currently ranked as
            <?php echo $currentRank; ?>. Your dedication and participation in our club
            events have earned you this rank. Keep up the great work to unlock
            more achievements and exclusive perks. Check out your progress and
            see what’s next on your journey!
          </p>
        </div>

        <span class="skill">
          <?php if ($nextRank !== "Maxed Out") : ?>
            You have attended <?php echo $eventsAttended; ?> events, <?php echo $eventsRemaining; ?> more to go to reach <?php echo $nextRank; ?> rank!
          <?php else : ?>
            Congratulations! You have reached the highest rank with <?php echo $eventsAttended; ?> events attended. Keep up the great work!
          <?php endif; ?>
        </span>

        <div class="row rank-progress-bar-content">
          <div class="col-lg-9 d-flex align-items-center" data-aos="fade-up">
            <div class="image-left">
              <img src="assets/img/ranks/<?php echo strtolower($currentRank); ?>-rank.png" alt="Current Rank" class="img-fluid">
            </div>

            <div class="rank mx-3 flex-grow-1">
              <div class="progress-bar-wrap">
                <div class="progress-bar" id="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" <?php if ($nextRank === null) : ?> style="width: 100%;" <?php endif; ?>></div>
              </div>
            </div>

            <?php if ($nextRank !== "Maxed Out") : ?>
              <div class="image-right">
                <img src="assets/img/ranks/<?php echo strtolower($nextRank); ?>-rank.png" alt="Next Rank" class="img-fluid">
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="d-grid">
          <button class="btn btn-dark btn-lg" type="button" onclick="toggleRanking()">See How Ranking Works!</button>
        </div>
      </div>




      <div class="container">
        <section id="howRankingWorks" style="display: none;">
          <div class="section-title">
            <h2>Rank</h2>
            <h3>How Ranking Works?</h3>
            <p>
              At the LAU Computer Science Club, we believe in recognizing and
              celebrating our members' active participation and commitment. Our
              ranking system is designed to encourage engagement and reward
              those who contribute most to our community.
            </p>
            <p><strong>How It Works:</strong></p>
            <ul>
              <li><strong>Event Attendance:</strong> Members earn points for attending and participating in club events, workshops, and seminars.</li>
              <li><strong>Rank Progression:</strong> As members accumulate points, their ranks rise, unlocking special titles and recognition within the club.</li>
              <li><strong>Recognition:</strong> Higher ranks come with additional perks, such as exclusive access to advanced events, leadership opportunities, and more.</li>
            </ul>
            <p>
              By participating in our events and activities, you not only enhance your skills and knowledge but also climb the ranks and earn well-deserved recognition. Join us in making the most of our vibrant community and see how far you can go!
            </p>
          </div>

          <div class="row no-gutters">
            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
              <div class="count-box">
                <img src="assets/img/ranks/bronze-rank.png" class="img-fluid">
                <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter" style="font-weight: bold; font-size: 1.5em;"></span>
                <p><strong>Bronze Participated in 5 events or activities</strong></p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="count-box">
                <img src="assets/img/ranks/silver-rank.png" class="img-fluid">
                <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1.5" class="purecounter" style="font-weight: bold; font-size: 1.5em;"></span>
                <p><strong>Silver Participated in 10 events or activities</strong></p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="count-box">
                <img src="assets/img/ranks/gold-rank.png" class="img-fluid">
                <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1.75" class="purecounter" style="font-weight: bold; font-size: 1.5em;"></span>
                <p><strong>Gold Participated in 20 events or activities</strong></p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
              <div class="count-box">
                <img src="assets/img/ranks/platinum-rank.png" class="img-fluid">
                <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1.5" class="purecounter" style="font-weight: bold; font-size: 1.5em;"></span>
                <p><strong>Platinum Participated in 30 events or activities</strong></p>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <button class="btn btn-dark btn-lg" type="button" onclick="toggleRanking()">Close</button>
          </div>
        </section>
      </div>
    </section>
    </div>


    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var progressBar = document.getElementById('progressBar');
        setTimeout(function() {
          progressBar.style.width = "<?php echo $percentageProgress; ?>%";
          progressBar.setAttribute('aria-valuenow', "<?php echo $percentageProgress; ?>");
        }, 500); // Delay for visibility, can be adjusted
      });


      function toggleInputs(enable) {
        const editableInputs = ['nationalityInput', 'mobileInput', 'professionInput'];
        const inputs = document.querySelectorAll('#profileInfo input');
        const spans = document.querySelectorAll('#profileInfo span');

        // Toggle visibility of input fields
        inputs.forEach(input => {
          if (editableInputs.includes(input.id)) {
            input.style.display = enable ? 'block' : 'none';
          }
        });

        // Toggle visibility of display values
        spans.forEach(span => {
          const inputId = span.id.replace('Display', 'Input');
          if (editableInputs.includes(inputId)) {
            span.style.display = enable ? 'none' : 'block';
          } else if (span.id === 'birthdayDisplay' || span.id === 'ageDisplay' || span.id === 'emailDisplay') {
            span.style.display = 'block'; // Always display these
          }
        });
      }



      function toggleRanking() {
        var rankingSection = document.getElementById('howRankingWorks');
        var rankingButton = document.querySelector('button[onclick="toggleRanking()"]');

        if (rankingSection.style.display === 'none' || rankingSection.style.display === '') {
          rankingSection.style.display = 'block';
          rankingSection.style.opacity = 0;
          setTimeout(() => rankingSection.style.opacity = 1, 10); // Smooth fade-in effect
          rankingButton.style.display = 'none'; // Hide the "See How Ranking Works!" button
        } else {
          rankingSection.style.opacity = 0;
          setTimeout(() => {
            rankingSection.style.display = 'none';
            rankingButton.style.display = 'block'; // Show the "See How Ranking Works!" button
          }, 0); // Smooth fade-out effect
        }
      }

      function toggleEditProfile() {
        var profileInfo = document.getElementById('profileInfo');
        var editProfileButton = document.querySelector('button[onclick="toggleEditProfile()"]');

        if (profileInfo.style.display === 'none' || profileInfo.style.display === '') {
          profileInfo.style.display = 'block';
          profileInfo.style.opacity = 0;
          setTimeout(() => profileInfo.style.opacity = 1, 10); // Smooth fade-in effect
          toggleInputs(true);
          editProfileButton.style.display = 'none'; // Hide the edit button

          // Scroll to the profile section smoothly
          profileInfo.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        } else {
          profileInfo.style.opacity = 0;
          setTimeout(() => {
            profileInfo.style.display = 'none';
            editProfileButton.style.display = 'block'; // Show the edit button
          }, 300); // Smooth fade-out effect (delayed to match the fade-out duration)
        }
      }

      function saveChanges() {
        // Update the display values with the input values
        document.getElementById('nationalityDisplay').innerText = document.getElementById('nationalityInput').value;
        document.getElementById('mobileDisplay').innerText = document.getElementById('mobileInput').value;
        document.getElementById('professionDisplay').innerText = document.getElementById('professionInput').value;

        // Optionally, submit the form to the server here if the data needs to be saved
        document.getElementById('editProfileForm').submit();

        // Hide the inputs and show the display values
        toggleInputs(false);
        toggleEditProfile(); // Close the profile edit section and show the edit button
      }
    </script>



    <!-- End rank Section -->



    <!-- leaderbaord rank Section -->


    <?php
    $topUsers = getTopUsers();
    ?>
    <section id="leaderboard" class="leaderboard section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Leaderboard</h2>
          <p>
            See how you stack up against other members of the LAU Computer Science Club! The leaderboard showcases the top 10 most active members, their achievements, and current ranks.
          </p>
        </div>

        <div class="table-responsive">
          <table class="table leaderboard-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Events Attended</th>
                <th scope="col">Rank</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($topUsers as $index => $user) : ?>
                <?php
                // Calculate user rank based on events attended
                $rankInfo = calculateUserRank($user['events_attended']);
                ?>
                <tr>
                  <th scope="row"><?php echo $index + 1; ?></th>
                  <td><?php echo htmlspecialchars($user['name']); ?></td>
                  <td><?php echo $user['events_attended']; ?></td>
                  <td><img src="assets/img/ranks/<?php echo strtolower($rankInfo['currentRank']); ?>-rank.png" alt="<?php echo $rankInfo['currentRank']; ?> Rank" class="rank-img"></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>








    <!-- End leaderbaord rank Section -->


    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container">
        <div class="section-title">
          <h2>Events</h2>
          <p>
            Join us for exciting events at the LAU Computer Science Club! Our events include workshops, seminars, hackathons, and networking opportunities designed to enhance your skills and connect you with industry professionals. Stay engaged, learn new technologies, and collaborate with fellow members. Don’t miss out on our upcoming events – be a part of our vibrant community and take your passion for computer science to the next level!
          </p>
        </div>

        <!-- Event Images -->
        <div class="container">
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            <?php
            try {
              $pdo = getConnection();
              $stmt = $pdo->prepare("SELECT * FROM events ORDER BY id ASC");
              $stmt->execute();
              $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if ($events) {
                foreach ($events as $event) {
                  echo '<div class="col-lg-6 col-md-6 portfolio-item filter-app">';
                  echo '  <div class="portfolio-wrap events-item">';
                  echo '    <img src="' . htmlspecialchars($event['image']) . '" class="img-fluid event-img" alt="' . htmlspecialchars($event['title']) . '" data-event-id="' . $event['id'] . '" />';
                  echo '    <h4>' . htmlspecialchars($event['title']) . '</h4>';
                  echo '    <p>' . htmlspecialchars($event['description']) . '</p>';
                  echo '  </div>';
                  echo '</div>';
                }
              } else {
                echo '<p>No events found.</p>';
              }
            } catch (PDOException $e) {
              echo '<p>Error retrieving events: ' . $e->getMessage() . '</p>';
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- End Events Section -->


    <!-- Modal for registration -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">Event Registration</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to register for this event?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="confirmRegister">Yes, Register</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        let selectedEventId = null;

        document.querySelectorAll('.event-img').forEach(image => {
          image.addEventListener('click', function() {
            selectedEventId = this.getAttribute('data-event-id');
            const modal = new bootstrap.Modal(document.getElementById('registerModal'));
            modal.show();
          });
        });

        document.getElementById('confirmRegister').addEventListener('click', function() {
          if (selectedEventId) {
            window.location.href = `../be/register-event.php?event_id=${selectedEventId}`;
          }
        });
      });
    </script>

    <!-- Registration Success Modal -->
    <div class="modal fade" id="registrationSuccessModal" tabindex="-1" aria-labelledby="registrationSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registrationSuccessModalLabel">Registration Successful</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            You have successfully registered for the event!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Check for the registration success and trigger the modal -->
    <?php if (isset($_GET['registration']) && $_GET['registration'] === 'success') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var registrationModal = new bootstrap.Modal(document.getElementById('registrationSuccessModal'));
          registrationModal.show();
        });
      </script>
    <?php endif; ?>

    <?php if (isset($_GET['registration']) && $_GET['registration'] === 'already_registered') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var message = 'You are already registered for this event.';
          var modalTitle = 'Already Registered';

          var modalContent = `
                <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registrationModalLabel">` + modalTitle + `</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">` + message + `</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

          document.body.insertAdjacentHTML('beforeend', modalContent);

          var registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
          registrationModal.show();
        });
      </script>
    <?php endif; ?>




    <!-- ======= merch Section ======= -->
    <section id="merch" class="merch section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Merch</h2>
          <p>Show your pride and support for the LAU Computer Science Club with our exclusive merchandise! Our collection features a variety of high-quality items including t-shirts, hoodies, mugs, and accessories. Whether you’re looking to represent the club at events or simply want to enjoy some stylish and practical gear, we have something for everyone. Each purchase helps support our activities and events, allowing us to continue providing valuable experiences for our members. Browse our merch today and wear your club spirit with pride!</p>
        </div>

        <div class="container">
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center"></div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            <?php
            try {
              $pdo = getConnection();
              $stmt = $pdo->prepare("SELECT * FROM merch ORDER BY id ASC"); // Fetch merch items in ascending order by ID
              $stmt->execute();
              $merchItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if ($merchItems) {
                foreach ($merchItems as $merch) {
                  echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app">';
                  echo '  <div class="portfolio-wrap">';
                  echo '    <img src="' . htmlspecialchars($merch['image']) . '" class="img-fluid merch-img" alt="' . htmlspecialchars($merch['title']) . '" />';
                  echo '    <h4>' . htmlspecialchars($merch['title']) . '</h4>';
                  echo '    <p>' . htmlspecialchars($merch['description']) . '</p>'; // Displaying the description as price
                  echo '  </div>';
                  echo '</div>';
                }
              } else {
                echo '<p>No merchandise found.</p>';
              }
            } catch (PDOException $e) {
              echo '<p>Error retrieving merchandise: ' . $e->getMessage() . '</p>';
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- End merch Section -->





    <!-- ======= About Us Section ======= -->
    <section id="About-Us" class="about-us">
      <div class="container">
        <div class="section-title">
          <h2>About Us</h2>
          <p>
            The Computer Science Club at LAU is dedicated to fostering a community of tech enthusiasts. Whether you’re just starting out or are an experienced coder, we have something for everyone.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-laptop"></i></div>
            <h4 class="title"><a href="">Coding Workshops</a></h4>
            <p class="description">
              Participate in hands-on coding workshops where you can learn new programming languages, frameworks, and tools from peers and industry professionals.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-gear"></i></div>
            <h4 class="title"><a href="">Hackathons</a></h4>
            <p class="description">
              Challenge yourself in our hackathons, where you can collaborate on projects, solve complex problems, and build innovative software solutions.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-people"></i></div>
            <h4 class="title"><a href="">Networking Events</a></h4>
            <p class="description">
              Expand your network by connecting with like-minded students, alumni, and industry experts through our networking events and seminars.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-brush"></i></div>
            <h4 class="title"><a href="">Project Showcases</a></h4>
            <p class="description">
              Showcase your personal and collaborative projects, receive feedback, and inspire others by presenting your work during our project showcase events.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-trophy"></i></div>
            <h4 class="title"><a href="">Competitions</a></h4>
            <p class="description">
              Compete in programming contests and challenges that test your skills and provide an opportunity to win prizes and recognition.
            </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="bi bi-book"></i></div>
            <h4 class="title"><a href="">Educational Resources</a></h4>
            <p class="description">
              Access a variety of resources, including study groups, tutorials, and mentoring sessions, designed to help you excel in your computer science courses.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Us Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Testimonials</h2>
          <p>
            What Our Members Say At the LAU Computer Science Club, our members
            are our greatest asset. Discover firsthand accounts of how being
            part of our club has impacted their academic and professional
            journeys. From hands-on projects and collaborative learning to
            networking opportunities and career guidance, our members share
            their experiences and achievements. Read their stories to
            understand how our community fosters growth, innovation, and
            success in the field of computer science.
          </p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
            try {
              $pdo = getConnection();
              $stmt = $pdo->prepare("SELECT * FROM testimonials ORDER BY id ASC");
              $stmt->execute();
              $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if ($testimonials) {
                foreach ($testimonials as $testimonial) {
                  echo '<div class="swiper-slide">';
                  echo '  <div class="testimonial-item" data-aos="fade-up">';
                  echo '    <p>';
                  echo '      <i class="bx bxs-quote-alt-left quote-icon-left"></i>';
                  echo        htmlspecialchars($testimonial['test']);
                  echo '      <i class="bx bxs-quote-alt-right quote-icon-right"></i>';
                  echo '    </p>';
                  echo '    <img src="' . htmlspecialchars($testimonial['image']) . '" class="testimonial-img" alt="' . htmlspecialchars($testimonial['name']) . '" />';
                  echo '    <h3>' . htmlspecialchars($testimonial['name']) . '</h3>';
                  echo '    <h4>' . htmlspecialchars($testimonial['position']) . '</h4>';
                  echo '  </div>';
                  echo '</div>';
                }
              } else {
                echo '<p>No testimonials found.</p>';
              }
            } catch (PDOException $e) {
              echo '<p>Error retrieving testimonials: ' . $e->getMessage() . '</p>';
            }
            ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Testimonials Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Contact Us !</h2>
          <p>
            We’d love to hear from you! Whether you have questions about our
            club, want to join our community, or just want to learn more about
            our activities and events, don’t hesitate to reach out. Our team
            is here to assist you and provide any information you need. You
            can contact us through the form below!
          </p>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>LAU University, Beirut Campus</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>lau-cs-club@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+961 92 75 7742</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d827.9673734269076!2d35.477196428568405!3d33.893014798319086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f10cdf86989f9%3A0x920ea62c8299d366!2sLebanese%20American%20University!5e0!3m2!1sen!2slb!4v1722547251491!5m2!1sen!2slb" frameborder="0" style="border: 0; width: 100%; height: 290px" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="../be/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars($userName); ?>" readonly />
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required />
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Your message has been sent. Thank you!
                </div>
              </div>
              <div class="text-center">
                <button type="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- End Contact Section -->
    <!-- modal Contact Section -->
    <?php if (isset($_GET['contact']) && $_GET['contact'] === 'success') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Create the modal content
          var modalContent = `
                <div class="modal fade" id="contactSuccessModal" tabindex="-1" aria-labelledby="contactSuccessModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactSuccessModalLabel">Message Sent</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Your message has been sent successfully! Thank you for reaching out to us.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

          // Insert the modal into the body
          document.body.insertAdjacentHTML('beforeend', modalContent);

          // Show the modal
          var contactSuccessModal = new bootstrap.Modal(document.getElementById('contactSuccessModal'));
          contactSuccessModal.show();
        });
      </script>
    <?php endif; ?>




    <!-- End #main -->

    <a href="#top" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      document.querySelector('.back-to-top').addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    </script>




    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>