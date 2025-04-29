



const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})

if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}

window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})


// keknya sidebar

const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


document.addEventListener("DOMContentLoaded", function () {
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    function setActiveMenu() {
        let currentUrl = window.location.href.split('/').pop(); // Ambil nama file dari URL

        allSideMenu.forEach(item => {
            let li = item.parentElement;
            let itemUrl = item.getAttribute("href").split('/').pop(); // Ambil href dari menu
            
            if (currentUrl === itemUrl) {
                li.classList.add("active"); // Tambahkan 'active' jika cocok
            } else {
                li.classList.remove("active"); // Hapus jika tidak cocok
            }
        });
    }

    // Panggil fungsi saat halaman dimuat
    setActiveMenu();

    // Tambahkan event listener untuk mengubah active menu saat diklik
    allSideMenu.forEach(item => {
        item.addEventListener("click", function () {
            allSideMenu.forEach(i => i.parentElement.classList.remove("active"));
            this.parentElement.classList.add("active");
        });
    });
});

