<?php

include "checkSession.php";

echo "

<nav class=\"navbar navbar-default\" role=\"navigation\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <a class=\"navbar-brand\" href=\"#\">IEX</a>
        </div>
           
         <div>
         
         <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"main.php\">Main page</a></li>
        </ul>
        
        <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"viewHistory.php\">View History</a></li>
        </ul>
        
        <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"basicStatistic.php\">Basic Statistic</a></li>
        </ul>
        
        <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"candlestickCharts.php\" >Candlestick Charts</a></li>
        </ul>
        <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"logout.php\">Logout</a></li>
        </ul>
    </div>

    
    </div>
</nav>
";

?>
