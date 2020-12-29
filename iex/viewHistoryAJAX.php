<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View History</title>
</head>
<body onLoad="Autofresh()">
<p> <span id="request"></span></p><br>


<script>
    var xmlobj;
    var count=0;
    var company = get('company');
    var startDate = get('startDate');
    var endDate = get('endDate');



    function createXMLHttpRequest(){
        if(window.ActiveXObject){
            xmlobj=new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest){
            xmlobj=new XMLHttpRequest();
        }
    }

    function Autofresh(){
        createXMLHttpRequest();
        xmlobj.open("GET","/api/viewHistoryAPI.php?company="+company+"&startDate="+startDate+"&endDate="+endDate,true);
        xmlobj.onreadystatechange=doAjax;
        xmlobj.send();
    }

    function doAjax(){
        if(xmlobj.readyState==4 && xmlobj.status==200){
            var time_span=document.getElementById('request');
            time_span.innerHTML=xmlobj.responseText;
        }
    }

    function get(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if(r != null) {

            return decodeURI(r[2]);
        }
        return null;
    }

</script>
</body>
</html>

