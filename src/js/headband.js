showLogoutModal = () => {
  const confirmModal = confirm("Are you sure you want to logout?");

  if (confirmModal) {
    window.location.href = "/KeyQuest/index.php?action=trtLogout";
  }
};
