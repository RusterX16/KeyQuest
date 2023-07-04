showEmptyBasketConfirmModal = () => {
  if (confirm("Are you sure you want to empty your basket?")) {
    window.location.href = "/key_quest/index.php?action=trtEmptyBasket";
  }
};
