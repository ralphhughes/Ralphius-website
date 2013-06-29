function highlight (menu) {
    var theMenu = document.getElementById(menu);
    var theListItems = theMenu.getElementsByTagName('A');
    for (var i = 0; i < theListItems.length; i++) {
        var theLink = theListItems[i];
        if (theLink.href==location.href) {
            theLink.style.fontWeight = 'Bold';
        }
    }
}