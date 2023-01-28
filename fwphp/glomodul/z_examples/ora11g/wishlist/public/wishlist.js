/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function showHideLogonForm() {
    if (document.all.logon.style.visibility == "visible"){
        document.all.logon.style.visibility = "hidden";
        document.all.myWishList.value = "<< Wish List (master with psw)";
    }
    else {
        document.all.logon.style.visibility = "visible";
        document.all.myWishList.value = "Wish List (master with psw) >>";
    }
}

function showHideShowWishListForm() {
    if (document.all.wishList.style.visibility == "visible") {
        document.all.wishList.style.visibility = "hidden";
        document.all.showWishList.value = "Show Wish List of >>";
    }
    else {
        document.all.wishList.style.visibility = "visible";
        document.all.showWishList.value = "<< Show Wish List of";
    }
}


