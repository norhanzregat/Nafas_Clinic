<?php
// Doctor data (should be fetched from a database in real applications)
$doctor = [
  "name" => "Dr. Ahmad Al-Khatib",
  "specialty" => "Consultant Cardiologist",
  "email" => "ahmad.khatib@nafasclinic.com",
  "phone" => "+962 79 555 1234",
  "location" => "Amman, Jordan",
  "about" => "Dr. Ahmad Al-Khatib has over 15 years of experience in cardiology, focusing on preventive care and accurate diagnosis.",
  "avatar" => "https://randomuser.me/api/portraits/men/32.jpg",
  "experience" => [
    "Consultant Cardiologist - King Hussein Medical Center (2017-Present)",
    "Cardiology Specialist - Jordan University Hospital (2012-2017)",
    "Resident Doctor - Al Bashir Hospital (2008-2012)"
  ],
  "publications" => [
    "Study on Coronary Artery Diseases - Jordan Medical Journal, 2023",
    "Modern Techniques in Treating Cardiac Disorders - Health Magazine, 2021"
  ],
  "stats" => [
    "patients" => 320,
    "sessions" => 540,
    "upcoming" => 8
  ]
];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Doctor Profile | Nafas Clinic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6fb; }
    .profile-card { border-radius: 18px; box-shadow: 0 2px 12px #0001; }
    .avatar-lg { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #0d6efd; }
    .stats { font-size: 1.1rem; font-weight: 500; }
    .edit-btn { min-width: 120px; }
    .card-title { color: #0d6efd; }
    .list-unstyled li { margin-bottom: 8px; }
  </style>
</head>
<body>
<div class="container py-4">
  <!-- Header -->
  <div class="profile-card bg-white p-4 mb-4 d-flex align-items-center">
    <img src="<?= htmlspecialchars($doctor['avatar']) ?>" alt="Doctor" class="avatar-lg me-4 shadow">
    <div>
      <h2 class="fw-bold mb-1"><?= htmlspecialchars($doctor['name']) ?></h2>
      <div class="text-muted mb-1"><?= htmlspecialchars($doctor['specialty']) ?></div>
      <div class="text-muted small"><i class="fa-solid fa-envelope text-primary me-1"></i><?= htmlspecialchars($doctor['email']) ?></div>
    </div>
    <button class="btn btn-outline-primary ms-auto edit-btn" data-bs-toggle="modal" data-bs-target="#editModal">
      <i class="fa-solid fa-pen me-1"></i>Edit Profile
    </button>
  </div>

  <!-- Statistics -->
  <div class="row text-center mb-4">
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-user-doctor me-2 text-primary"></i><?= $doctor['stats']['patients'] ?> Patients</div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-calendar-check me-2 text-success"></i><?= $doctor['stats']['sessions'] ?> Sessions</div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card p-3">
        <div class="stats"><i class="fa-solid fa-clock me-2 text-warning"></i><?= $doctor['stats']['upcoming'] ?> Upcoming Appointments</div>
      </div>
    </div>
  </div>

  <!-- About & Contact Info -->
  <div class="row mb-4">
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-user me-2"></i>About the Doctor</h5>
        <p><?= htmlspecialchars($doctor['about']) ?></p>
      </div>
    </div>
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-address-book me-2"></i>Contact Information</h5>
        <ul class="list-unstyled mb-0">
          <li><i class="fa-solid fa-envelope me-2 text-primary"></i><?= htmlspecialchars($doctor['email']) ?></li>
          <li><i class="fa-solid fa-phone me-2 text-success"></i><?= htmlspecialchars($doctor['phone']) ?></li>
          <li><i class="fa-solid fa-map-marker-alt me-2 text-danger"></i><?= htmlspecialchars($doctor['location']) ?></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Experience & Publications -->
  <div class="row mb-4">
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-briefcase me-2"></i>Experience</h5>
        <ul class="mb-0">
          <?php foreach ($doctor['experience'] as $exp): ?>
            <li><?= htmlspecialchars($exp) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="col-md-6 mb-2">
      <div class="card p-3 h-100">
        <h5 class="card-title mb-2"><i class="fa-solid fa-book-open me-2"></i>Research & Publications</h5>
        <ul class="mb-0">
          <?php foreach ($doctor['publications'] as $pub): ?>
            <li><?= htmlspecialchars($pub) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal (UI only, no PHP processing) -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title">Edit Doctor Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($doctor['name']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Specialty</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($doctor['specialty']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= htmlspecialchars($doctor['email']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($doctor['phone']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($doctor['location']) ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Profile Image URL</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($doctor['avatar']) ?>">
          </div>
          <div class="col-12">
            <label class="form-label">About</label>
            <textarea class="form-control" rows="2"><?= htmlspecialchars($doctor['about']) ?></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Experience (one per line)</label>
            <textarea class="form-control" rows="2"><?= htmlspecialchars(implode("\n", $doctor['experience'])) ?></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Research & Publications (one per line)</label>
            <textarea class="form-control" rows="2"><?= htmlspecialchars(implode("\n", $doctor['publications'])) ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
