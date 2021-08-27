var myindex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("otm-carousel");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";

    }
    myindex++;
    if (myindex > x.length) {
        myindex = 1;
    }
    x[myindex - 1].style.display = "contents";
    setTimeout(carousel, 2200);
}
