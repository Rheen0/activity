<?php
include 'db.php';
include 'header.php';

// Pagination setup
$per_page = 6;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $per_page;

// Get total count
$count_result = $conn->query("SELECT COUNT(*) as total FROM booths");
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $per_page);

// Get booths with pagination
$result = $conn->query("SELECT id, name, location, description, image, created_at FROM booths ORDER BY id ASC LIMIT $per_page OFFSET $offset");
?>

<!-- Page Header -->
<div class="bg-success bg-opacity-10 py-5 mb-5 rounded-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="d-flex align-items-center mb-3">
          <div>
            <h1 class="display-4 fw-bold text-success mb-0">CCIS Tech Organization Booths</h1>
            <p class="text-muted mb-0">Discover innovative organizations and technologies</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-lg-end">
        <div class="badge bg-success px-4 py-3 fs-5">
          <i class="bi bi-building me-2"></i><?= $total_rows ?> Booths
        </div>
        <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#addBoothModal">
          <i class="bi bi-plus-circle me-2"></i>Add Booth
        </button>

      </div>

    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="row g-4">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-lg h-100 hover-card">
            <div class="card-header bg-success bg-gradient text-white border-0 py-3">
              <h5 class="card-title mb-0 fw-bold">
                <i class="bi bi-shop-window me-2"></i><?= htmlspecialchars($row['name']) ?>
              </h5>
            </div>
            <div class="position-relative overflow-hidden">
              <img src="assets/img/booths/<?= htmlspecialchars($row['image']) ?>"
                alt="<?= htmlspecialchars($row['name']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            </div>
            <div class="card-body p-4">
              <div class="mb-3">
                <span class="badge bg-success bg-opacity-25 text-success px-3 py-2">
                  <i class="bi bi-geo-alt-fill me-1"></i><?= htmlspecialchars($row['location']) ?>
                </span>
              </div>
              <p class="card-text text-muted"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
            </div>
            <div class="card-footer bg-light border-0 py-3 d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-calendar-plus me-2"></i>
                Added <?= date('M d, Y', strtotime($row['created_at'])) ?>
              </small>

              <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteBoothModal"
                data-id="<?= $row['id'] ?>">
                <i class="bi bi-trash"></i>
              </button>
            </div>

          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="text-center py-5">
          <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
          <h4 class="text-muted">No booths available yet</h4>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Pagination -->
  <?php if ($total_pages > 1): ?>
    <nav aria-label="Booth pagination" class="mt-5">
      <ul class="pagination pagination-lg justify-content-center">
        <!-- Previous Button -->
        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
          <a class="page-link rounded-pill me-2" href="?page=<?= $page - 1 ?>" aria-label="Previous">
            <i class="bi bi-chevron-left"></i>
          </a>
        </li>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <?php if ($i == 1 || $i == $total_pages || ($i >= $page - 2 && $i <= $page + 2)): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
              <a class="page-link rounded-pill mx-1" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php elseif ($i == $page - 3 || $i == $page + 3): ?>
            <li class="page-item disabled">
              <span class="page-link border-0">...</span>
            </li>
          <?php endif; ?>
        <?php endfor; ?>

        <!-- Next Button -->
        <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
          <a class="page-link rounded-pill ms-2" href="?page=<?= $page + 1 ?>" aria-label="Next">
            <i class="bi bi-chevron-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  <?php endif; ?>
</div>
<?php include 'booths_modal.php' ?>
<?php include 'footer.php'; ?>