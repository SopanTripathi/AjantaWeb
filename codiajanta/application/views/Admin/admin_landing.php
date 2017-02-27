<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            @import url('http://fonts.googleapis.com/css?family=Amarante');
            #wrapper {
                display: block;
                width: 850px;
                background: #fff;
                margin: 0 auto;
                padding: 10px 17px;
                -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
            }
            h1 {
                font-family: 'Amarante', Tahoma, sans-serif;
                font-weight: bold;
                font-size: 3.6em;
                line-height: 1.7em;
                margin-bottom: 10px;
                text-align: center;
            }

            #keywords thead tr th {
                font-weight: bold;
                padding: 12px 30px;
            }
            #keywords td  {
                padding: 12px 30px;
            }
            #keywords tobody tr td  {
                padding: 12px 55px;
            }


        </style>
    </head>

    <body>
        <div id="wrapper">
            <h1>List of all Users</h1>
            <table id="keywords" cellspacing="3" cellpadding="3"> 
                <?php
                if (isset($users)) {
                    $i = 1;
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Name of User</th>";
                    echo "<th>Profile</th>";
                    echo "<th>Allow Painting</th>";
                    echo "<th>Allow Stories</th>";
                    echo "<th>Allow Animation</span></th>";
                    echo "<th>Change Rights</span></th>";
                    echo "</tr>";
                    echo "</thead>";


                    echo "<tbody>";
                    //"$records" is key you are getting from controller who is loading this method 
                    foreach ($users as $r) {
                        echo "<tr>";
                        echo "<td>" .ucfirst($r->first_name). "</td>";
                        echo "<td>" .ucfirst($r->user_profile). "</td>";
                        //echo "<td>" . $r->allow_stories . "</td>";
                        echo "<td><input type='checkbox' name='allow_painting'></td>";
                        echo "<td><input type='checkbox' name='allow_story'></td>";
                        echo "<td><input type='checkbox' name='allow_animation'></td>";
                        echo "<td><input type='submit' name='submit' value='Submit'></td>";
                        echo "<tr>";
                    }
                } else {
                    echo "Currenlty there is no user in our Database";
                }
                echo "</tbody>";
                ?>
            </table> 
        </div>
    </body>
</html>