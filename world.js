window.onload = function() {
    let  lookUp = document.getElementById("lookup");
    let textBox = document.getElementById("country");
    let result = document.getElementById("result");

    lookUp.addEventListener('click',function(){
        var httpRequest = new XMLHttpRequest();
        let searchTerm = textBox.value;
        httpRequest.open('GET',"http://localhost/info2180-lab5/world.php?country=" +  searchTerm );
        httpRequest.send();
        httpRequest.onreadystatechange = function(){
            let response = httpRequest.responseText;
            result.innerHTML = response
        }
    });
}