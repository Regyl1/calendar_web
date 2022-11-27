function changeColor(element){
    element.classList.toggle("changed-background");
    
    var data = new FormData();
    data.append("date", element.id);

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.open('POST', '/ajax_script.php');
    objXMLHttpRequest.send(data);
}