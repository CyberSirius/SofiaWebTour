function changeClass() {
    if (document.getElementById("nav-icon1").className.match(/(?:^|\s)open(?!\S)/)) {
        document.getElementById("nav-icon1").className =
            document.getElementById("nav-icon1").className.replace
            (/(?:^|\s)open(?!\S)/g, '')
    }
    else {
        document.getElementById("nav-icon1").className += " open";
    }
}
