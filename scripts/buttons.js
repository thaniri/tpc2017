/**
 * This function toggles the side menu visibility when the css breakpoints are small
 */
function toggleMenu() {
    if(document.getElementById("leftCol").style.display == "none"){
        document.getElementById("leftCol").style.display = "initial"
    }
    else if(document.getElementById("leftCol").style.display != "none"){
        document.getElementById("leftCol").style.display = "none"
    }
}

/**
* This function scrolls the window to the top of the page.
*/
function scrollUp(){
    window.scrollTo(0,0);
}