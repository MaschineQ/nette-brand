document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
});

$(document).ready(function(){
    $('.sidenav').sidenav();
});

$(document).ready(function(){
    $('.modal').modal();
});