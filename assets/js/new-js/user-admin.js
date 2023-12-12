let thisPage = 1;
let limit = 4;
let list = document.querySelectorAll(".dashboard-content ");
function loadItem() {
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    list.forEach((item, key) => {
        if (key >= beginGet && key <= endGet) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
    listPage();
}
loadItem();
function listPage() {
    let count = Math.ceil(list.length / limit);
    document.querySelector(".dashboard-content .pagination").innerHTML ="";

    for (i = 1; i <= count; i++) {
        let newPage = document.createElement("li");
        newPage.innerHTML = `<a class="page-link">${i}</a>`;
        if (i == thisPage) {
            newPage.querySelector("a").classList.add("active");
        }
        newPage.setAttribute("onclick", "changePage(" + i + ")");
        document
            .querySelector(".dashboard-content  .pagination")
            .appendChild(newPage);
    }

    if (!document.querySelector(".dashboard-content  .pagination li a span")) {
        let prev = document.createElement("li");
        prev.innerHTML ='<a class="page-link prev"><span aria-hidden="true">«</span></a>';
            document
            .querySelector(".dashboard-content  .pagination")
            .prepend(prev);
            let next = document.createElement("li");
            next.innerHTML =
            '<a class="page-link next"><span aria-hidden="true">»</span></a>';
            document
            .querySelector(".dashboard-content  .pagination")
            .appendChild(next);
    }
    const prev = document.querySelector('.dashboard-content  .pagination li a.prev');
    const next = document.querySelector('.dashboard-content  .pagination li a.next');
    if (thisPage != 1) {
        prev.setAttribute("onclick", "changePage(" + (thisPage - 1) + ")");
        prev.style.opacity = "1";
    }
    if (thisPage == 1) {
        prev.style.opacity = "0";
        prev.setAttribute("onclick", "");
    }

    if (thisPage != count) {

        next.setAttribute("onclick", "changePage(" + (thisPage + 1) + ")");
        next.style.opacity = "1";
    }
    if (thisPage == count) {
        next.style.opacity = "0";
        next.setAttribute("onclick", "");
    }
    document
        .querySelector(".dashboard-content  .pagination li")
        .classList.add("page-item");
}
function changePage(i) {
    thisPage = i;
    loadItem();
}
