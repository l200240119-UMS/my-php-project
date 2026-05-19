document.addEventListener("DOMContentLoaded", function () {
  //Alert Hapus
  const tombolHapus = document.querySelectorAll(".btn-hapus");

  for (let i = 0; i < tombolHapus.length; i++) {
    tombolHapus[i].addEventListener("click", function (event) {
      let yakin = confirm("Apakah kamu yakin ingin menghapus data ini?");
      if (yakin === false) {
        event.preventDefault();
      }
    });
  }

  //Dashboard
  const menuCards = document.querySelectorAll(".menu-card");
  if (menuCards.length > 0) {
    for (let i = 0; i < menuCards.length; i++) {
      menuCards[i].addEventListener("mouseover", function () {
        this.style.backgroundColor = "#e8f5e9";
        this.style.border = "1px solid #4CAF50";
        this.style.transform = "translateY(-5px)";
        this.style.transition = "0.3s";
      });

      menuCards[i].addEventListener("mouseout", function () {
        this.style.backgroundColor = "white";
        this.style.border = "1px solid gray";
        this.style.transform = "translateY(0)";
      });
    }
  }

  // alert simpan
  const btnSimpan = document.querySelector('button[name="tambah"]');
  if (btnSimpan) {
    btnSimpan.addEventListener("click", function () {
      alert("Data sedang diproses... Silakan tunggu sebentar!");
    });
  }
});
