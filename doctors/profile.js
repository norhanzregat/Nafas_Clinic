// Toggle camera icon visibility
function toggleCameraIcon() {
    var img = document.getElementById("profileImage");
    var placeholder = document.getElementById("profilePlaceholder");
    if (img.style.display === "block") {
        placeholder.style.display = "none";
    } else {
        placeholder.style.display = "flex";
    }
}

document.getElementById("profileImageInput").addEventListener("change", function () {
    setTimeout(toggleCameraIcon, 100);
});

window.addEventListener("DOMContentLoaded", toggleCameraIcon);

// Upload and display selected image
document.getElementById("profileImageInput").addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("profileImage").src = e.target.result;
            document.getElementById("profileImage").style.display = "block";
            document.getElementById("profilePlaceholder").style.display = "none";
        };
        reader.readAsDataURL(file);
    }
});

// Clicking profile image opens file input
document.getElementById("profileImage").onclick = function () {
    document.getElementById("profileImageInput").click();
};
