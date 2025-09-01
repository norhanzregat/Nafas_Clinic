<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Segoe UI', sans-serif;
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
.profile-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}
.profile-photo {
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #42a5f5;
    margin-right: 30px;
}
.profile-details h2 {
    margin-bottom: 5px;
}
.profile-details p {
    margin-bottom: 10px;
    font-size: 1.1rem;
    color: #555;
}
.card-profile {
    border-radius: 20px;
    background: rgba(255,255,255,0.85);
    padding: 25px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    margin-bottom: 20px;
}
.nav-tabs .nav-link.active {
    background-color: #42a5f5;
    color: #fff;
    border-radius: 15px 15px 0 0;
}
.nav-tabs .nav-link {
    border: none;
    color: #0d47a1;
    font-weight: 600;
}
.btn-custom {
    background-color: #42a5f5;
    color: #fff;
    font-weight: 600;
    border-radius: 50px;
    padding: 8px 20px;
    transition: all 0.3s ease;
}
.btn-custom:hover {
    background-color: #1e88e5;
    color: #fff;
}
.table thead {
    background-color: #42a5f5;
    color: #fff;
    border-radius: 10px;
}
.table tbody tr:hover {
    background-color: rgba(66,165,245,0.1);
}
</style>
</head>
<body>
<div class="container mt-5">

    <!-- Profile Header -->
    <div class="profile-container">
        <img src="assets/images/default-user.png" alt="Patient Photo" id="profilePhoto" class="profile-photo">
        <div class="profile-details">
            <h2 id="patientName">John Doe</h2>
            <p id="patientEmail">johndoe@example.com</p>
            <button class="btn btn-custom" onclick="document.getElementById('photoInput').click()">
                <i class="fa-solid fa-camera me-2"></i>Change Photo
            </button>
            <input type="file" id="photoInput" class="d-none" accept="image/*">
        </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Personal Info</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="appointments-tab" data-bs-toggle="tab" data-bs-target="#appointments" type="button" role="tab">Appointments</button>
        </li>
    </ul>

    <div class="tab-content">

        <!-- Personal Info Tab -->
        <div class="tab-pane fade show active" id="info" role="tabpanel">
            <div class="card card-profile">
                <form id="profileForm">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" value="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" value="johndoe@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" value="+1234567890">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-custom">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Appointments Tab -->
        <div class="tab-pane fade" id="appointments" role="tabpanel">
            <div class="card card-profile">
                <h5 class="mb-3">Your Upcoming Appointments</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle text-center">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Doctor</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="appointmentsTable">
                            <tr>
                                <td>2025-09-03</td>
                                <td>10:00 AM</td>
                                <td>Dr. Sarah Johnson</td>
                                <td>In-Clinic</td>
                                <td>Confirmed</td>
                            </tr>
                            <tr>
                                <td>2025-09-10</td>
                                <td>2:00 PM</td>
                                <td>Dr. Ahmed Ali</td>
                                <td>Online</td>
                                <td>Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // تغيير صورة البروفايل عند الاختيار
    document.getElementById('photoInput').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profilePhoto');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    // تحديث الاسم مباشرة عند تغييره
    document.getElementById('fullName').addEventListener('input', function() {
        document.getElementById('patientName').textContent = this.value;
    });

    // حفظ بيانات البروفايل
    document.getElementById('profileForm').addEventListener('submit', function(e){
        e.preventDefault();
        alert('Profile information saved successfully!');
        // هنا يمكنك إضافة كود لإرسال البيانات للـ database
    });
</script>
</body>
</html>
