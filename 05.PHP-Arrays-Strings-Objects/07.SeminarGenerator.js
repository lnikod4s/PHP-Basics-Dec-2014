var links = document.getElementsByTagName('a');
for (var i = 0; i < links.length; i++) {
    (function(i) {
        var currentID = links[i].id.replace('link', 'div');
        var currentDiv = document.getElementById(currentID);
        links[i].onmousemove = function(e) {
            currentDiv.style.visibility = 'visible';
            currentDiv.style.top = e.clientY + 19 + 'px';
            currentDiv.style.left = e.clientX + 17 + 'px';
        };
        links[i].onmouseout = function() {
            currentDiv.style.visibility = 'inherit';
        };
    })(i);
}