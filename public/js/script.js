document.addEventListener("DOMContentLoaded", function () {
	const sidebar = document.querySelector(".sidebar-dashboard");
	const hamburgerButton = document.querySelector(".hamburger-menu");

	hamburgerButton.addEventListener("click", toggleSidebar);

	document.addEventListener("click", function (event) {
		const isClickInsideNavbar =
			sidebar.contains(event.target) || hamburgerButton.contains(event.target);
			
		// Menyembunyikan atau menampilkan sidebar hanya jika yang diklik adalah tombol hamburger-menu
		if (isClickInsideNavbar && event.target.classList.contains("hamburger-menu")) {
			toggleSidebar();
		}
		
		// Menyembunyikan sidebar jika yang diklik di luar sidebar dan sidebar sedang ditampilkan
		if (!isClickInsideNavbar && !sidebar.classList.contains("hidden")) {
			toggleSidebar();
		}
	});

	function toggleSidebar() {
		// Mengubah class 'hidden' untuk menampilkan atau menyembunyikan sidebar secara penuh
		sidebar.classList.toggle("hidden");
		
		// Mengubah class 'hidden' pada elemen-elemen di dalam sidebar berdasarkan ukuran layar
		const elementsToToggle = document.querySelectorAll(
			".text-dashboard, .text-appointment, .text-record, .text-immunization, .text-report, .text-setting, .text-logout"
			);
		elementsToToggle.forEach((element) => {
			element.classList.toggle("hidden", sidebar.classList.contains("hidden"));
		});
	}
});
