document.addEventListener("DOMContentLoaded", () => {

  const today = new Date();
  const formattedDate = today.toDateString(); 
  document.getElementById("date").textContent = formattedDate;
})

window.onload = () => {
    alert("Haiii! Terima kasih sudah mampir di biodata saya 😊");
};

document.addEventListener("DOMContentLoaded", () => {
    // Fade in saat halaman dimuat
    document.body.classList.add("loaded");

    // Fade out saat klik link ke halaman lain
    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            // Kalau link menuju halaman lain (bukan anchor)
            if (href && !href.startsWith("#") && !href.startsWith("javascript")) {
                e.preventDefault();
                document.body.classList.add("fade-out");
                setTimeout(() => {
                    window.location.href = href;
                }, 500); // sesuai waktu transisi CSS
            }
        });
    });
});
