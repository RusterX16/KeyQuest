showEmptyBasketConfirmModal = () => {
  const confirmModal = confirm("Are you sure you want to empty your basket?");

  if (confirmModal) {
    window.location.href = "/KeyQuest/index.php?action=trtEmptyBasket";
  }
};
