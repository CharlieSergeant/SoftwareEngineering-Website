<?php
include "checkSession.php";
include "bootstrap.php";
include "navbar.php";

echo "
<title>Main Page</title>>
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-sm-4\"></div>

        <div class=\"col-sm-4\">

          <h1>Main Page</h1>
            
            <ul class=\"list-group\">
                <a href=\"viewHistory.php\" class=\"list-group-item\">View History</a>
                <a href=\"basicStatistic.php\" class=\"list-group-item\">Basic Statistic Info</a>
                <a href=\"candlestickCharts.php\" class=\"list-group-item\">Candlestick Charts</a>
                
            </ul>

        </div>



    </div>
    <div class=\"row\"></div>
</div>
";

?>
