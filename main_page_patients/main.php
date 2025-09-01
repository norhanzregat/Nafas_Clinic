<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafas Clinic Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #e0f7fa, #b3e5fc, #81d4fa, #4fc3f7);
            background-size: 300% 300%;
            animation: calmGradient 25s ease infinite;
            color: #333;
        }

        @keyframes calmGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
        }

        .navbar-brand {
            color: #0d6efd !important;
        }

        .hero {
            background: rgba(255, 255, 255, 0.7);
            color: #0d47a1;
            padding: 80px 20px;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(8px);
            text-align: center;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 2.8rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .btn-custom {
            background-color: #42a5f5;
            color: #fff;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #1e88e5;
            color: #fff;
        }

        .card-section {
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-section:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.2);
        }

        .icon-lg {
            font-size: 2.8rem;
        }

        h3,
        h2 {
            color: #0d47a1;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #0d47a1;
        }

        .modal-content {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.85);
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .footer a {
            color: #42a5f5;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* لوحة المواعيد الجانبية */
        #appointmentsWidget {
            position: fixed;
            top: 100px;
            right: 20px;
            width: 320px;
            max-height: 450px;
            overflow-y: auto;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            z-index: 1050;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        #appointmentsWidget h5 {
            margin-bottom: 10px;
        }

        #appointmentsList li {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Nafas Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bookingModal" data-bs-toggle="modal">Book
                            Appointment</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile-patients/profile.php">Profile</a></li>
                    <li class="nav-item"><a class="btn btn-primary ms-2" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container">
        <div class="hero mb-5">
            <h1>Welcome, John!</h1>
            <p class="lead">Your mental well-being is our priority. Explore our services and book your session today.
            </p>
            <button class="btn btn-custom mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                <i class="fa-solid fa-calendar-plus me-2"></i>Book Appointment
            </button>
        </div>

        <!-- Services Section -->
        <section id="services">
            <h3>Our Services</h3>
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-user-doctor text-primary icon-lg mb-3"></i>
                        <h5>Counseling</h5>
                        <p>Individual & group therapy sessions tailored to your needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-video text-success icon-lg mb-3"></i>
                        <h5>Telemedicine</h5>
                        <p>Virtual video sessions from the comfort of your home.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 text-center card-section">
                        <i class="fa-solid fa-book-medical text-warning icon-lg mb-3"></i>
                        <h5>Workshops</h5>
                        <p>Educational workshops and mental health awareness sessions.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="mb-5">
            <h3 class="text-center mb-4">Meet Our Team</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-section p-4 text-center shadow-sm" style="height: 100%;">
                        <img src="data:image/jpeg;base64,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"
                            class="rounded-circle mb-3" alt="Dr. Sarah Johnson"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;">
                        <h5>Dr. Sarah Johnson</h5>
                        <p>Psychologist</p>
                        <p><i class="fa-solid fa-envelope me-1"></i> sarah.johnson@example.com</p>
                        <p><i class="fa-solid fa-phone me-1"></i> +1 234 567 890</p>
                        <a href="#" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-section p-4 text-center">
                        <img src="data:image/jpeg;base64,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"
                            class="rounded-circle mb-3"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;" alt="Dr. Ahmed Ali">
                        <h5>Dr. Ahmed Ali</h5>
                        <p>Psychiatrist</p>
                        <p><i class="fa-solid fa-envelope"></i> ahmed@example.com</p>
                        <p><i class="fa-solid fa-phone"></i> +1 234 567 8902</p>
                        <a href="#" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-section p-4 text-center">
                        <img src="data:image/jpeg;base64,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"
                            class="rounded-circle mb-3"
                            style="width:150px; height:150px; object-fit:cover; margin:auto;" alt="Dr. Lina Haddad">
                        <h5>Dr. Lina Haddad</h5>
                        <p>Therapist</p>
                        <p><i class="fa-solid fa-envelope"></i> lina@example.com</p>
                        <p><i class="fa-solid fa-phone"></i> +1 234 567 8903</p>
                        <a href="#" class="btn btn-custom mt-2">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- لوحة المواعيد الجانبية -->
    <div id="appointmentsWidget" class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="mb-0">Upcoming Appointments</h5>
            <i class="fa-solid fa-bell text-warning" id="notificationBell" style="cursor:pointer;"></i>
        </div>
        <ul class="list-group list-group-flush" id="appointmentsList">
            <li class="list-group-item text-center text-muted">No appointments yet</li>
        </ul>
    </div>

    <!-- Modal Booking Form -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="bookingModalLabel">
                        <i class="fa-solid fa-calendar-check me-2"></i>Book Your Appointment
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="mb-3">
                            <label for="fullNameModal" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullNameModal" name="fullName"
                                placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailModal" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailModal" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Appointment Type</label>
                            <select class="form-select" id="appointmentType" name="appointmentType" required>
                                <option value="">Choose type...</option>
                                <option value="In-Clinic">In-Clinic</option>
                                <option value="Online (Video Session)">Online (Video Session)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Doctor</label>
                            <select class="form-select" id="doctor" name="doctor" required>
                                <option value="">Choose doctor...</option>
                                <option value="Dr. Sarah Johnson">Dr. Sarah Johnson</option>
                                <option value="Dr. Ahmed Ali">Dr. Ahmed Ali</option>
                                <option value="Dr. Lina Haddad">Dr. Lina Haddad</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Time</label>
                            <select class="form-select" id="appointmentTime" name="appointmentTime" required>
                                <option value="">Choose time...</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" name="paymentMethod" required>
                                <option value="">Choose method...</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="cash">Cash (In Clinic)</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom btn-lg">
                                <i class="fa-solid fa-credit-card me-2"></i>Proceed to Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Psych Clinic. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@psychclinic.com">info@psychclinic.com</a> | +1 234 567 890</p>
        <p>
            <a href="#"><i class="fa-brands fa-facebook me-2"></i></a>
            <a href="#"><i class="fa-brands fa-twitter me-2"></i></a>
            <a href="#"><i class="fa-brands fa-instagram me-2"></i></a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const appointmentsList = document.getElementById('appointmentsList');

        function addAppointmentToWidget(appointment) {
            if (appointmentsList.children.length === 1 && appointmentsList.children[0].textContent.includes('No appointments')) {
                appointmentsList.innerHTML = '';
            }

            const li = document.createElement('li');
            li.className = 'list-group-item';
            li.innerHTML = `
                <strong>${appointment.date} ${appointment.time}</strong><br>
                ${appointment.doctor} | ${appointment.type}
            `;
            appointmentsList.appendChild(li);

            // إشعار قبل يوم من الموعد
            const today = new Date();
            const appDateTime = new Date(appointment.date + 'T' + appointment.time);
            const diff = (appDateTime - today) / (1000 * 60 * 60 * 24);
            if (diff >= 0 && diff < 1) {
                alert(`Reminder: You have an appointment with ${appointment.doctor} tomorrow at ${appointment.time}`);
            }
        }

        const bookingForm = document.getElementById('bookingForm');
        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const date = document.getElementById('appointmentDate').value;
            const time = document.getElementById('appointmentTime').value;

            const newAppointment = {
                date: date,
                time: time,
                doctor: document.getElementById('doctor').value,
                type: document.getElementById('appointmentType').value
            };

            addAppointmentToWidget(newAppointment);

            alert('Appointment booked successfully!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
            modal.hide();
            bookingForm.reset();
        });
    </script>
</body>

</html>