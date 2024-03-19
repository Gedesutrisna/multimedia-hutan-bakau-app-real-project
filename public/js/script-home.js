document.addEventListener("DOMContentLoaded", function () {
     // JavaScript to toggle sidebar visibility
const burgerIcon = document.getElementById('burger-icon');
const closeIcon = document.getElementById('close-icon');
const sidebar = document.getElementById('sidebar');

const hideSidebar = () => {
	sidebar.classList.add('hidden');
};

burgerIcon.addEventListener('click', () => {
	sidebar.classList.toggle('hidden');
});

closeIcon.addEventListener('click', () => {
	hideSidebar();
});
});
