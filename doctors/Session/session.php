<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Sessions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content p-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="fa-solid fa-calendar-days me-2 text-primary"></i>My Sessions</h2>
  </div>

  <!-- Filters & Search -->
  <div class="card mb-4">
    <div class="card-body d-flex flex-wrap gap-2 align-items-center">
      <input type="text" id="searchSessions" class="form-control flex-grow-1" placeholder="Search by patient name or email...">
      <select class="form-select w-auto" id="filterSessionType">
        <option value="all" selected>All Types</option>
        <option value="clinic">Clinic</option>
        <option value="video">Video Call</option>
      </select>
      <select class="form-select w-auto" id="filterSessionStatus">
        <option value="all" selected>All Status</option>
        <option value="scheduled">Scheduled</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
      </select>
    </div>
  </div>

  <!-- Sessions Table -->
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Patient</th>
              <th>Email</th>
              <th>Date & Time</th>
              <th>Type</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="sessionsTable">
            <!-- Rows will be dynamically populated -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Session Details Modal -->
<div class="modal fade" id="sessionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sessionModalTitle">Session Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="sessionModalBody">
        <!-- Session details populated by JS -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
// Sample data
const sessions = [
  {id:1, patient:'Mary Smith', email:'mary@example.com', datetime:'2025-08-27 03:00 PM', type:'video', status:'completed', notes:'CBT session – focus on anxiety', link:'https://meet.google.com/ehs-wios-oqj'},
  {id:2, patient:'John Doe', email:'john@example.com', datetime:'2025-08-30 10:00 AM', type:'clinic', status:'scheduled', notes:'General checkup, vitals assessment', link:''},
  {id:3, patient:'Ali Ahmed', email:'ali@example.com', datetime:'2025-08-25 11:00 AM', type:'clinic', status:'cancelled', notes:'Patient cancelled session', link:''},
  {id:4, patient:'Lina Haddad', email:'lina@example.com', datetime:'2025-08-28 02:00 PM', type:'video', status:'scheduled', notes:'Panic disorder – breathing techniques', link:'https://meet.google.com/ehs-wios-oqj'},
  {id:5, patient:'Omar Khalid', email:'omar@example.com', datetime:'2025-08-29 09:00 AM', type:'clinic', status:'completed', notes:'Behavioral activation review', link:''},
  {id:6, patient:'Sara Nabil', email:'sara@example.com', datetime:'2025-08-31 11:00 AM', type:'video', status:'scheduled', notes:'Depression follow-up', link:'https://meet.google.com/ehs-wios-oqj'},
  {id:7, patient:'Fadi Jaber', email:'fadi@example.com', datetime:'2025-08-26 01:00 PM', type:'clinic', status:'completed', notes:'Routine session', link:''},
  {id:8, patient:'Nadia Omar', email:'nadia@example.com', datetime:'2025-08-30 04:00 PM', type:'video', status:'scheduled', notes:'Therapy session', link:'https://meet.google.com/ehs-wios-oqj'},
  {id:9, patient:'Khaled Sami', email:'khaled@example.com', datetime:'2025-08-29 12:00 PM', type:'clinic', status:'completed', notes:'General assessment', link:''},
  {id:10, patient:'Hana Ali', email:'hana@example.com', datetime:'2025-08-31 03:00 PM', type:'video', status:'scheduled', notes:'Stress management', link:'https://meet.google.com/ehs-wios-oqj'}
];

const table = document.getElementById('sessionsTable');

function populateTable() {
  table.innerHTML = '';
  sessions.forEach(session => {
    const row = document.createElement('tr');
    row.dataset.type = session.type;
    row.dataset.status = session.status;
    row.innerHTML = `
      <td>${session.patient}</td>
      <td>${session.email}</td>
      <td>${session.datetime}</td>
      <td>${session.type.charAt(0).toUpperCase() + session.type.slice(1)}</td>
      <td>${session.status.charAt(0).toUpperCase() + session.status.slice(1)}</td>
      <td>
        <button class="btn btn-sm btn-info text-white me-1" onclick='viewSession(${JSON.stringify(session)})'><i class="fa-solid fa-eye"></i> View</button>
        ${session.type === 'video' ? `<a href="${session.link}" target="_blank" class="btn btn-sm btn-primary"><i class="fa-solid fa-video"></i> Join</a>` : ''}
      </td>
    `;
    table.appendChild(row);
  });
}

function viewSession(session) {
  const modalBody = document.getElementById('sessionModalBody');
  modalBody.innerHTML = `
    <p><strong>Patient:</strong> ${session.patient}</p>
    <p><strong>Email:</strong> ${session.email}</p>
    <p><strong>Date & Time:</strong> ${session.datetime}</p>
    <p><strong>Type:</strong> ${session.type.charAt(0).toUpperCase() + session.type.slice(1)}</p>
    <p><strong>Status:</strong> ${session.status.charAt(0).toUpperCase() + session.status.slice(1)}</p>
    <p><strong>Notes:</strong> ${session.notes}</p>
  `;
  const modal = new bootstrap.Modal(document.getElementById('sessionModal'));
  modal.show();
}

// Filtering
const searchInput = document.getElementById('searchSessions');
const filterType = document.getElementById('filterSessionType');
const filterStatus = document.getElementById('filterSessionStatus');

function filterSessions() {
  const text = searchInput.value.toLowerCase();
  const type = filterType.value;
  const status = filterStatus.value;

  Array.from(table.rows).forEach(row => {
    const patient = row.cells[0].textContent.toLowerCase();
    const email = row.cells[1].textContent.toLowerCase();
    const matchesText = patient.includes(text) || email.includes(text);
    const matchesType = type === 'all' || row.dataset.type === type;
    const matchesStatus = status === 'all' || row.dataset.status === status;
    row.style.display = matchesText && matchesType && matchesStatus ? '' : 'none';
  });
}

searchInput.addEventListener('input', filterSessions);
filterType.addEventListener('change', filterSessions);
filterStatus.addEventListener('change', filterSessions);

populateTable();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
