showLogoutModal = () => {
  if (confirm("Are you sure you want to logout?")) {
    window.location.href = "/key_quest/index.php?action=trtLogout";
  }
};
