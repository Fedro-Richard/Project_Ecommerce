// Toggle sidebar untuk mobile / tablet / desktop
document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const menuBtn = document.querySelector("button[aria-label='menu']");

    if (!sidebar || !menuBtn) return;

    menuBtn.addEventListener("click", () => {
        // Tambah/hapus class untuk buka/tutup sidebar
        sidebar.classList.toggle("dashboard-sidebar-open");
    });
});
