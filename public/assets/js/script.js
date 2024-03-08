let scroller = document.querySelector(".scroller");
let height =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
let header = document.getElementsByTagName("header")[0];
let side_menu = document.getElementById("side-menu");

window.addEventListener("scroll", () => {
    let scrollTop = document.documentElement.scrollTop;
    scroller.style.width = `${(scrollTop / height) * 100}%`;
});

let btn_scroll = document.getElementById("scroll");
// let scroller = document.getElementById("scroller");
window.onscroll = function () {
    if (scrollY >= 400) {
        btn_scroll.style.display = "block";
        /*
    scroller.style.top = '94px';
    header.style.backgroundColor = "black"
    side_menu.style.top = '94px'
    */
    } else {
        btn_scroll.style.display = "none";
        /*
    scroller.style.top = '0px';
    header.style.backgroundColor = "transparent"
    side_menu.style.top = '0px'
    */
    }
};

btn_scroll.onclick = function () {
    scroll({
        left: 0,
        top: 0,
        behavior: "smooth",
    });
};

window.addEventListener("load", () => {
    // when the page loads
    document.getElementById("py_md").addEventListener("change", function () {
        if (this.value == "cash") {
            document.getElementById("paypal-section").classList.add("hide");
            document.getElementById("cash-section").classList.remove("hide");
        } else if (this.value == "c_card") {
            document.getElementById("cash-section").classList.add("hide");
            document.getElementById("paypal-section").classList.remove("hide");
        }
    });
});

function changeIcon(anchor) {
    var icon = anchor.querySelector("i");
    icon.classList.toggle("fa-sun-bright");
    document.body.classList.toggle("light-mode");
    // icon.classList.toggle("fa-moon-o");
}

var todayContainer = document.querySelector(".today");
var d = new Date();
var weekday = new Array(7);
weekday[0] = "Sunday, Closed";
weekday[1] = "Monday, 09:00 - 18:00";
weekday[2] = "Tuesday, 09:00 - 18:00";
weekday[3] = "Wednesday, 09:00 - 18:00";
weekday[4] = "Thursday, 09:00 - 18:00";
weekday[5] = "Friday, 09:00 - 18:00";
weekday[6] = "Saturday, 09:00 - 13:00";
var n = weekday[d.getDay()];
todayContainer.innerHTML = n;

let btnDrop = document.getElementById('drop_lng')
function show_hide_drop_lng() {
  btnDrop.classList.toggle('hide');
}

let btnDropCur = document.getElementById('drop_cur')
function show_hide_drop_cur() {
  btnDropCur.classList.toggle('hide');
}

function currencyConverter(currenc) {
    fetch("https://api.currencyfreaks.com/latest?apikey=e45de844a9ff4cb9966d6151cc560a62 ")
    .then((result) => {
        console.log(result);
        let myData = result.json();
        console.log(myData);
        return myData;
    })
    .then((currency) => {
        const pricesSpan = document.querySelectorAll('.prices');
        pricesSpan.forEach((priceSpan) => {
            priceSpan.innerHTML = Math.round(
                priceSpan.innerHTML * currency.rates[currenc]
            );
        });
        // let egpPrice = document.querySelector(".egp span");
        // let sarPrice = document.querySelector(".sar span");

        // egpPrice.innerHTML = Math.round(
        //     amount.innerHTML * currency.rates["EGP"]
        // );
        // sarPrice.innerHTML = Math.round(
        //     amount.innerHTML * currency.rates["SAR"]
        // );

        console.log(currency.rates);
        console.log(currency.rates["EGP"]);
        console.log(currency.rates["SAR"]);
    });
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
        else {
            entry.target.classList.remove('show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));

function showMenuUser() {
    let menu_user = document.getElementById(menu-user);
    menu_user.classList.add('showMenuUser');
}
