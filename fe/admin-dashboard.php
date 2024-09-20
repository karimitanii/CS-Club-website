<?php
include "../be/session.php";
include "../be/functions.php";



ensureLoggedIn();
$_SESSION['is_admin'] = true;


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

<body>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="assets/img/cs_club_logo.png" width="120" height="150" alt="BootstrapBrain Logo" class="img-fluid rounded-circle" />
        <h1 class="text-light"> Admin-Dashboard</h1>

      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li>
            <a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
          </li>

          <li>
            <a href="#leaderboard" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Leaderboard</span></a>
          </li>
          <li>
            <a href="#events" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Events</span></a>
          </li>
          <li>
            <a href="#delete-events" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Delete Events-Admin</span></a>
          </li>
          <li>
            <a href="#add-events" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Add Events-Admin</span></a>
          </li>
          <li>
            <a href="#users-registered" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Members registered for events</span></a>
          </li>
          <li>
            <a href="#attendance" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Event Attendance</span></a>
          </li>
          <li>
            <a href="#merch" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Merch</span></a>
          </li>
          <li>
            <a href="#delete-merch" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Delete Merch-Admin</span></a>
          </li>
          <li>
            <a href="#add-merch" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Add Merch-Admin</span></a>
          </li>
          <li>
            <a href="#testimonials" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span> Testimonials</span></a>
          </li>
          <li>
            <a href="#add-testimonial" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Add Testimonials-Admin</span></a>
          </li>
          <li>
            <a href="#delete-testimonial" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Delete Testimonials-Admin</span></a>
          </li>
          <li>
            <a href="#messages" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>View Messages-Admin </span></a>
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
        <span class="typed" data-typed-items=" Innovating the Future. , The Biggest Club. , The Best In Tech. , Innovation Itself.,Empowering the Next Generation.,Coding The Future."></span>
      </h1>
    </div>
  </section>


  <!-- End Hero -->


  <main id="main">



    <!-- leaderbaord rank Section -->


    <?php
    $topUsers = getTopUsers();
    ?>
    <section id="leaderboard" class="leaderboard section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Leaderboard</h2>
          <p>
            As an admin, you have full control over the leaderboard. Here, you can view the top-performing members of the LAU Computer Science Club based on event participation. The leaderboard is a reflection of our members' dedication and involvement in club activities. You can update the leaderboard as needed, manage user rankings, and ensure that all data is accurate and up-to-date.
            Feel free to view detailed statistics on each member, and recognize the efforts of our most active participants.


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
              $stmt = $pdo->prepare("SELECT * FROM events ORDER BY id ASC"); // Change query to order by id in ascending order
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





    <!-- delete events Section -->
    <section id="delete-events" class="events section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Delete An Event</h2>
          <p><strong>As an admin, you can also remove events for the LAU Computer Science Club.</strong> To remove an event just press on the image of the event you want to delete.</p>
        </div>
      </div>
    </section>

    <!-- Modal for event deletion -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this event?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDelete">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        let eventIdToDelete;

        const images = document.querySelectorAll('.event-img');
        const confirmDeleteButton = document.getElementById('confirmDelete');

        images.forEach(image => {
          image.addEventListener('click', function() {
            eventIdToDelete = this.dataset.eventId; // Store the event ID
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
          });
        });

        confirmDeleteButton.addEventListener('click', function() {
          if (eventIdToDelete) {
            // Redirect or send a request to delete the event
            window.location.href = `../be/admin/delete-event.php?id=${eventIdToDelete}`;
          }
        });
      });
    </script>
    <?php if (isset($_GET['event']) && $_GET['event'] === 'deleted') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
          document.getElementById('deleteModalLabel').textContent = 'Event Deleted';
          document.querySelector('.modal-body').textContent = 'The event was successfully deleted.';
          deleteModal.show();
        });
      </script>
    <?php endif; ?>




    <!-- end delete events Section -->


    <!-- add events Section -->
    <section id="add-events" class="events">
      <div class="container">
        <div class="section-title">
          <h2>Add New Event</h2>
          <p>As an admin, you can add new events for the LAU Computer Science Club. Fill out the form below to create an event.</p>
        </div>

        <form action="../be/admin/add-event.php" method="POST" class="form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="image">Event Image File Location:</label>
                <input type="text" id="image" name="image" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Event Description:</label>
            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
          </div>
          <br> <br>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add Event</button>
          </div>
        </form>
      </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="eventSuccessModal" tabindex="-1" aria-labelledby="eventSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eventSuccessModalLabel">Event Added</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The event was added successfully.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['event']) && $_GET['event'] === 'added') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Scroll to the add-events section
          document.getElementById('add-events').scrollIntoView({
            behavior: 'smooth'
          });

          // Show the modal after scrolling
          var eventSuccessModal = new bootstrap.Modal(document.getElementById('eventSuccessModal'));
          setTimeout(function() {
            eventSuccessModal.show();
          }, 500); // Add a slight delay to ensure the scroll is completed before showing the modal
        });
      </script>
    <?php endif; ?>



    <!-- end add events Section -->









    <!-- view users"members"-registred Section -->
    <section id="users-registered" class="events section-bg">
      <div class="container">
        <div class="section-title">
          <h2>View Members Registered for Events</h2>
          <p>
            As an admin, you have the ability to create and manage events for the LAU Computer Science Club. This section allows you to view the members who have registered for each event.
          </p>
        </div>

        <div class="container">
          <?php
          try {
            $pdo = getConnection();
            $stmt = $pdo->prepare("SELECT * FROM events ORDER BY id ASC");
            $stmt->execute();
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($events) {
              foreach ($events as $event) {
                echo '<div class="card mb-4">';
                echo '  <div class="card-header">';
                echo '      <h3>' . htmlspecialchars($event['title']) . '</h3>';
                echo '  </div>';
                echo '  <div class="card-body">';
                echo '      <p>' . htmlspecialchars($event['description']) . '</p>';

                // Decode the JSON data for registered users
                $usersRegistered = json_decode($event['users_registered'], true);

                if (!empty($usersRegistered)) {
                  echo '      <h5>Members Registered:</h5>';
                  echo '      <ul class="list-group">';
                  foreach ($usersRegistered as $user) {
                    echo '<li class="list-group-item">';
                    echo 'Memeber ID: ' . htmlspecialchars($user['user_id']) . '<br>';
                    echo 'Name: ' . htmlspecialchars($user['name']) . '<br>';
                    echo 'Email: ' . htmlspecialchars($user['email']) . '<br>';
                    echo 'Mobile: ' . htmlspecialchars($user['mobile']);
                    echo '</li>';
                  }
                  echo '      </ul>';
                } else {
                  echo '<p>No members have registered for this event yet.</p>';
                }

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
    </section>


    <!-- end  view users"members"-registred Section -->


    <!-- ======= Attendance Section ======= -->
    <section id="attendance" class="merch">
      <div class="container">
        <div class="section-title">
          <h2>Attendance</h2>
          <p>Record attendance for members registered in events. Select an event to view the registered members and check the ones who attended.</p>
        </div>

        <div class="container">
          <!-- Event Selection Dropdown -->
          <form id="eventSelectionForm" class="form">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="event_id">Select Event:</label>
                  <select id="event_id" name="event_id" class="form-control">
                    <option value="">--Select Event--</option>
                    <?php

                    try {

                      $pdo = getConnection();

                      $stmt = $pdo->prepare("SELECT id, title FROM events ORDER BY id ASC");

                      $stmt->execute();

                      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($events as $event) {

                        // Keep the selected event after the page reloads

                        $selected = (isset($_GET['event_id']) && $_GET['event_id'] == $event['id']) ? 'selected' : '';

                        echo "<option value='{$event['id']}' $selected>{$event['title']}</option>";
                      }
                    } catch (PDOException $e) {

                      echo '<option value="">Error loading events</option>';
                    }

                    ?>
                  </select>
                </div>
              </div>
            </div>
          </form>

          <!-- Search Bar -->
          <form id="searchMemberForm" method="GET" action="">
            <!-- Include the selected event ID as a hidden input -->
            <input type="hidden" id="selectedEventId" name="event_id" value="<?= isset($_GET['event_id']) ? htmlspecialchars($_GET['event_id']) : '' ?>">
            <div id="searchMemberContainer" style="display:block;">
              <br>
              <div class="form-group">
                <label for="searchMember">Search Member:</label>
                <input type="text" id="searchMember" name="searchMember" class="form-control" placeholder="Search by member name" value="<?= isset($_GET['searchMember']) ? htmlspecialchars($_GET['searchMember']) : '' ?>">
              </div>
              <br>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-secondary">Search</button>
              </div>
            </div>
          </form>


          <!-- Display Registered Members -->
          <div id="registeredMembers">
            <?php
            if (isset($_GET['event_id'])) {
              $eventId = intval($_GET['event_id']);
              $searchMember = isset($_GET['searchMember']) ? trim(strtolower($_GET['searchMember'])) : '';

              try {
                $stmt = $pdo->prepare("SELECT users_registered FROM events WHERE id = :event_id");
                $stmt->bindParam(':event_id', $eventId);
                $stmt->execute();
                $event = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($event && !empty($event['users_registered'])) {
                  $usersRegistered = json_decode($event['users_registered'], true);

                  // If a search term is provided, bring matching members to the top
                  if (!empty($searchMember)) {
                    usort($usersRegistered, function ($a, $b) use ($searchMember) {
                      $nameA = strtolower($a['name']);
                      $nameB = strtolower($b['name']);

                      if (strpos($nameA, $searchMember) !== false && strpos($nameB, $searchMember) === false) {
                        return -1; // $a goes before $b
                      } elseif (strpos($nameA, $searchMember) === false && strpos($nameB, $searchMember) !== false) {
                        return 1; // $b goes before $a
                      }
                      return 0;
                    });
                  }

                  // Display members
                  echo '<form id="attendanceForm" method="POST" action="../be/admin/record-attendance.php">';
                  echo '<input type="hidden" name="event_id" value="' . $eventId . '">';
                  foreach ($usersRegistered as $user) {
                    echo '<div class="card mb-4">';
                    echo '  <div class="card-header">';
                    echo '      <h3>' . htmlspecialchars($user['name']) . '</h3>';
                    echo '  </div>';
                    echo '  <div class="card-body">';
                    echo '      <p><strong>Email:</strong> ' . htmlspecialchars($user['email']) . '</p>';
                    echo '      <p><strong>Mobile:</strong> ' . htmlspecialchars($user['mobile']) . '</p>';
                    echo '      <p><strong>Attended:</strong> <input type="checkbox" name="attended[]" value="' . htmlspecialchars($user['user_id']) . '"></p>';
                    echo '  </div>';
                    echo '</div>';
                  }
                  echo '</form>';
                } else {
                  echo '<p>No members registered for this event.</p>';
                }
              } catch (PDOException $e) {
                echo '<p>Error retrieving members: ' . $e->getMessage() . '</p>';
              }
            }
            ?>
          </div>

          <br>
          <div class="form-group text-center">
            <button type="submit" form="attendanceForm" class="btn btn-primary" id="recordAttendanceBtn">Record Attendance</button>
          </div>

        </div>
      </div>
    </section>
    <!-- ======= End Attendance Section ======= -->


    <!-- Attendance Success Modal -->
    <div class="modal fade" id="attendanceSuccessModal" tabindex="-1" aria-labelledby="attendanceSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="attendanceSuccessModalLabel">Attendance Recorded</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The attendance for the members was successfully recorded.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['attendance']) && $_GET['attendance'] === 'success') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var attendanceSuccessModal = new bootstrap.Modal(document.getElementById('attendanceSuccessModal'));
          attendanceSuccessModal.show();
        });
      </script>
    <?php endif; ?>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const eventSelect = document.getElementById('event_id');
        const hiddenEventIdInput = document.getElementById('selectedEventId');

        // Update the hidden input whenever the event selection changes
        eventSelect.addEventListener('change', function() {
          hiddenEventIdInput.value = this.value;
        });

        // Existing event selection AJAX logic here...
        eventSelect.addEventListener('change', function() {
          var eventId = this.value;
          if (eventId) {
            fetchRegisteredMembers(eventId);
          } else {
            document.getElementById('registeredMembers').innerHTML = '';
            document.getElementById('recordAttendanceBtn').style.display = 'none';
            document.getElementById('searchMemberContainer').style.display = 'none';
          }
        });

        function fetchRegisteredMembers(eventId) {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', '../be/admin/get-registered-members.php?event_id=' + eventId, true);
          xhr.onload = function() {
            if (xhr.status === 200) {
              var response = xhr.responseText;
              document.getElementById('registeredMembers').innerHTML = response;
              document.getElementById('recordAttendanceBtn').style.display = 'block';
              document.getElementById('searchMemberContainer').style.display = 'block';
            } else {
              console.error('Error fetching members');
            }
          };
          xhr.send();
        }
      });
    </script>









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
              $stmt = $pdo->prepare("SELECT * FROM merch ORDER BY id ASC");
              $stmt->execute();
              $merchItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if ($merchItems) {
                foreach ($merchItems as $merch) {
                  echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app">';
                  echo '  <div class="portfolio-wrap">';
                  echo '    <img src="' . htmlspecialchars($merch['image']) . '" class="img-fluid merch-img" alt="' . htmlspecialchars($merch['title']) . '" onclick="confirmDeleteMerch(' . $merch['id'] . ')"/>';
                  echo '    <h4>' . htmlspecialchars($merch['title']) . '</h4>';
                  echo '    <p>' . htmlspecialchars($merch['description']) . '</p>';
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

    <!-- delete merch Section -->
    <section id="delete-merch" class="events">
      <div class="container">
        <div class="section-title">
          <h2>Delete Merch Item</h2>
          <p><strong>As an admin, you can also remove merch for the LAU Computer Science Club.</strong> To remove a Merch just press on the image of the merch you want to delete.</p>
        </div>
      </div>
    </section>

    <!-- Modal for merch deletion-->
    <div class="modal fade" id="deleteMerchModal" tabindex="-1" aria-labelledby="deleteMerchModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteMerchModalLabel">Delete Merchandise</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this merchandise item?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="deleteMerchForm" action="../be/admin/delete-merch.php" method="POST">
              <input type="hidden" name="merch_id" id="merch_id">
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      function confirmDeleteMerch(merchId) {
        document.getElementById('merch_id').value = merchId; // Set the merch_id in the hidden input
        var deleteMerchModal = new bootstrap.Modal(document.getElementById('deleteMerchModal'));
        deleteMerchModal.show();
      }
    </script>


    <!-- Success Deletion Modal -->
    <div class="modal fade" id="merchDeleteSuccessModal" tabindex="-1" aria-labelledby="merchDeleteSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="merchDeleteSuccessModalLabel">Merchandise Deleted</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The merchandise item was deleted successfully.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['deletion']) && $_GET['deletion'] === 'success') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Scroll to the merch section
          document.getElementById('merch').scrollIntoView({
            behavior: 'smooth'
          });

          // Show the modal after scrolling
          var merchDeleteSuccessModal = new bootstrap.Modal(document.getElementById('merchDeleteSuccessModal'));
          setTimeout(function() {
            merchDeleteSuccessModal.show();
          }, 500); // Add a slight delay to ensure the scroll is completed before showing the modal
        });
      </script>
    <?php endif; ?>



    <!-- end delete merch Section -->




    <!-- Add Merch Section -->
    <section id="add-merch" class="merch section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Add New Merchandise</h2>
          <p>As an admin, you can add new merchandise items to the LAU Computer Science Club store. Fill out the form below to create a new item.</p>
        </div>

        <form action="../be/admin/add-merch.php" method="POST" class="form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="image">Merchandise Image File Location:</label>
                <input type="text" id="image" name="image" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Merchandise Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Merchandise Description (e.g., Price):</label>
            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
          </div>
          <br><br>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add Merchandise</button>
          </div>
        </form>
      </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="merchSuccessModal" tabindex="-1" aria-labelledby="merchSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="merchSuccessModalLabel">Merchandise Added</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The merchandise item was added successfully.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['merch']) && $_GET['merch'] === 'added') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Scroll to the add-merch section
          document.getElementById('add-merch').scrollIntoView({
            behavior: 'smooth'
          });

          // Show the modal after scrolling
          var merchSuccessModal = new bootstrap.Modal(document.getElementById('merchSuccessModal'));
          setTimeout(function() {
            merchSuccessModal.show();
          }, 500); // Add a slight delay to ensure the scroll is completed before showing the modal
        });
      </script>
    <?php endif; ?>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
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

    <!-- Add Testimonial Section -->
    <section id="add-testimonial" class="testimonial section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Add New Testimonial</h2>
          <p>As an admin, you can add new testimonials for the LAU Computer Science Club. Fill out the form below to add a testimonial.</p>
        </div>

        <form action="../be/admin/add-testimonial.php" method="POST" class="form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="image">Image File Location:</label>
            <input type="text" id="image" name="image" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="testimonial">Testimonial:</label>
            <textarea id="testimonial" name="testimonial" class="form-control" rows="5" required></textarea>
          </div>
          <br><br>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add Testimonial</button>
          </div>
        </form>
      </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="testimonialSuccessModal" tabindex="-1" aria-labelledby="testimonialSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="testimonialSuccessModalLabel">Testimonial Added</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The testimonial was added successfully.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['testimonial']) && $_GET['testimonial'] === 'added') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Scroll to the add-testimonial section
          document.getElementById('add-testimonial').scrollIntoView({
            behavior: 'smooth'
          });

          // Show the modal after scrolling
          var testimonialSuccessModal = new bootstrap.Modal(document.getElementById('testimonialSuccessModal'));
          setTimeout(function() {
            testimonialSuccessModal.show();
          }, 500); // Add a slight delay to ensure the scroll is completed before showing the modal
        });
      </script>
    <?php endif; ?>

    <!-- end Add Testimonial Section -->


    <!-- delete Testimonial Section -->
    <section id="delete-testimonial" class="testimonials">
      <div class="container">
        <div class="section-title">
          <h2>Manage Testimonials</h2>
          <p>
            Here you can view and delete testimonials from the database. Each testimonial is displayed with a delete button that allows you to remove it.
          </p>
        </div>

        <div class="container">
          <?php
          try {
            $pdo = getConnection();
            $stmt = $pdo->prepare("SELECT * FROM testimonials ORDER BY id ASC");
            $stmt->execute();
            $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($testimonials) {
              foreach ($testimonials as $testimonial) {
                echo '<div class="card mb-4">';
                echo '  <div class="card-header">';
                echo '      <h3>' . htmlspecialchars($testimonial['name']) . '</h3>';
                echo '  </div>';
                echo '  <div class="card-body">';
                echo '      <p>' . htmlspecialchars($testimonial['test']) . '</p>';
                echo '      <p>From: ' . htmlspecialchars($testimonial['name']) . ' (' . htmlspecialchars($testimonial['position']) . ')</p>';
                echo '      <p><img src="' . htmlspecialchars($testimonial['image']) . '" class="testimonial-img" alt="' . htmlspecialchars($testimonial['name']) . '" /></p>';
                echo '  </div>';
                echo '  <div class="card-footer text-end">';
                echo '      <a href="../be/admin/delete-testimonial.php?id=' . intval($testimonial['id']) . '" class="btn btn-danger">Delete</a>';
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
      </div>
    </section>


    <?php if (isset($_GET['testimonial']) || isset($_GET['error'])) : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var message = '';
          var modalTitle = 'Manage Testimonials';

          <?php if ($_GET['testimonial'] === 'deleted') : ?>
            message = 'The testimonial was deleted successfully!';
          <?php elseif ($_GET['error'] === 'db_error') : ?>
            message = 'There was an error deleting the testimonial. Please try again later.';
          <?php else : ?>
            message = 'An unexpected error occurred. Please try again.';
          <?php endif; ?>

          var modalContent = `
            <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="testimonialModalLabel">` + modalTitle + `</h5>
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

          var testimonialModal = new bootstrap.Modal(document.getElementById('testimonialModal'));
          testimonialModal.show();
        });
      </script>
    <?php endif; ?>




    <!-- end delete Testimonial Section -->


    <!-- ======= Messages Section ======= -->
    <section id="messages" class="contact section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Messages</h2>
          <p>
            As an admin, you can view all the messages sent by users through the contact form. This section provides you with the details of each message, including the sender's name, email, subject, the content of their message, and the time the message was sent.
          </p>
        </div>

        <div class="container">
          <?php
          try {
            $pdo = getConnection();
            // Fetch only unread messages
            $stmt = $pdo->prepare("SELECT * FROM contactus WHERE markasread = 0 ORDER BY id ASC");
            $stmt->execute();
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($messages) {
              foreach ($messages as $message) {
                echo '<div class="card mb-4">';
                echo '  <div class="card-header">';
                echo '      <h3>Subject: ' . htmlspecialchars($message['subject']) . '</h3>';
                echo '      <small> <strong>Sent on: ' . htmlspecialchars($message['submitted_at']) . ' </strong></small>';
                echo '  </div>';
                echo '  <div class="card-body">';
                echo '      <p><strong>From:</strong> ' . htmlspecialchars($message['name']) . ' (' . htmlspecialchars($message['email']) . ')</p>';
                echo '      <p><strong>Message:</strong></p>';
                echo '      <p>' . nl2br(htmlspecialchars($message['message'])) . '</p>';
                echo '      <form method="POST" action="../be/admin/mark-message-read.php" class="text-end">';
                echo '          <input type="hidden" name="message_id" value="' . htmlspecialchars($message['id']) . '">';
                echo '          <button type="submit" class="btn btn-primary">Mark as Read</button>';
                echo '      </form>';
                echo '  </div>';
                echo '</div>';
              }
            } else {
              echo '<p>No unread messages found.</p>';
            }
          } catch (PDOException $e) {
            echo '<p>Error retrieving messages: ' . $e->getMessage() . '</p>';
          }
          ?>
        </div>
      </div>
    </section>
    <!-- End Messages Section -->

    <!-- Mark as Read Success Modal -->
    <div class="modal fade" id="markReadSuccessModal" tabindex="-1" aria-labelledby="markReadSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="markReadSuccessModalLabel">Success</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            The message was marked as read successfully.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (isset($_GET['messages']) && $_GET['messages'] === 'updated') : ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var markReadSuccessModal = new bootstrap.Modal(document.getElementById('markReadSuccessModal'));
          markReadSuccessModal.show();
        });
      </script>
    <?php endif; ?>



    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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





    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>