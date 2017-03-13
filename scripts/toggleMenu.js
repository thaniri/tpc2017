/**
 * This function toggles the side menu visibility when the css breakpoints are small
 */
function myTest() {
    if(document.getElementById("leftCol").style.display == "none"){
        document.getElementById("leftCol").style.display = "initial"
    }
    else if(document.getElementById("leftCol").style.display != "none"){
        document.getElementById("leftCol").style.display = "none"
    }
}