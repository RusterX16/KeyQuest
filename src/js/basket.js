showEmptyBasketConfirmModal = () => {
  const confirmModal = confirm("Are you sure you want to empty your basket?");

  if (confirmModal) {
    window.location.href = "/key_quest/index.php?action=trtEmptyBasket";
  }
};
