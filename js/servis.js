// efek form
const elemenForm = document.querySelectorAll(
  ".form-card input, .form-card select, .form-card textarea",
);

for (let i = 0; i < elemenForm.length; i++) {
  elemenForm[i].addEventListener("focus", function () {
    this.style.backgroundColor = "#e8f0fe";
    this.style.border = "2px solid #4CAF50";
    this.style.outline = "none";
    this.style.transition = "0.3s";
  });

  elemenForm[i].addEventListener("blur", function () {
    this.style.backgroundColor = "";
    this.style.border = "1px solid gray";
  });
}

// efek dropdown
const dropdowns = document.querySelectorAll("select");
for (let j = 0; j < dropdowns.length; j++) {
  dropdowns[j].addEventListener("mouseover", function () {
    this.style.cursor = "pointer";
    this.style.borderColor = "#4CAF50";
  });
  dropdowns[j].addEventListener("mouseout", function () {
    this.style.borderColor = "gray";
  });
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

// tombol simpan servis
const btnSimpanServis = document.querySelector('button[name="tambah"]');
if (btnSimpanServis) {
  btnSimpanServis.addEventListener("mouseover", function () {
    this.style.backgroundColor = "#006400";
    this.style.transform = "translateY(-2px)";
    this.style.boxShadow = "0 4px 8px rgba(0,0,0,0.3)";
    this.style.transition = "0.3s";
  });
  btnSimpanServis.addEventListener("mouseout", function () {
    this.style.backgroundColor = "green";
    this.style.transform = "translateY(0)";
    this.style.boxShadow = "none";
  });
}

// buton selesai
const semuaBtnSelesai = document.querySelectorAll(".btn-selesai");
if (semuaBtnSelesai.length > 0) {
  for (let k = 0; k < semuaBtnSelesai.length; k++) {
    semuaBtnSelesai[k].addEventListener("mouseover", function () {
      this.style.backgroundColor = "#004d00";
      this.style.paddingLeft = "20px";
      this.style.paddingRight = "20px";
      this.style.transition = "0.3s";
    });
    semuaBtnSelesai[k].addEventListener("mouseout", function () {
      this.style.backgroundColor = "green";
      this.style.paddingLeft = "10px";
      this.style.paddingRight = "10px";
    });
  }
}
