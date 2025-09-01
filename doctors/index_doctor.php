<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Doctor Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1"></script>
  <link rel="stylesheet" href="style.css">


</head>

<body>
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="brand mb-3">
      <div class="logo"><i class="fa-solid fa-stethoscope"></i></div>
      <div>
        <div class="fw-bold">E-Doc Clinic {name}</div>
        <small class="text-secondary">Doctor Porta {...}</small>
      </div>
    </div>

    <!-- Profile -->
    <div class="d-flex align-items-center gap-3 mb-3">
      <label for="profileImageInput" class="pointer" title="Update profile picture">
        <img id="profileImage" class="avatar primary border border-primary" src="" alt="Doctor" />
      </label>
      <input type="file" id="profileImageInput" accept="image/*" hidden />
      <div class="flex-fill">
        <div class="fw-semibold" id="doctorName">Doctor Name</div>
        <small class="muted" id="doctorEmail">doctor@edoc.com</small>
      </div>
      <div class="dropstart">
        <button class="btn btn-sm btn-light-subtle border" data-bs-toggle="dropdown"><i
            class="fa-solid fa-ellipsis"></i></button>
        <ul class="dropdown-menu">
          <li><button class="dropdown-item" id="btnProfile">Profile & Settings</button></li>
          <li><button class="dropdown-item" id="btnSecurity">Security</button></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item text-danger" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>

    <!-- Menu -->
    <nav class="menu d-grid gap-1 p-2">
      <a href="index_doctor.php" class="active"><i class="fa-solid fa-gauge"></i><span> Dashboard</span></a>
      <a href="../doctors/appointments/appointments.php"><i class="fa-solid fa-user-doctor"></i> My Appointments</a>
      <a href="../doctors/Session/Session.php"><i class="fa-solid fa-calendar-days"></i> My Sessions</a>
      <a href="../doctors/patients/index_patients.php"><i class="fa-solid fa-hospital-user"></i> My Patients</a>
      <a href="../doctors/patients/index_patients.php"><i class="fa-solid fa-gear"></i> Settings</a>
      <a href="../doctors/massege/massege.php"><i class="fa-solid fa-message"></i> Messages</a>
      <a href="notifications.php"><i class="fa-solid fa-bell"></i> Notifications</a>
      <a href="reports.php"><i class="fa-solid fa-chart-line"></i> Reports</a>
      <a href="../doctors/profile_doctor/profile.php"><i class="fa-solid fa-user"></i> Profile</a>
      <a href="help.php"><i class="fa-solid fa-circle-question"></i> Help</a>
    </nav>


    <hr>

    <!-- Theme toggle -->
    <div class="d-flex align-items-center justify-content-between">
      <span class="muted">Dark mode</span>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="themeSwitch">
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">
    <!-- Topbar -->
    <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
      <form class="searchbox flex-grow-1" role="search" onsubmit="event.preventDefault()">
        <div class="input-group">
          <span class="input-group-text bg-primary border-end-0 shadow-sm"
            style="color: #fff; box-shadow: 0 0 8px 2px rgba(13,110,253,0.3);">
            <i class="fa-solid fa-magnifying-glass" style="filter: drop-shadow(0 0 4px #0d6efd);"></i>
          </span>
          <input id="searchInput" type="search" class="form-control border-start-0"
            placeholder="Search patients, appointments, notes…">
        </div>
      </form>
      <div class="dropdown me-1">
        <button class="btn btn-outline-secondary position-relative" data-bs-toggle="dropdown" id="notifBtn">
          <i class="fa-solid fa-bell"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
            id="notifCount">0</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 360px;">
          <div class="p-3 border-bottom d-flex align-items-center justify-content-between">
            <strong>Notifications</strong>
            <button class="btn btn-sm btn-link" id="markAllRead">Mark all as read</button>
          </div>
          <div id="notifList" class="list-group list-group-flush" style="max-height: 380px; overflow:auto"></div>
          <div class="p-2 text-center"><a href="notifications.php" class="small">View all</a></div>
        </div>
      </div>
      <button class="btn btn-primary" id="btnNewAppointment"><i class="fa-solid fa-calendar-plus me-1"></i>New
        Appointment</button>
    </div>

    <!-- Header -->
    <div class="card-soft p-4 mb-3">
      <h2 class="h4" id="welcomeTitle">Welcome, Doctor</h2>
      <p class="mb-0 text-secondary">Manage appointments, review patient information, and track your schedule.
      </p>
    </div>

    <!-- Stats -->
    <div class="row g-3 mb-3" id="statsRow">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="fa-solid fa-user-check"></i></div>
          <div>
            <div class="h4 mb-0" id="statPatientsToday">0</div>
            <small class="muted">Patients today</small>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="fa-solid fa-calendar-alt"></i></div>
          <div>
            <div class="h4 mb-0" id="statSessionCount">0</div>
            <small class="muted">Session schedule</small>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="fa-solid fa-chart-line"></i></div>
          <div>
            <div class="h4 mb-0" id="statCompletedSessions">0</div>
            <small class="muted">Completed sessions</small>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="fa-solid fa-bell"></i></div>
          <div>
            <div class="h4 mb-0" id="statNotifications">0</div>
            <small class="muted">Notifications</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts -->

    <div class="row g-3 mb-3">

      <!-- الكارد الأول: Appointments Overview -->
      <div class="col-12 col-xl-6">
        <div class="card-soft p-3" style="height:400px;"> <!-- height محدد -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h4 class="h6 mb-0">Appointments Overview</h4>
            <select id="chartRange" class="form-select form-select-sm" style="width:auto">
              <option value="7">Last 7 days</option>
              <option value="30" selected>Last 30 days</option>
              <option value="90">Last 90 days</option>
            </select>
          </div>
          <canvas id="appointmentsChart" style="height:100%; width:100%;"></canvas>
        </div>
      </div>

      <!-- الكارد الثاني: Sessions Completed -->
      <div class="col-12 col-xl-6">
        <div class="card-soft p-3" style="height:400px;"> <!-- height محدد -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h4 class="h6 mb-0">Sessions Completed</h4>
            <select id="sessionsRange" class="form-select form-select-sm" style="width:auto">
              <option value="month" selected>This month</option>
              <option value="quarter">This quarter</option>
              <option value="year">This year</option>
            </select>
          </div>
          <canvas id="sessionsChart" style="height:100%; width:100%;"></canvas>
          <div class="chart-legend mt-2">
            <span class="legend-item"><i class="fa-solid fa-circle text-primary"></i> Completed</span>
            <span class="legend-item"><i class="fa-solid fa-circle text-secondary"></i> Missed</span>
          </div>
        </div>
      </div>

    </div>



    <!-- Upcoming Appointments -->
    <div>

      <div class="card-soft p-3">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h4 class="h6 mb-0" style="padding: 10px 0 10px 10px; margin-top: 10px; text-align: left;">Upcoming
            Appointments</h4>
          <div class="d-flex gap-2">
            <select id="filterStatus" class="form-select form-select-sm" style="width:auto">
              <option value="all" selected>All</option>
              <option value="scheduled">Scheduled</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
              <option value="no_show">No‑show</option>
            </select>
            <select id="filterRange" class="form-select form-select-sm" style="width:auto">
              <option value="today">Today</option>
              <option value="week" selected>This week</option>
              <option value="month">This month</option>
            </select>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Type</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="appointmentsTableBody"></tbody>
          </table>
        </div>
      </div>
    </div>

  </main>

  <!-- Modals -->
  <div class="modal fade" id="appointmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalTitle">New Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="appointmentForm">
          <div class="modal-body g-3 p-3">
            <input type="hidden" id="apptId" />
            <div class="mb-2">
              <label class="form-label">Patient</label>
              <select id="apptPatient" class="form-select" required></select>
            </div>
            <div class="row g-2">
              <div class="col-12 col-md-6">
                <label class="form-label">Date</label>
                <input id="apptDate" type="date" class="form-control" required />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Time</label>
                <input id="apptTime" type="time" class="form-control" required />
              </div>
            </div>
            <div class="row g-2 mt-1">
              <div class="col-12 col-md-6">
                <label class="form-label">Type</label>
                <select id="apptType" class="form-select">
                  <option value="in_person">In person</option>
                  <option value="telemedicine">Telemedicine</option>
                </select>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Status</label>
                <select id="apptStatus" class="form-select">
                  <option value="scheduled">Scheduled</option>
                  <option value="completed">Completed</option>
                  <option value="cancelled">Cancelled</option>
                  <option value="no_show">No‑show</option>
                </select>
              </div>
            </div>
            <div class="mt-2">
              <label class="form-label">Notes</label>
              <textarea id="apptNotes" class="form-control" rows="3"
                placeholder="Session goals, risk notes, reminders…"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Patient Profile Modal -->
  <div class="modal fade" id="patientModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Patient Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="patientProfile">
            <!-- Filled dynamically -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnAddNote"><i class="fa-solid fa-note-sticky me-1"></i>Add
            Note</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Note Modal -->
  <div class="modal fade" id="noteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Session Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="noteForm">
          <div class="modal-body">
            <input type="hidden" id="notePatientId" />
            <div class="mb-2">
              <label class="form-label">Summary</label>
              <input type="text" id="noteSummary" class="form-control" required />
            </div>
            <div class="mb-2">
              <label class="form-label">Details</label>
              <textarea id="noteDetails" class="form-control" rows="5"
                placeholder="Observations, interventions, risk assessment (SI/HI), plan…" required></textarea>
            </div>
            <div class="mb-2">
              <label class="form-label">Visibility</label>
              <select id="noteVisibility" class="form-select">
                <option value="private">Private (doctor only)</option>
                <option value="team">Care team</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>

    const API_BASE = '/api'; // TODO: change to your backend base URL (e.g., '/api/v1')

    // ===== Service layer (replace with real endpoints) =====
    const api = {
      async getDoctor() {
        // return fetch(`${API_BASE}/doctor/me`).then(r => r.json());
        return demo.getDoctor();
      },
      async getStats(rangeDays = 30) {
        // return fetch(`${API_BASE}/dashboard/stats?range=${rangeDays}`).then(r => r.json());
        return demo.getStats(rangeDays);
      },
      async getAppointments(params = {}) {
        // return fetch(`${API_BASE}/appointments?` + new URLSearchParams(params)).then(r => r.json());
        return demo.getAppointments(params);
      },
      async upsertAppointment(payload) {
        // const method = payload.id ? 'PUT' : 'POST';
        // const url = payload.id ? `${API_BASE}/appointments/${payload.id}` : `${API_BASE}/appointments`;
        // return fetch(url, { method, headers: {'Content-Type':'application/json'}, body: JSON.stringify(payload)}).then(r=>r.json())
        return demo.upsertAppointment(payload);
      },
      async getPatients() {
        // return fetch(`${API_BASE}/patients`).then(r => r.json());
        return demo.getPatients();
      },
      async getPatientById(id) { return demo.getPatientById(id); },
      async createNote(payload) {
        // return fetch(`${API_BASE}/notes`, {method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload)}).then(r=>r.json())
        return demo.createNote(payload);
      },
      async getNotifications() { return demo.getNotifications(); },
      async markAllNotificationsRead() { return demo.markAllNotificationsRead(); }
    };

    // ===== Charts =====
    let apptChart, sessChart;
    function renderAppointmentsChart(labels, booked, completed, cancelled) {
      if (apptChart) apptChart.destroy();
      const ctx = document.getElementById('appointmentsChart');
      apptChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels,
          datasets: [
            { label: 'Booked', data: booked, tension: 0.35, borderWidth: 2 },
            { label: 'Completed', data: completed, tension: 0.35, borderWidth: 2 },
            { label: 'Cancelled', data: cancelled, tension: 0.35, borderWidth: 2 }
          ]
        },
        options: { responsive: true, maintainAspectRatio: false }
      });
    }

    function renderSessionsChart(labels, values) {
      if (sessChart) sessChart.destroy();
      const ctx = document.getElementById('sessionsChart');
      sessChart = new Chart(ctx, {
        type: 'bar',
        data: { labels, datasets: [{ label: 'Sessions', data: values }] },
        options: { responsive: true, maintainAspectRatio: false }
      });
    }

    // ===== Helpers =====
    const badgeByStatus = (s) => ({
      scheduled: 'bg-primary-subtle text-primary',
      completed: 'bg-success-subtle text-success',
      cancelled: 'bg-danger-subtle text-danger',
      no_show: 'bg-warning-subtle text-warning'
    })[s] || 'bg-secondary-subtle text-secondary';

    function formatDate(dateStr) {
      const d = new Date(dateStr);
      return d.toLocaleDateString(undefined, { year: 'numeric', month: 'short', day: 'numeric' });
    }

    function formatTime(dateStr) {
      const d = new Date(dateStr);
      return d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function setTheme(dark) {
      document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
      localStorage.setItem('theme', dark ? 'dark' : 'light');
      document.getElementById('themeSwitch').checked = !!dark;
    }

    // ===== UI bindings =====
    const appointmentModal = new bootstrap.Modal('#appointmentModal');
    const patientModal = new bootstrap.Modal('#patientModal');
    const noteModal = new bootstrap.Modal('#noteModal');

    document.getElementById('profileImageInput').addEventListener('change', (e) => {
      const file = e.target.files?.[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (ev) => { document.getElementById('profileImage').src = ev.target.result; };
      reader.readAsDataURL(file);
      // TODO: upload image to server
    });

    document.getElementById('btnNewAppointment').addEventListener('click', async () => {
      await populatePatientsSelect();
      clearApptForm();
      document.getElementById('appointmentModalTitle').textContent = 'New Appointment';
      appointmentModal.show();
    });

    document.getElementById('appointmentForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = collectApptForm();
      const res = await api.upsertAppointment(payload);
      if (res?.ok) {
        appointmentModal.hide();
        await refreshAppointments();
        await refreshStatsAndCharts();
      } else {
        alert(res?.message || 'Failed to save appointment');
      }
    });

    document.getElementById('filterStatus').addEventListener('change', refreshAppointments);
    document.getElementById('filterRange').addEventListener('change', refreshAppointments);

    document.getElementById('chartRange').addEventListener('change', refreshStatsAndCharts);
    document.getElementById('sessionsRange').addEventListener('change', refreshStatsAndCharts);

    document.getElementById('markAllRead').addEventListener('click', async () => {
      await api.markAllNotificationsRead();
      await loadNotifications();
    });

    document.getElementById('themeSwitch').addEventListener('change', (e) => setTheme(e.target.checked));

    document.getElementById('btnAddNote').addEventListener('click', () => {
      const pid = document.getElementById('patientProfile').dataset.patientId;
      document.getElementById('notePatientId').value = pid;
      noteModal.show();
    });

    document.getElementById('noteForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const payload = {
        patientId: document.getElementById('notePatientId').value,
        summary: document.getElementById('noteSummary').value,
        details: document.getElementById('noteDetails').value,
        visibility: document.getElementById('noteVisibility').value
      };
      const res = await api.createNote(payload);
      if (res?.ok) {
        noteModal.hide();
        // Optionally refresh patient profile
      } else { alert(res?.message || 'Failed to save note'); }
    });

    // ===== Appointments Table =====
    async function refreshAppointments() {
      const status = document.getElementById('filterStatus').value;
      const range = document.getElementById('filterRange').value;
      const params = { status: status === 'all' ? undefined : status, range };
      const list = await api.getAppointments(params);
      const tbody = document.getElementById('appointmentsTableBody');
      tbody.innerHTML = '';
      list.forEach((a) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td><button class="btn btn-link p-0" data-pid="${a.patient.id}">${a.patient.name}</button><div class="small muted">${a.patient.code}</div></td>
          <td>${formatDate(a.start)}</td>
          <td>${formatTime(a.start)}</td>
          <td><span class="badge rounded-pill ${badgeByStatus(a.status)} text-uppercase">${a.status.replace('_', ' ')}</span></td>
          <td>${a.type === 'telemedicine' ? '<i class="fa-solid fa-video me-1"></i>Telemedicine' : 'In person'}</td>
          <td class="text-nowrap">
            <button class="btn btn-sm btn-outline-primary me-1" data-action="edit" data-id="${a.id}"><i class="fa-solid fa-pen"></i></button>
            <button class="btn btn-sm btn-outline-secondary me-1" data-action="reschedule" data-id="${a.id}"><i class="fa-solid fa-clock-rotate-left"></i></button>
            <button class="btn btn-sm btn-outline-danger" data-action="cancel" data-id="${a.id}"><i class="fa-solid fa-xmark"></i></button>
          </td>`;
        tbody.appendChild(tr);
      });

      // row actions
      tbody.querySelectorAll('button[data-pid]').forEach(btn => btn.addEventListener('click', async (e) => {
        const id = e.currentTarget.dataset.pid;
        const p = await api.getPatientById(id);
        showPatientProfile(p);
      }));

      tbody.querySelectorAll('button[data-action]').forEach(btn => btn.addEventListener('click', async (e) => {
        const id = e.currentTarget.dataset.id;
        const action = e.currentTarget.dataset.action;
        const appt = (await api.getAppointments({ id }))[0];
        if (!appt) return;
        if (action === 'edit' || action === 'reschedule') {
          await populatePatientsSelect(appt.patient.id);
          fillApptForm(appt);
          document.getElementById('appointmentModalTitle').textContent = action === 'edit' ? 'Edit Appointment' : 'Reschedule Appointment';
          appointmentModal.show();
        } else if (action === 'cancel') {
          if (confirm('Cancel this appointment?')) {
            await api.upsertAppointment({ ...appt, status: 'cancelled' });
            await refreshAppointments();
            await refreshStatsAndCharts();
          }
        }
      }));
    }

    async function populatePatientsSelect(selectedId) {
      const patients = await api.getPatients();
      const sel = document.getElementById('apptPatient');
      sel.innerHTML = patients.map(p => `<option value="${p.id}" ${selectedId == p.id ? 'selected' : ''}>${p.name} (${p.code})</option>`).join('');
    }

    function clearApptForm() {
      document.getElementById('apptId').value = '';
      document.getElementById('apptDate').valueAsDate = new Date();
      document.getElementById('apptTime').value = '10:00';
      document.getElementById('apptType').value = 'in_person';
      document.getElementById('apptStatus').value = 'scheduled';
      document.getElementById('apptNotes').value = '';
    }

    function fillApptForm(a) {
      document.getElementById('apptId').value = a.id;
      const d = new Date(a.start);
      document.getElementById('apptDate').value = d.toISOString().slice(0, 10);
      document.getElementById('apptTime').value = d.toTimeString().slice(0, 5);
      document.getElementById('apptType').value = a.type;
      document.getElementById('apptStatus').value = a.status;
      document.getElementById('apptNotes').value = a.notes || '';
    }

    function collectApptForm() {
      const date = document.getElementById('apptDate').value;
      const time = document.getElementById('apptTime').value;
      return {
        id: document.getElementById('apptId').value || undefined,
        patientId: document.getElementById('apptPatient').value,
        start: new Date(`${date}T${time}:00`).toISOString(),
        type: document.getElementById('apptType').value,
        status: document.getElementById('apptStatus').value,
        notes: document.getElementById('apptNotes').value
      };
    }

    function showPatientProfile(p) {
      const el = document.getElementById('patientProfile');
      el.dataset.patientId = p.id;
      el.innerHTML = `
        <div class="d-flex align-items-start gap-3">
          <img src="${p.avatar || 'https://via.placeholder.com/96x96'}" class="rounded-circle" style="width:72px;height:72px;object-fit:cover" />
          <div class="flex-fill">
            <div class="h5 mb-0">${p.name} <small class="text-secondary">${p.code}</small></div>
            <div class="small muted">${p.gender} · ${p.age}y</div>
            <div class="small">Phone: <a href="tel:${p.phone}">${p.phone}</a> · Email: <a href="mailto:${p.email}">${p.email}</a></div>
          </div>
        </div>
        <hr/>
        <div class="row g-3">
          <div class="col-12 col-lg-6">
            <div class="fw-semibold mb-1">Clinical Overview</div>
            <ul class="list-unstyled small">
              <li><strong>Primary Dx:</strong> ${p.primaryDx || '—'}</li>
              <li><strong>Risk Level:</strong> ${p.risk || 'Low'}</li>
              <li><strong>Allergies:</strong> ${p.allergies?.join(', ') || 'None reported'}</li>
              <li><strong>Medications:</strong> ${p.meds?.join(', ') || '—'}</li>
            </ul>
          </div>
          <div class="col-12 col-lg-6">
            <div class="fw-semibold mb-1">Last Sessions</div>
            <ol class="small mb-0">
              ${p.sessions.slice(0, 5).map(s => `<li>${formatDate(s.date)} – ${s.summary}</li>`).join('')}
            </ol>
          </div>
        </div>`;
      patientModal.show();
    }

    async function loadNotifications() {
      const items = await api.getNotifications();
      const listEl = document.getElementById('notifList');
      listEl.innerHTML = '';
      let unread = 0;
      items.forEach(n => {
        if (!n.read) unread++;
        const a = document.createElement('a');
        a.className = 'list-group-item list-group-item-action';
        a.innerHTML = `<div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1">${n.title}</h6>
            <small class="text-secondary">${new Date(n.time).toLocaleString()}</small>
          </div>
          <p class="mb-1 small">${n.body}</p>`;
        listEl.appendChild(a);
      });
      document.getElementById('notifCount').textContent = unread;
      document.getElementById('statNotifications').textContent = unread;
    }

    async function refreshStatsAndCharts() {
      const dayRange = Number(document.getElementById('chartRange').value || 30);
      const stat = await api.getStats(dayRange);
      document.getElementById('statPatientsToday').textContent = stat.patientsToday;
      document.getElementById('statSessionCount').textContent = stat.sessionCount;
      document.getElementById('statCompletedSessions').textContent = stat.completedSessions;

      renderAppointmentsChart(stat.chart.labels, stat.chart.booked, stat.chart.completed, stat.chart.cancelled);

      const sRange = document.getElementById('sessionsRange').value;
      const sess = stat.sessions[sRange];
      renderSessionsChart(sess.labels, sess.values);
    }

    // ===== DEMO data (remove when backend is ready) =====
    const demo = (() => {
      const doctor = { id: 1, name: 'Dr.Zaid Jaber', email: 'zaid.j@edoc.com', avatar: '', timezone: 'Tabarboor/Amman' };
      const patients = [
        { id: 101, code: 'PT-0001', name: 'Mary Smith', gender: 'F', age: 32, phone: '+962-7-9000-1234', email: 'mary@example.com', primaryDx: 'GAD', risk: 'Low', allergies: [], meds: ['Sertraline 50mg'], sessions: [{ date: isoDays(-2), summary: 'CBT – worry log' }, { date: isoDays(-10), summary: 'Psychoeducation' }, { date: isoDays(-20), summary: 'Intake' }] },
        { id: 102, code: 'PT-0002', name: 'Omar Khalid', gender: 'M', age: 28, phone: '+962-7-9111-4567', email: 'omar@example.com', primaryDx: 'MDD', risk: 'Moderate', allergies: ['Penicillin'], meds: [], sessions: [{ date: isoDays(-5), summary: 'Behavioral activation' }, { date: isoDays(-13), summary: 'PHQ-9 assessment' }] },
        { id: 103, code: 'PT-0003', name: 'Lina Haddad', gender: 'F', age: 24, phone: '+962-7-9222-7890', email: 'lina@example.com', primaryDx: 'Panic disorder', risk: 'Low', allergies: [], meds: [], sessions: [{ date: isoDays(-1), summary: 'Interoceptive exposure' }] },
      ];

      let appts = [
        mkAppt(1, 101, isoHours(+3), 'in_person', 'scheduled'),
        mkAppt(2, 102, isoHours(+5), 'telemedicine', 'scheduled'),
        mkAppt(3, 103, isoHours(-2), 'in_person', 'completed'),
        mkAppt(4, 101, isoDays(+1), 'telemedicine', 'scheduled'),
        mkAppt(5, 102, isoDays(+2), 'in_person', 'scheduled')
      ];

      let notifications = [
        { id: 1, title: 'New message from Mary', body: 'Patient asked to reschedule.', time: isoHours(-1), read: false },
        { id: 2, title: 'No‑show alert', body: 'Omar missed appointment today.', time: isoHours(-2), read: false },
        { id: 3, title: 'Session completed', body: 'Lina – session marked as completed.', time: isoHours(-3), read: true }
      ];

      function isoDays(offset) { const d = new Date(); d.setDate(d.getDate() + offset); return d.toISOString(); }
      function isoHours(offset) { const d = new Date(); d.setHours(d.getHours() + offset); return d.toISOString(); }
      function mkAppt(id, patientId, when, type, status) {
        const patient = patients.find(p => p.id === patientId);
        return { id, patient, patientId, start: when, type, status, notes: '' };
      }

      function rangeSeries(days) {
        const labels = [], booked = [], completed = [], cancelled = [];
        for (let i = days - 1; i >= 0; i--) {
          const d = new Date(); d.setDate(d.getDate() - i);
          labels.push(d.toLocaleDateString(undefined, { month: 'short', day: 'numeric' }));
          const b = Math.floor(Math.random() * 5) + 3;
          const c = Math.floor(b * 0.7);
          const x = Math.floor(b * 0.1);
          booked.push(b); completed.push(c); cancelled.push(x);
        }
        return { labels, booked, completed, cancelled };
      }

      return {
        getDoctor: async () => doctor,
        getStats: async (days) => ({
          patientsToday: appts.filter(a => new Date(a.start).toDateString() === new Date().toDateString()).length,
          sessionCount: appts.length,
          completedSessions: appts.filter(a => a.status === 'completed').length,
          chart: rangeSeries(days),
          sessions: {
            month: { labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], values: [12, 16, 14, 18] },
            quarter: { labels: ['Jan', 'Feb', 'Mar'], values: [40, 42, 51] },
            year: { labels: ['Q1', 'Q2', 'Q3', 'Q4'], values: [120, 135, 128, 140] }
          }
        }),
        getAppointments: async (params) => {
          if (params?.id) return appts.filter(a => a.id == params.id);
          let list = [...appts];
          if (params?.status) list = list.filter(a => a.status === params.status);
          if (params?.range === 'today') {
            list = list.filter(a => new Date(a.start).toDateString() === new Date().toDateString());
          } else if (params?.range === 'week') {
            const now = new Date();
            const start = new Date(now); start.setDate(now.getDate() - now.getDay());
            const end = new Date(start); end.setDate(start.getDate() + 7);
            list = list.filter(a => new Date(a.start) >= start && new Date(a.start) < end);
          } else if (params?.range === 'month') {
            const now = new Date();
            const start = new Date(now.getFullYear(), now.getMonth(), 1);
            const end = new Date(now.getFullYear(), now.getMonth() + 1, 1);
            list = list.filter(a => new Date(a.start) >= start && new Date(a.start) < end);
          }
          return list.sort((a, b) => new Date(a.start) - new Date(b.start));
        },
        upsertAppointment: async (payload) => {
          if (payload.id) {
            const idx = appts.findIndex(a => a.id == payload.id);
            if (idx >= 0) {
              const patient = patients.find(p => p.id == (payload.patientId || appts[idx].patientId));
              appts[idx] = { ...appts[idx], ...payload, patient, patientId: patient.id };
              return { ok: true, id: appts[idx].id };
            }
            return { ok: false, message: 'Appointment not found' };
          }
          const id = Math.max(0, ...appts.map(a => a.id)) + 1;
          const patient = patients.find(p => p.id == payload.patientId);
          appts.push({ id, patient, patientId: patient.id, start: payload.start, type: payload.type, status: payload.status || 'scheduled', notes: payload.notes || '' });
          return { ok: true, id };
        },
        getPatients: async () => patients,
        getPatientById: async (id) => patients.find(p => p.id == id),
        createNote: async (payload) => ({ ok: true, id: Math.floor(Math.random() * 10000), ...payload }),
        getNotifications: async () => notifications,
        markAllNotificationsRead: async () => { notifications = notifications.map(n => ({ ...n, read: true })); return { ok: true }; }
      };
    })();

    // ===== Init =====
    (async function init() {
      // theme
      setTheme(localStorage.getItem('theme') === 'dark');

      // doctor info
      const me = await api.getDoctor();
      document.getElementById('doctorName').textContent = me.name;
      document.getElementById('doctorEmail').textContent = me.email;
      document.getElementById('welcomeTitle').textContent = `Welcome, ${me.name.split(' ')[0]}`;
      document.getElementById('profileImage').src = me.avatar || 'https://cdn.jsdelivr.net/gh/twbs/icons@1.11.3/icons/person-circle.svg';

      await refreshStatsAndCharts();
      await refreshAppointments();
      await loadNotifications();
    })();
  </script>
</body>

</html>