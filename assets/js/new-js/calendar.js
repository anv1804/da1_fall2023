const daysTag = document.querySelectorAll(".days");
const currentDate = document.querySelectorAll(".current-date"),
    prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth();

// storing full name of all months in array
const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

const calendar = (currMonth, currYear) => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
        lastDayofMonth = new Date(
            currYear,
            currMonth,
            lastDateofMonth
        ).getDay(), // getting last day of month
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month

    let liTag = "";
    let index = 0;

    for (let i = firstDayofMonth; i > 0; i--) {
        // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        index++;
    }

    let dateAc = validateDay(lastDateofMonth , listDate);

    for (let i = 1; i <= lastDateofMonth; i++) {
        // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let dateStartAc = dateAc[0].includes(i) ? "active" : "";
        let dateEndAc = dateAc[2].includes(i) ? "active" : "";
        let dateMiddleAc = dateAc[1].includes(i) ? "enable" : "";

        liTag += `<li class="${dateStartAc} ${dateEndAc} ${dateMiddleAc}">${i}</li>`;
        index++;
    }

    index = index + (6 - lastDayofMonth) <= 35 ? 13 : 6;
    for (let i = lastDayofMonth; i < index; i++) {
        // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }

    return liTag;
};

const validateDay = (lastDateofMonth, listDate) => {
    let dateStarts = [];
    let dateEnds = [];
    let dateMiddles = [];
    let timeStarts = [];
    let timeEnds = [];
    if (listDate) {
        listDate.forEach((date) => {
            let dateStart = date.date_start.split("|");
            let timeStart = dateStart[1];
            let dayStart = dateStart[0].split("/").map(Number);
            let dateEnd = date.date_end.split("|");
            let timeEnd = dateEnd[1];
            let dayEnd = dateEnd[0].split("/").map(Number);

            //date Start and date End
            for (let i = 1; i <= lastDateofMonth; i++) {
                if (
                    i == dayStart[0] &&
                    (currMonth == dayStart[1] - 1)
                ) {
                    dateStarts.push(i);
                    timeStarts.push(timeStart);
                }
                if (
                    i == dayEnd[0] &&
                    (currMonth == dayEnd[1] - 1)
                ) {
                    dateEnds.push(i);
                    timeEnds.push(timeEnd);
                }
            }

            //date Middle
            if (
                dayStart[1] - 1 == currMonth &&
                dayStart[2] == dayEnd[2] &&
                dayEnd[1] - 1 == currMonth
            ) {
                for (let i = 1; i <= lastDateofMonth; i++) {
                    if (dayStart[0] - i < 0 && i < dayEnd[0]) {
                        dateMiddles.push(i);
                    }
                    if (dayEnd[0] - i > 0 && i > dayStart[0]) {
                        dateMiddles.push(i);
                    }
                }
            }
            if (dayStart[1] != dayEnd[1] || dayEnd[2] - dayStart[2] > 0) {
                if (dayStart[1] - 1 == currMonth) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        if (dayStart[0] - i < 0) {
                            dateMiddles.push(i);
                        }
                    }
                }
                if (dayEnd[1] - 1 == currMonth) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        if (dayEnd[0] - i > 0) {
                            dateMiddles.push(i);
                        }
                    }
                }
            }
            if (
                dayEnd[1] - 1 > currMonth &&
                dayStart[1] - 1 < currMonth &&
                dayEnd[2] == currYear &&
                dayStart[2] == currYear
            ) {
                if (dayEnd[1] - currMonth > 0) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        dateMiddles.push(i);
                    }
                }
            }
            if (dayEnd[2] - dayStart[2] > 0) {
                if (dayEnd[1] - 1 > currMonth && dayEnd[2] == currYear) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        dateMiddles.push(i);
                    }
                }
                if (dayStart[1] - 1 < currMonth && dayStart[2] == currYear) {
                    for (let i = 1; i <= lastDateofMonth; i++) {
                        dateMiddles.push(i);
                    }
                }
            }
        });
    }
    return [dateStarts, dateMiddles, dateEnds, timeStarts, timeEnds];
};

const renderCalendar = (initRender) => {
    currentDate.forEach((item, index) => {
        currMonth =
            index === 1
                ? currMonth + 1
                : initRender === 0
                ? currMonth
                : index === 0
                ? currMonth - 1
                : currMonth;
        if (currMonth < 0 || currMonth > 11) {
            // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }

        item.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
        let liTag = calendar(currMonth, currYear);
        daysTag[index].innerHTML = liTag;
    });
};

renderCalendar(0);

if (prevNextIcon) {
    prevNextIcon.forEach((icon) => {
        // getting prev and next icons
        icon.addEventListener("click", () => {
            // adding click event on both icons
            // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

            if (currMonth < 0 || currMonth > 11) {
                // if current month is less than 0 or greater than 11
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

const listBtnDate = document.querySelectorAll("#room-status .list-date li");

if (listBtnDate) {
    listBtnDate.forEach((btn) => {
        btn.onclick = () => {
            let dateBtn = btn.innerHTML;
            dateBtn = dateBtn.split(" - ");
            dateBtn = dateBtn[0].split("|");
            let dateBtnStart = dateBtn[0].split("/").map(Number);
            currMonth = dateBtnStart[1];
            currYear = dateBtnStart[2];
            renderCalendar();
        };
    });
}

//check day form purchase
const formPurchase = document.querySelector("#form-purchase");

if (formPurchase) {
    const inputDates = formPurchase.querySelector('input[name="dates"]'),
        errorMessage = formPurchase.querySelectorAll(".form-message"),
        inputTimes = formPurchase.querySelectorAll(
            ".time-pickable.form-control"
        );


    formPurchase.onsubmit = function (event) {
        // event.preventDefault();
        let invalid = false;
        let invalid1 = false;
        let invalidTime = false;

        let times = [];
        inputTimes.forEach((time) => {
            if (time.value.split(" ")[1] == "am") {
                times.push(time.value.split(" ")[0]);
            } else {
                time = time.value.split(" ")[0];
                time = time.split(":").map(Number);
                time[0] += 12;
                times.push(time.join(":"));
            }
        });

        let dates = inputDates.value.split(" - ");

        (date = new Date()),
            (currYear = date.getFullYear()),
            (currMonth = date.getMonth());
        let currentDay = date.getDate();

        let dateStart = dates[0].split("/").map(Number);
        if (
            dateStart[1] <= currentDay &&
            dateStart[0] - 1 == currMonth &&
            dateStart[2] == currYear
        ) {
            invalid1 = true;
        }
        if (
            (dateStart[0] - 1 < currMonth && dateStart[2] == currYear) ||
            dateStart[2] < currYear
        ) {
            invalid1 = true;
        }

        invalid = CheckForDuplicates(dates, listDate);

        if (!invalid1 && !invalid) {
            let textError1 = '';
            let textError2 = '';

            dates.forEach((date) => {
                date = date.split("/").map(Number);
                let lastDateofLastMonth = new Date(
                    date[2],
                    date[0],
                    0
                ).getDate();

                currMonth = date[0] - 1;
                currYear = date[2];

                let dateAc = validateDay(lastDateofLastMonth, listDate);

                if (!invalid) {


                    if (dateAc[2].includes(date[1])) {
                        let index = dateAc[2].indexOf(date[1]);
                        
                        let time = dateAc[4][index].split(":");
                        let time1 = new Date();
                        time1.setHours(time[0], time[1], 0, 0);
                        time1.setMinutes(time1.getMinutes() + 20);

                        times[0] = times[0].split(':');
                        let time2 = new Date();
                        time2.setHours(times[0][0], times[0][1], 0, 0);

                        
                        if (time1 > time2) {
                            textError1 = ` Room available after ${time1.getHours()}:${time1.getMinutes()}!`;
                            invalidTime = true;
                        }else {
                            textError1 = '';
                        }
                    }
                    if (dateAc[0].includes(date[1])) {
                        let index = dateAc[0].indexOf(date[1]);
                        
                        let time = dateAc[3][index].split(":");
                        let time1 = new Date();
                        time1.setHours(time[0], time[1], 0, 0);
                        time1.setMinutes(time1.getMinutes() - 20);


                        times[1] = times[1].split(':');
                        let time2 = new Date();
                        time2.setHours(times[1][0], times[1][1], 0, 0);

                        if (time1 < time2) {
                            textError2 = ` Room available before ${time1.getHours()}:${time1.getMinutes()}!`;
                            invalidTime = true;
                        }else {
                            textError2 = '';
                        }
                    }
                }
            });
            
            errorMessage[1].innerHTML = `${textError1} ${textError2}`;
        }

        if (invalidTime) {
            return false;
        }
        if (invalid1) {
            errorMessage[0].innerHTML =
                "Cannot be booked before the current date!";
            return false;
        }
        if (invalid) {
            errorMessage[0].innerHTML = "This calendar already exists!";
            return false;
        }
        if (!invalid1 && !invalid && !invalidTime) {
            errorMessage[0].innerHTML = "";
            return true;
        }
    };
}

function convertDate(date) {
    var [month, day, year] = date.split("/");
    return new Date(year, month - 1, day);
}

function formatDate(dateString) {
    let [day, month, year] = dateString.split("/");
    return `${month}/${day}/${year}`;
}

function CheckForDuplicates(dates, listDate) {
    let c1 = {
        dateStart: convertDate(dates[0]),
        dateEnd: convertDate(dates[1]),
    };

    for (let i = 0; i < listDate.length; i++) {
        let dateStart = formatDate(listDate[i].date_start.split("|")[0]);
        let dateEnd = formatDate(listDate[i].date_end.split("|")[0]);

        let c2 = {
            dateStart: convertDate(dateStart),
            dateEnd: convertDate(dateEnd),
        };

        if (
            (c1.dateStart < c2.dateEnd && c1.dateEnd > c2.dateStart) ||
            (c2.dateStart < c1.dateEnd && c2.dateEnd > c1.dateStart)
        ) {
            return true;
        }
    }

    return false;
}

