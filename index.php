<?php include 'header.php'; ?>

<!-- Hero Section -->
<div class="position-relative overflow-hidden mb-5">
  <div class="position-absolute w-100 h-100"
    style="background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 50%, #40916c 100%); z-index: -1;">
    <div class="position-absolute w-100 h-100"
      style="background-image: radial-gradient(circle at 20% 50%, rgba(149, 213, 178, 0.3) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(82, 183, 136, 0.3) 0%, transparent 50%); animation: pulse 4s ease-in-out infinite;">
    </div>
  </div>

  <div class="container py-5">
    <div class="row align-items-center min-vh-75 py-5">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="display-2 fw-bold text-white mb-4"
          style="text-shadow: 2px 4px 8px rgba(0,0,0,0.3); line-height: 1.2;">
          CCIS Week 2025
        </h1>
        <p class="lead text-white fs-3 mb-5" style="text-shadow: 1px 2px 4px rgba(0,0,0,0.3);">
          Forging Global Futures Through IT Innovation
        </p>

        <div class="d-flex flex-wrap gap-3 mb-4">
          <a href="pages/attendees.php"
            class="btn btn-light btn-lg px-5 py-3 fw-bold rounded-pill shadow-lg position-relative overflow-hidden"
            style="transition: all 0.3s ease;">
            <i class="bi bi-people-fill me-2"></i> View Attendees
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-success"
              style="transform: translateX(-100%); transition: transform 0.3s ease; z-index: -1;"></span>
          </a>
          <a href="pages/booths.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold rounded-pill shadow"
            style="border-width: 2px; backdrop-filter: blur(10px); background: rgba(255,255,255,0.1);">
            <i class="bi bi-shop me-2"></i> Explore Booths
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="position-relative">
          <!-- Main Featured Image with Parallax Effect -->
          <div class="position-relative rounded-5 overflow-hidden shadow-lg"
            style="transform: perspective(1000px) rotateY(-5deg); transition: transform 0.5s ease;">
            <a href="https://www.facebook.com/t3ch5cape">

              <img src="assets/img/hero.jpg" class="img-fluid w-100" alt="CCIS Week Main"
                style="height: 500px; object-fit: cover;">
            </a>
            <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white"
              style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
              <h4 class="fw-bold mb-1">T3CH5CAPE AT CCIS WEEK</h4>
              <p class="mb-0 small">December 9-13, 2025</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Decorative Wave at Bottom -->
  <div class="position-absolute bottom-0 w-100" style="z-index: 1;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#fff">
      <path
        d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z">
      </path>
    </svg>
  </div>
</div>

<style>

</style>

<!-- Quick Info Cards -->
<div class="container my-5 py-5">
  <div class="text-center mb-5">
    <h2 class="display-5 fw-bold text-success mb-3">Event Information</h2>
    <div class="mx-auto bg-success" style="width: 80px; height: 4px; border-radius: 2px;"></div>
  </div>

  <div class="row g-4">
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-lg rounded-4 h-100 hover-card">
        <div class="card-body text-center p-4">
          <div
            class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow"
            style="width: 80px; height: 80px;">
            <i class="bi bi-calendar-event fs-1"></i>
          </div>
          <h5 class="card-title text-success fw-bold mb-3">Event Date</h5>
          <p class="card-text fs-5 fw-bold text-dark mb-2">December 9 - 13, 2025</p>
          <p class="card-text text-muted">Join us for a week of innovation and growth</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-lg rounded-4 h-100 hover-card">
        <div class="card-body text-center p-4">
          <div
            class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow"
            style="width: 80px; height: 80px;">
            <i class="bi bi-geo-alt-fill fs-1"></i>
          </div>
          <h5 class="card-title text-success fw-bold mb-3">Venue</h5>
          <p class="card-text fs-5 fw-bold text-dark mb-2">PUP Main Building</p>
          <p class="card-text text-muted">Spacious halls and accessible facilities ideal for academic and organizational
            gatherings</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-12">
      <div class="card border-0 shadow-lg rounded-4 h-100 hover-card">
        <div class="card-body text-center p-4">
          <div
            class="bg-success bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow"
            style="width: 80px; height: 80px;">
            <i class="bi bi-stars fs-1"></i>
          </div>
          <h5 class="card-title text-success fw-bold mb-3">What to Expect</h5>
          <p class="card-text text-muted">Engaging activities designed for CCIS students: collaborative workshops,
            networking sessions, and showcases of technical and creative projects that foster innovation, teamwork, and
            community spirit.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>