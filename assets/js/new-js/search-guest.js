const searchGuestInner = document.querySelector(
    "form#form-search .form-guest-inner"
);
const searchGuest = document.querySelector("form#form-search .form-guest");
const searchGuestArrowDown = document.querySelector(
    "form#form-search .icon-search3"
);
const searchGuestInnerBtnClose = document.querySelectorAll(
    "form#form-search .form-guest-close"
);
const searchGuestOverlay = document.querySelector(
    "form#form-search .overlay"
);

if (searchGuest) {
    function enableSearchGuset() {
        searchGuestInner.setAttribute("toggle", "enable");
        searchGuestInner.style.display = "block";
        searchGuestInner.style.animation = "toBottom .3s ease-in forwards";
        searchGuestArrowDown.style.transform = "rotate(180deg)";
        searchGuestOverlay.style.display = 'block';
    }

    function disableSearchGuest() {
        searchGuestInner.setAttribute("toggle", "disable");
        searchGuestInner.style.display = "block";
        searchGuestInner.style.animation = "toTop .3s ease-in forwards";
        searchGuestArrowDown.style.transform = "rotate(0deg)";
        searchGuestOverlay.style.display = 'none';
    }

    searchGuest.onclick = () => {
        if (searchGuestInner) {
            if (searchGuestInner.getAttribute("toggle") == "enable") {
                disableSearchGuest();
            } else {
                enableSearchGuset();
            }
        }
    };

    searchGuestInnerBtnClose.forEach((btn) => {
        btn.onclick = () => {
            if (searchGuestInner.getAttribute("toggle") == "enable") {
                disableSearchGuest();
            }
        };
    });

    searchGuestOverlay.onclick = () => {
        disableSearchGuest();
    }
}
