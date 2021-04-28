
function showEstadistiques(value) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        getResponse(this);
    };
    xmlhttp.open("GET", "classes/getestadistiques.php?modalitat=" + value, true);
    xmlhttp.send();

}

function getResponse($response) {
    if ($response.readyState == 4 && $response.status == 200) {
        document.getElementById("taula_estadistiques_id").innerHTML = $response.responseText;
    }
}