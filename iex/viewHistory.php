<?php
include "checkSession.php";
include "bootstrap.php";
include "navbar.php";
include "dbconnection.php";


echo "<div class=\"container\">";
echo "<div class=\"row\">";
echo "<div class=\"col-sm-4\"></div>";
echo "<div class=\"col-sm-4\">";
echo "<h1>View History</h1>";
echo "<title>View History</title>";

echo "<BR>
            <form action=\"viewHistoryAJAX.php\" method=\"get\" role=\"form\">

                <div class=\"form-group\">
                    <label for=\"company\">company: </label>
                    
                    <select class=\"form-control\" id=\"company\" name=\"company\" required=\"required\">
                    <option value=\"rfem\">rfem</option>
                    <option value=\"googl\">googl</option>
                    <option value=\"aapl\">aapl</option>
                
                    </select>
                </div>

                <div class=\"form-group\">
                    <label for=\"startDate\">Start date: </label>
                    <input  name ='startDate' id=\"startDate\" type='date' required=\"required\"  class=\"form-control\">
               </div>
               
               <div class=\"form-group\">
                    <label for=\"endDate\">End date: </label>
                    <input  name ='endDate' id=\"endDate\" type='date' required=\"required\"  class=\"form-control\">
               </div>


                <br><input type=\"submit\" value=\"Submit\" class=\"btn btn-default\">


            </form>
            ";


echo "</div>";
echo "</div>";
echo "</div>";



?>





