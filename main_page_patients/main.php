<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychology Clinic - Home</title>
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
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .navbar { background-color: rgba(255,255,255,0.95); }
        .navbar-brand { color: #0d6efd !important; }
        .hero {
            background: rgba(255,255,255,0.7);
            color: #0d47a1;
            padding: 80px 20px;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            backdrop-filter: blur(8px);
            text-align: center;
        }
        .hero h1 { font-weight: 700; font-size: 2.8rem; }
        .hero p { font-size: 1.2rem; }
        .btn-custom {
            background-color: #42a5f5;
            color: #fff;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover { background-color: #1e88e5; color: #fff; }
        .service-card, .quick-card, .about-card, .testimonial-card, .booking-card {
            border-radius: 18px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(8px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service-card:hover, .quick-card:hover, .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 22px rgba(0,0,0,0.2);
        }
        .icon-lg { font-size: 2.8rem; }
        h3 { color: #0d47a1; margin-bottom: 25px; }
        .booking-card {
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        h2 {
            color: #0d47a1;
            font-weight: bold;
            margin-bottom: 25px;
        }
        .form-label { font-weight: 600; color: #0d47a1; }
        .modal-content {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Psych Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">My Appointments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">AI Assistant</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                <li class="nav-item"><a class="btn btn-primary ms-2" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <!-- Hero Section -->
    <div class="hero mb-5">
        <h1>Welcome, John!</h1>
        <p class="lead">Your mental well-being is our priority. Explore our services and book your session today.</p>
        <button class="btn btn-custom mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
            <i class="fa-solid fa-calendar-plus me-2"></i>Book Appointment
        </button>
    </div>

    <!-- Services Section -->
    <h3>Our Services</h3>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card p-4 text-center service-card shadow-sm">
                <i class="fa-solid fa-user-doctor text-primary icon-lg mb-3"></i>
                <h5>Counseling</h5>
                <p>Individual & group therapy sessions tailored to your needs.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center service-card shadow-sm">
                <i class="fa-solid fa-video text-success icon-lg mb-3"></i>
                <h5>Telemedicine</h5>
                <p>Virtual video sessions from the comfort of your home.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center service-card shadow-sm">
                <i class="fa-solid fa-book-medical text-warning icon-lg mb-3"></i>
                <h5>Workshops</h5>
                <p>Educational workshops and mental health awareness sessions.</p>
            </div>
        </div>
    </div>

    <!-- Booking Form (hidden by default) -->
    <div id="bookingForm" class="container d-none mb-5">
        <div class="col-lg-7 col-md-9 mx-auto">
            <div class="booking-card">
                <h2 class="text-center mb-4"><i class="fa-solid fa-calendar-check me-2"></i>Book Your Appointment</h2>
                <form action="payment.php" method="GET">
                    <div class="mb-3">
                        <label for="fullNameInline" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullNameInline" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailInline" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailInline" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select" name="appointmentType" required>
                            <option value="">Choose type...</option>
                            <option value="clinic">In-Clinic</option>
                            <option value="online">Online (Video Session)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Doctor</label>
                        <select class="form-select" name="doctor" required>
                            <option value="">Choose doctor...</option>
                            <option value="Dr. Sarah Johnson">Dr. Sarah Johnson (Psychologist)</option>
                            <option value="Dr. Ahmed Ali">Dr. Ahmed Ali (Psychiatrist)</option>
                            <option value="Dr. Lina Haddad">Dr. Lina Haddad (Therapist)</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" required>
                        </div>
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
                <form action="payment.php" method="GET">
                    <div class="mb-3">
                        <label for="fullNameModal" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullNameModal" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailModal" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailModal" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select" name="appointmentType" required>
                            <option value="">Choose type...</option>
                            <option value="clinic">In-Clinic</option>
                            <option value="online">Online (Video Session)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Doctor</label>
                        <select class="form-select" name="doctor" required>
                            <option value="">Choose doctor...</option>
                            <option value="Dr. Sarah Johnson">Dr. Sarah Johnson (Psychologist)</option>
                            <option value="Dr. Ahmed Ali">Dr. Ahmed Ali (Psychiatrist)</option>
                            <option value="Dr. Lina Haddad">Dr. Lina Haddad (Therapist)</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" required>
                        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleBookingForm() {
        const form = document.getElementById("bookingForm");
        form.classList.toggle("d-none");
        if (!form.classList.contains("d-none")) {
            window.scrollTo({ top: form.offsetTop - 50, behavior: 'smooth' });
        }
    }
</script>
</body>
</html>
