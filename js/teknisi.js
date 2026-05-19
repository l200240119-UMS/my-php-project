//Teknisi
const btnSimpan = document.querySelector('button[name="tambah"]');
if (btnSimpan) {
  btnSimpan.addEventListener("mouseover", function () {
    this.style.transform = "scale(1.05)";
    this.style.backgroundColor = "#006400";
    this.style.boxShadow = "0 4px 10px rgba(0,0,0,0.3)";
    this.style.transition = "0.3s";
  });
  btnSimpan.addEventListener("mouseout", function () {
    this.style.transform = "scale(1)";
    this.style.backgroundColor = "green";
    this.style.boxShadow = "none";
  });
}

// tombol hapus
const semuaBtnHapus = document.querySelectorAll(".btn-hapus");
if (semuaBtnHapus.length > 0) {
  for (let i = 0; i < semuaBtnHapus.length; i++) {
    semuaBtnHapus[i].addEventListener("mouseover", function () {
      this.style.backgroundColor = "#b30000";
      this.style.borderRadius = "8px";
      this.style.transition = "0.3s";
    });
    semuaBtnHapus[i].addEventListener("mouseout", function () {
      this.style.backgroundColor = "red";
      this.style.borderRadius = "0px";
    });
  }
}

// efek tabel
const barisTabel = document.querySelectorAll("table tbody tr");
if (barisTabel.length > 0) {
  for (let i = 0; i < barisTabel.length; i++) {
    barisTabel[i].addEventListener("mouseover", function () {
      this.style.backgroundColor = "#e0e0e0";
      this.style.cursor = "pointer";
      this.style.transition = "0.2s";
    });

    barisTabel[i].addEventListener("mouseout", function () {
      this.style.backgroundColor = "";
      this.style.fontWeight = "normal";
    });
  }
}
