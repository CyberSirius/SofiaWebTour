function changeClass() {
    if (document.getElementById("nav-icon1").className.match(/(?:^|\s)open(?!\S)/)) {
        document.getElementById("nav-icon1").className =
            document.getElementById("nav-icon1").className.replace
            (/(?:^|\s)open(?!\S)/g, '')
        document.getElementById("main_content").style.width = "1366px";
        document.getElementById("main_content").style.marginLeft = "0px";
    }
    else {
        document.getElementById("nav-icon1").className += " open";
        document.getElementById("main_content").style.width = "1126px";
        document.getElementById("main_content").style.marginLeft = "240px";

    }
}
