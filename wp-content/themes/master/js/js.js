
window.onload = function () {
    var id = window.location.search ? Number(window.location.search.split('=')[1]) : 1
    var paging = document.getElementById('paging');
    var a = paging.getElementsByTagName("a");
    a[id - 1].classList.add("active");
}
function go (id) {
    window.location.href = `Lecture.php?page=${Number(id) + 1}`
}