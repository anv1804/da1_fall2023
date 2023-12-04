const daysTag = document.querySelectorAll(".days");
const currentDate = document.querySelectorAll(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");


// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const calendar = (currMonth , currYear) => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month

    let liTag = "";
    let index = 0;

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        index++;
    }


    let dateAc = validateDay(lastDateofLastMonth , listDate);

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let dateStartAc = dateAc[0].includes(i) ? "active" : "";
        let dateEndAc = dateAc[2].includes(i) ? "active" : "";
        let dateMiddleAc = dateAc[1].includes(i) ? 'enable' : '';
        
        liTag += `<li class="${dateStartAc} ${dateEndAc} ${dateMiddleAc}">${i}</li>`;
        index++;
    }

    index = index + (6-lastDayofMonth) <= 35 ? 13 : 6;
    for (let i = lastDayofMonth; i < index; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }

    return liTag;
}

const validateDay = (lastDateofMonth , listDate) => {
    let dateStarts = [];
    let dateEnds = [];
    let dateMiddles = [];
    if (listDate) {
        listDate.forEach(date => {
            let dateStart = date.date_start.split('/').map(Number);
            let dateEnd = date.date_end.split('/').map(Number);
            
            //date Start and date End
            for (let i = 1; i <= lastDateofMonth; i++) { 
                if (i == dateStart[0] && currMonth === (dateStart[1]-1) && currYear == dateStart[2]) {
                    dateStarts.push(i);
                }
                if ( i == dateEnd[0] && currMonth === (dateEnd[1]-1) && currYear == dateEnd[2] ) {
                    dateEnds.push(i);
                }
            }
    
            //date Middle
            if ((dateStart[1]-1) == currMonth && dateStart[2] == dateEnd[2] && (dateEnd[1]-1) == currMonth) {
                for (let i = 1; i <= lastDateofMonth; i++) {
                    if (dateStart[0] - i < 0 && i < dateEnd[0]) {
                        dateMiddles.push(i);
                    }
                    if (dateEnd[0] - i > 0 && i > dateStart[0]) {
                        dateMiddles.push(i);
                    }
                }
            }
            if (dateStart[1] != dateEnd[1] || dateEnd[2] - dateStart[2] > 0) { 
                if ((dateStart[1]-1) == currMonth) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        if (dateStart[0] - i < 0) {
                            dateMiddles.push(i);
                        }
                    }
                }
                if ((dateEnd[1]-1) == currMonth) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        if (dateEnd[0] - i > 0) {
                            dateMiddles.push(i);
                        }
                    }
                }
            }
            if (dateEnd[1]-1 > currMonth && dateStart[1]-1 < currMonth && dateEnd[2] == currYear  && dateStart[2] == currYear) {
                if (dateEnd[1] - currMonth > 0) {
                    for (let i = 1; i <= lastDateofMonth; i++) { 
                        dateMiddles.push(i);
                    }
                }
            }
            if (dateEnd[2] - dateStart[2] > 0) {
                if (dateEnd[1] - 1 > currMonth && dateEnd[2] == currYear) {
                    for (let i = 1; i <= lastDateofMonth; i++) { 
                        dateMiddles.push(i);
                    }
                }
                if (dateStart[1] - 1 < currMonth && dateStart[2] == currYear) {
                    for (let i = 1; i <= lastDateofMonth; i++) { 
                        dateMiddles.push(i);
                    }
                }
            }
        
        })
    }
    return [dateStarts , dateMiddles , dateEnds];
}

const renderCalendar = (initRender) => {
    currentDate.forEach((item , index) => {
        currMonth = index === 1 ? currMonth+1 : initRender === 0 ? currMonth : index === 0 ? currMonth-1 : currMonth;
        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }

        item.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
        let liTag = calendar(currMonth , currYear);
        daysTag[index].innerHTML = liTag;
    })
}

renderCalendar(0);

if (prevNextIcon) {
    prevNextIcon.forEach(icon => { // getting prev and next icons
        icon.addEventListener("click", () => { // adding click event on both icons
            // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
    
            if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                // creating a new date of current year & month and pass it as date value
                date = new Date(currYear, currMonth, new Date().getDate());
                currYear = date.getFullYear(); // updating current year with new date year
                currMonth = date.getMonth(); // updating current month with new date month
            } else {
                date = new Date(); // pass the current date as date value
            }
            renderCalendar(); // calling renderCalendar function
        });
    });
}

const listBtnDate = document.querySelectorAll('#room-status .list-date li');

if (listBtnDate) {
    listBtnDate.forEach(btn => {
        btn.onclick = () => {
            let dateBtn = btn.innerHTML;
            dateBtn = dateBtn.split(' - ');
            let dateBtnStart = dateBtn[0].split('/').map(Number);
            currMonth = dateBtnStart[1];
            currYear = dateBtnStart[2];
            renderCalendar();
        }
    })
}

//check day form purchase
const formPurchase = document.querySelector('#form-purchase');

if (formPurchase) {
    const inputDates = formPurchase.querySelector('input[name="dates"]'),
    errorMessage = formPurchase.querySelector('.form-message');
    formPurchase.onsubmit = function() {
        let invalid = false;
        let invalid1 = false;
        let dates = inputDates.value.split(' - ');

        date = new Date(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth();
        let currentDay = date.getDate();

        let dateStart = dates[0].split('/').map(Number);
        if (dateStart[1] <= currentDay && dateStart[0]-1 == currMonth && dateStart[2] == currYear) {
            invalid1 = true;
        }
        if ((dateStart[0]-1 < currMonth && dateStart[2] == currYear) || (dateStart[2] < currYear)) {
            invalid1 = true;
        }
        if (!invalid1) {
            dates.forEach(date => {
    
                date = date.split('/').map(Number);
                let lastDateofLastMonth =  new Date(date[2], date[0], 0).getDate();
    
        
                currMonth = date[0]-1;
                currYear = date[2];
        
                let dateAc = validateDay(lastDateofLastMonth , listDate);
        
                if (dateAc[0].includes(date[1]) || dateAc[1].includes(date[1]) || dateAc[2].includes(date[1])) {
                    invalid = true;
                }
                
            })
        }
        if (invalid1) {
            errorMessage.innerHTML = 'Cannot be booked before the current date!';
            return false;
        }
        if (invalid) {
            errorMessage.innerHTML = 'This calendar already exists!';
            return false;
        }
        if(!invalid1 && !invalid) {
            errorMessage.innerHTML = '';
            return true;
        }
    }
}

