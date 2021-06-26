var objAjax = null;
    function createAjaxObject(){
        if(window.XMLHttpRequest) {
            try {
                obj = new XMLHttpRequest();
            } catch(e) {
                obj = false;
            }
        } else if(window.ActiveXObject) {
            try {
                obj = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                try {
                    obj = new ActiveXObject("Microsoft.XMLHTTP");
                } catch(e) {
                obj = false;
                }
            }
        }
        return obj;
    }
    function showRefreshedTable(){
        if(objAjax.readyState == 4){
            if(objAjax.status == 200) {
                document.getElementById('chessplayers').innerHTML = objAjax.responseText;
            } else {
                document.getElementById('chessplayers').innerHTML = "Houve um erro ao ler os dados remotos: "+objAjax.statusText;
            }
        }
    }
    function refreshTable(){
        objAjax = createAjaxObject();
        url = "../php/chessplayers.php?op=ler";
        objAjax.open("GET", url, true);
        objAjax.onreadystatechange = showRefreshedTable;
        objAjax.send(null);
    }

    function insertNewRecord(){
        objAjax = createAjaxObject();
        var name = document.getElementById("name").value;
        var title = document.getElementById("title").value;
        var rating = document.getElementById("rating").value;
        url = "../php/chessplayers.php";
        objAjax.open("POST", url, true);

        objAjax.setRequestHeader('Content-Type', 'application/json');
        objAjax.send(JSON.stringify({'nome': name, 'title': title, 'rating': rating}));

        window.location.href = "table.php"
        objAjax.onreadystatechange = refreshTable
    }
    function deleteFromTableWhere(id){
        objAjax = createAjaxObject();
        url = "../php/delete.php?id="+id;
        objAjax.open("GET", url, true);
        objAjax.onreadystatechange = refreshTable;
        window.location.href = "table.php"
        objAjax.send(null);
    }
    function updateFromTableWhere(id){
        objAjax = createAjaxObject();
        var name = document.getElementById("name").value;
        var title = document.getElementById("title").value;
        var rating = document.getElementById("rating").value;
        url = "../php/chessplayers.php?id="+id;
        objAjax.open("POST", url, true);

        objAjax.setRequestHeader('Content-Type', 'application/json');
        objAjax.send(JSON.stringify({'nome': name, 'title': title, 'rating': rating}));

        window.location.href = "table.php"
        objAjax.onreadystatechange = refreshTable
    }
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    if(page == "table.php"){
        refreshTable();
        setInterval("refreshTable()", 10000);
    }