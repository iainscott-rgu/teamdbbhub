<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Booking: theB&Bhub</title>
</head>
<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php
        if ($_SESSION["user"] != null) {
        echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
        }else{
        echo "<p id='loginText'>currently not logged in!";
            }


            ?>
            <script>
                function logout() {

                    window.location = "SearchBB.php?value=logout";
                }
            </script>
    </div>
</section>

<section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="help.php#helpsection">Help</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>

<section class="spacer" id="spacer">


</section>



<section class="container" id="featured">
    <div class="centre">

        <p>You're B&B</p>
    </div>
</section>








<?php
$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [B&B] WHERE [bbname] = 'the grange'");
    foreach($st->fetchAll() as $row) {
        $newhtml =
            <<<NEWHTML

                        <div class="table6">
<table border="0" cellpadding="5">
<tr>
<td><strong><img src="{$row[imageurl]}" id="img3"></strong></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td colspan="2">B&B Name: <strong>{$row[bbname]}</strong></td>
</tr>
<tr>
<td colspan="2">B&B Description: <strong>{$row[bbdescription]}</strong></td>
</tr>
<tr>
<td colspan="2">Address: <strong>{$row[address]}, {$row[addressline2]}</strong></td>
</tr>
<tr>
<td>Location: <strong>{$row[city]}</strong></td>
<td>Postcode: <strong>{$row[postcode]}</strong></td>
</tr>
<tr>
<td>Check-in: <strong>{$row[checkin]}</strong></td>
<td>Check-out: <strong>{$row[checkout]}</strong></td>
</tr>
<tr>
<td>Pets allowed: <strong>{$row[pets]}</strong></td>
</tr>
<tr>
<td>Telephone: <strong>{$row[telephone]}</strong></td>
<td>Email: <strong>{$row[email]}</strong></td>

</tr>

</table>
</td>
</tr>
</table>

</div>
NEWHTML;
        print($newhtml);
    }
}
catch(PDOException $e)
{print"$e";}
?>



<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">

        <p>Room info...</p>
    </div>
</section>





<?php
$conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
try{
    $st = $conn-> query("SELECT * FROM [room] WHERE [bbid] = '100000'");
    foreach($st->fetchAll() as $row) {
        $newhtml =
            <<<NEWHTML

                        <div class="table6">
<table border="0" cellpadding="5">
<tr>
<td><strong><img src="{$row[imageurl]}" id="img3"></strong></td>
<td>
<table border="0" cellpadding="5">
<tr>
<td colspan="2">Room Name: <strong>{$row[roomname]}</strong></td>
</tr>
<tr>
<td colspan="2">Room Description: <strong>{$row[roomdescription]}</strong></td>
</tr>
<tr>
<td colspan="2">People room sleeps: <strong>{$row[numberofpeople]}</strong></td>
</tr>
<tr>
<td>Price per/night: <strong>{$row[price]}</strong></td>
<td>Single Room: <strong>{$row[single]}</strong></td>
</tr>
<tr>
<td>Double Room: <strong>{$row[double]}</strong></td>
<td>Family Room: <strong>{$row[family]}</strong></td>
</tr>
<tr>
<td>En-Suite: <strong>{$row[En-Suite]}</strong></td>
</tr>
<tr>




</table>
</td>
</tr>
</table>

</div>
NEWHTML;
        print($newhtml);
    }
}
catch(PDOException $e)
{print"$e";}
?>



<section class="spacer" id="spacer">


</section>


<section class="container" id="featured">
    <div class="centre">

        <p>You're almost there... please enter your details to complete your booking</p>
    </div>
</section>


<section class="container" id="content2">

    <form>

        <table class="table3">

            <tr><td class="small"><p>* Required Fields</p></td></tr>
            <tr><td>
                    <label for="title">Title: *</label></td>
                <td><select class="inputform" name="title" id="title">
                        <option value="">Select Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                    </select>
                </td>


                <td>
                    <label for="email">Email: *</label></td>
                <td><input type="text" id="email" class="inputform" name="email" placeholder="email" size="30" maxlength="50" required /></td>




            </tr>
            <tr>
                <td><label for="firstname">First Name: *</label></td>
                <td><input type="text" id="firstname" class="inputform" name="firstname" value="Enter your First Name" required /></td>


                <td>
                    <label for="telephone">Telephone: *</label></td>
                <td><input type="text" id="telephone" class="inputform" name="telephone" placeholder=" Enter your telephone number" size="20" maxlength="20" required /></td>
            </tr>
            </tr>
            <tr>
                <td><label for="surname">Surname: *</label></td>
                <td><input type="text" id="surname" class="inputform" name="surname" value="Enter your Surname" required /></td>
            </tr>





            <tr><td></td>
                <td><p align="right" ><input id="submit" type="submit" value="Submit" class="submit" /></p></td>
            </tr>
        </table></form>




</section>



<section class="spacer" id="spacer">


</section>

<section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="SearchBB.php">Search</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="B&Bregistration.html">Register</a></li>
                <li><a href="help.php#contactsection">Contact</a></li>
                <li><a href="help.php#helpsection">Help</a></li>
            </ul>
        </nav>
    </div>
    <div id="copyright">
        <hr width="100%" size="1">
        <p>Copyright. Team D Solutions.</p>
    </div>

</section>
</body>
</html>
