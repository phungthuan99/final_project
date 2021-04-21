$(document).ready(function() {
    function checkabsent() {
        var colCount = $("#datatable tr .absent").length;
        var absent = document.querySelector(".absent-count");
        console.log(absent);
        if (absent == null) {
            return 0;
        } else {
            absent.innerHTML = colCount;
        }
    }
    checkabsent();
})