showLogoutModal = () => {
  const confirmModal = confirm("Are you sure you want to logout?");

  if (confirmModal) {
    window.location.href = "/key_quest/index.php?action=trtLogout";
  }
};
