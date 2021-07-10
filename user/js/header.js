function showProfileLogout() {
    var ProfileLogoutList = document.getElementById("ProfileLogoutList");
    if (ProfileLogoutList.style.display === "block") {
        ProfileLogoutList.style.display = "none";
    } else {
        ProfileLogoutList.style.display = "block";
    }
}