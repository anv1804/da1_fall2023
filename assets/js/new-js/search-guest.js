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
const searchGuestOverlay = document.querySelector("form#form-search .overlay");

if (searchGuest) {
    function enableSearchGuset() {
        searchGuestInner.setAttribute("toggle", "enable");
        searchGuestInner.style.display = "block";
        searchGuestInner.style.animation = "toBottom .3s ease-in forwards";
        searchGuestArrowDown.style.transform = "rotate(180deg)";
        searchGuestOverlay.style.display = "block";
    }

    function disableSearchGuest() {
        searchGuestInner.setAttribute("toggle", "disable");
        searchGuestInner.style.display = "block";
        searchGuestInner.style.animation = "toTop .3s ease-in forwards";
        searchGuestArrowDown.style.transform = "rotate(0deg)";
        searchGuestOverlay.style.display = "none";
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
    };
}



//Logic search guest

function createStore(reducer) {
    let state = reducer(undefined , {});
    const subscribers = [];

    return {
        getState() {
            return state;
        },
        dispatch(action) {  
            state = reducer(state , action);

            subscribers.forEach(subscriber => subscriber());
        },
        subscribe(subscriber) {
            subscribers.push(subscriber);
        }
    }
}

const initState = [2, 0, 1];

function reducer(state = initState, action) {
    switch (action.type) {
        case "ADDITION":


            state[action.index] += 1;
            return state;
        case "SUBTRACTION":
            state[action.index] -= 1;
            return state; 
        default:
            return state;
    }
}

const store = createStore(reducer);

function addition(index) {
    return {
        type : 'ADDITION',
        index
    };
}

function subtraction(index) {
    return {
        type : 'SUBTRACTION',
        index
    };
}

const searchGuestBtnAddition = document.querySelectorAll('form#form-search .form-guest-btn.btn-next');
searchGuestBtnAddition.forEach((btn , index) => {
    btn.onclick = () => {
        store.dispatch(addition(index));
    }
});

const searchGuestBtnSubtraction = document.querySelectorAll('form#form-search .form-guest-btn.btn-pver');
searchGuestBtnSubtraction.forEach((btn , index) => {
    btn.onclick = () => {
        store.dispatch(subtraction(index));
    }
});

function render() {
    const output = document.querySelectorAll('form#form-search .form-content span');
    const output2 = document.querySelectorAll('form#form-search .form-guest-btn-quantity');
    output.forEach((element , index) => {
        let count = store.getState()[index];
        element.innerText = count;
        output2[index].innerText = count;
    });
}

render();

store.subscribe(() => {
    render();
});

//Event onmusedown and onmouseup btn addition , subtraction

const searchGuestBtnAdditionActive = document.querySelectorAll('form#form-search .form-guest-btn.btn-next.active'); 
const searchGuestBtnSubtractionActive = document.querySelectorAll('form#form-search .form-guest-btn.btn-pver.active');

if (searchGuestBtnAdditionActive) {
    searchGuestBtnAdditionActive.forEach(btn => {
        btn.onmousedown = () => {
            btn.style.backgroundColor = '#ffffff';
            btn.style.opacity = '0.25';
        }
        btn.onmouseup = () => {
            btn.style.backgroundColor = '#f7f9fa';
            btn.style.opacity = '1';
        }
        
    })
}

if (searchGuestBtnSubtractionActive) {
    searchGuestBtnSubtractionActive.forEach(btn => {
        btn.onmousedown = () => {
            btn.style.backgroundColor = '#ffffff';
            btn.style.opacity = '0.25';
        }
        btn.onmouseup = () => {
            btn.style.backgroundColor = '#f7f9fa';
            btn.style.opacity = '1';
        }
        
    })
}
