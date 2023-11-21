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
            if (action.index != 2) {
                state = countRoom(state);
            }
            searchGuestRules(state);
            return state;
        case "SUBTRACTION":
            state[action.index] -= 1;
            searchGuestRules(state);
            return state; 
        case "CLEAR":
            return [2 , 0  , 1];
        default:
            return state;
    }
}

const store = createStore(reducer);

function countRoom(state) {
    state[2] = Math.ceil( ( (state[0]*2) + state[1] ) / 4); 
    return state
}

function searchGuestRules(state) {
    if (state[0] <= 1 || state[2] >= state[0]) {
        if (searchGuestBtnSubtraction[0].classList.contains('active')) {
            searchGuestBtnSubtraction[0].classList.remove('active');
        }
    }else {
        if (!searchGuestBtnSubtraction[0].classList.contains('active')) {
            searchGuestBtnSubtraction[0].classList.add('active');
        }
    }

    if (state[1] <= 0) {
        if (searchGuestBtnSubtraction[1].classList.contains('active')) {
            searchGuestBtnSubtraction[1].classList.remove('active');
        }
    }else {
        if (!searchGuestBtnSubtraction[1].classList.contains('active')) {
            searchGuestBtnSubtraction[1].classList.add('active');
        }
    }
    if (state[1] >= 8 ) {
        if (searchGuestBtnAddition[1].classList.contains('active')) {
            searchGuestBtnAddition[1].classList.remove('active');
        }
    }else {
        if (!searchGuestBtnAddition[1].classList.contains('active')) {
            searchGuestBtnAddition[1].classList.add('active');
        }
    }

    if (state[2] <= 1) {
        if (searchGuestBtnSubtraction[2].classList.contains('active')) {
            searchGuestBtnSubtraction[2].classList.remove('active');
        }
    }else {
        if (!searchGuestBtnSubtraction[2].classList.contains('active')) {
            searchGuestBtnSubtraction[2].classList.add('active');
        }
    }
    if (state[2] >= 8  || state[2] >= state[0]) {
        if (searchGuestBtnAddition[2].classList.contains('active')) {
            searchGuestBtnAddition[2].classList.remove('active');
        }
    }else {
        if (!searchGuestBtnAddition[2].classList.contains('active')) {
            searchGuestBtnAddition[2].classList.add('active');
        }
    }
}

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

const searchGuestBtnClear = document.querySelector('form#form-search .form-guest-btn-clear');
searchGuestBtnClear.onclick = () => {
    store.dispatch({type : 'CLEAR'});
}

function render() {
    const output = document.querySelectorAll('form#form-search .form-content span');
    const output2 = document.querySelectorAll('form#form-search .form-guest-btn-quantity');
    const input = document.querySelector('form#form-search input[name="guest"]');

    input.value = store.getState();
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


if (searchGuestBtnAddition) {
    searchGuestBtnAddition.forEach(btn => {
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

if (searchGuestBtnSubtraction) {
    searchGuestBtnSubtraction.forEach(btn => {
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
