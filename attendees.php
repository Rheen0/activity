<?php
include 'db.php';
include 'header.php';


$per_page = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $per_page;

$count_result = $conn->query("SELECT COUNT(*) as total FROM attendees");
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $per_page);
$total_pages = ceil($total_rows / $per_page);

$stmt = $conn->prepare("SELECT * FROM attendees ORDER BY id DESC LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Page Header -->
<div class="bg-success bg-opacity-10 py-5 mb-5 rounded-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="d-flex align-items-center mb-3">
          <div>
            <h1 class="display-4 fw-bold text-success mb-0">Event Attendees</h1>
            <p class="text-muted mb-0">Registered participants for CCIS Week 2025</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-lg-end">
        <div class="badge bg-success px-4 py-3 fs-5 mb-2 d-inline-block">
          <i class="bi bi-person-check-fill me-2"></i><?= $total_rows ?> Registered
        </div>
        <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#addAttendeeModal">
          <i class="bi bi-plus-circle me-2"></i>Add Attendee
        </button>
      </div>
    </div>
  </div>
</div>

<div class="container mb-5">
  <!-- Attendees Table -->
  <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-header bg-success text-white py-3">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-list-ul me-2"></i>Attendee List</h5>
        <span class="badge bg-white text-success">Page <?= $page ?> of <?= $total_pages ?></span>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th class="py-3 ps-4"><i class="bi bi-person me-2 text-success"></i>Name</th>
              <th class="py-3"><i class="bi bi-envelope me-2 text-success"></i>Email</th>
              <th class="py-3"><i class="bi bi-ticket-perforated me-2 text-success"></i>Ticket Type</th>
              <th class="py-3"><i class="bi bi-calendar-check me-2 text-success"></i>Registered</th>
              <th class="py-3 text-center"><i class="bi bi-gear me-2 text-success"></i>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td class="py-3 ps-4 fw-semibold"><?= htmlspecialchars($row['name']) ?></td>
                  <td class="py-3 text-muted"><?= htmlspecialchars($row['email']) ?></td>
                  <td class="py-3">
                    <span class="badge bg-success bg-opacity-25 text-success px-3 py-2">
                      <?= htmlspecialchars($row['ticket_type']) ?>
                    </span>
                  </td>
                  <td class="py-3 text-muted"><?= date('M d, Y', strtotime($row['created_at'])) ?></td>
                  <td class="py-3 text-center">
                    <button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal"
                      data-bs-target="#editAttendeeModal" data-id="<?= $row['id'] ?>"
                      data-name="<?= htmlspecialchars($row['name']) ?>" data-email="<?= htmlspecialchars($row['email']) ?>"
                      data-ticket="<?= htmlspecialchars($row['ticket_type']) ?>">
                      <i class="bi bi-pencil"></i>
                    </button>

                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                      data-bs-target="#deleteAttendeeModal" data-id="<?= $row['id'] ?>">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center py-5 text-muted">
                  <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                  No attendees registered yet
                </td>
              </tr>
            <?php endif; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <?php if ($total_pages > 1): ?>
    <nav aria-label="Attendee pagination" class="mt-4">
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

<?php include 'attendees_modal.php' ?>
<?php include 'footer.php'; ?>