I am using this same process to create and populate tables - Everything works fine except that the first row is skipped in every table. Could use another pair of eyes as I can't seem to pinpoint the issue. Thanks in advance.

   $query = "SELECT * FROM members";
   $results = mysql_query($query);
   $row = mysql_fetch_array($results);


   //echo my <table> start and headings;

    while ($row = mysql_fetch_array($results)) 
    {
    echo "<tr><td>".$row['Last Name']."</td>";
    echo "<td>".$row['First Name']."</td>";
    echo "<td>".$row['Middle Name']."</td>";
    echo "<td>".$row['Sfx']."</td>";
    echo "<td>".$row['Prf']."</td>";
    echo "<td>".$row['Spouse/SO']."</td>";
    echo "<td>".$row['Ancestor']."</td>";
    echo "<td>".$row['Status']."</td>";
    echo "<td>".$row['Address 1']."</td>";
    echo "<td>".$row['Address 2']."</td>";
    echo "<td>".$row['City']."</td>";
    echo "<td>".$row['ST']."</td>";
    echo "<td>".$row['Zip 5']."</td>";
    echo "<td>".$row['Zip 4']."</td>";
    echo "<td>".$row['Home Phone']."</td>";
    echo '<td><a href="mywebsite/mypage.php?id=' . $row['id'] . '">Bio</a></td></tr>';
    }

    echo "</table><hr>";


    -------------answers----------------------------------------------------------------------------------------------------

    You are calling mysql_fetch_array twice... once before the loop then once while looping.

If you need a seed row for use in building your header row you might be better served with a do.. while loop here.

$query = "SELECT * FROM members";
$results = mysql_query($query);
$row = mysql_fetch_assoc($results);

//echo my <table> start and headings;

do  
{
    echo "<tr><td>".$row['Last Name']."</td>";
    echo "<td>".$row['First Name']."</td>";
    echo "<td>".$row['Middle Name']."</td>";
    echo "<td>".$row['Sfx']."</td>";
    echo "<td>".$row['Prf']."</td>";
    echo "<td>".$row['Spouse/SO']."</td>";
    echo "<td>".$row['Ancestor']."</td>";
    echo "<td>".$row['Status']."</td>";
    echo "<td>".$row['Address 1']."</td>";
    echo "<td>".$row['Address 2']."</td>";
    echo "<td>".$row['City']."</td>";
    echo "<td>".$row['ST']."</td>";
    echo "<td>".$row['Zip 5']."</td>";
    echo "<td>".$row['Zip 4']."</td>";
    echo "<td>".$row['Home Phone']."</td>";
    echo '<td><a href="mywebsite/mypage.php?id=' . $row['id'] . '">Bio</a></td></tr>';
} while ($row = mysql_fetch_assoc($results));

echo "</table><hr>";



$query = "SELECT * FROM members";
$results = mysql_query($query);
$row = mysql_fetch_array($results); <-- There's your first row. Remove this.



There is extra mysql_fetch_array in the code. Also, opening table tag(<table>) is missing.

Corrected code:

$query = "SELECT * FROM members";
$results = mysql_query($query);
echo "<table>";

while ($row = mysql_fetch_array($results)) 
{
echo "<tr><td>".$row['Last Name']."</td>";
echo "<td>".$row['First Name']."</td>";
echo "<td>".$row['Middle Name']."</td>";
echo "<td>".$row['Sfx']."</td>";
echo "<td>".$row['Prf']."</td>";
echo "<td>".$row['Spouse/SO']."</td>";
echo "<td>".$row['Ancestor']."</td>";
echo "<td>".$row['Status']."</td>";
echo "<td>".$row['Address 1']."</td>";
echo "<td>".$row['Address 2']."</td>";
echo "<td>".$row['City']."</td>";
echo "<td>".$row['ST']."</td>";
echo "<td>".$row['Zip 5']."</td>";
echo "<td>".$row['Zip 4']."</td>";
echo "<td>".$row['Home Phone']."</td>";
echo '<td><a href="mywebsite/mypage.php?id=' . $row['id'] . '">Bio</a></td></tr>';
}

echo "</table><hr>";



You call mysql_fetch_array when you initialize $row, which reads the first row. You then call it a second time when you begin your while loop, which moves it to the second row before any of your loop is ran. Hence, it never does anything with the first row.


while ($row) 
{
echo "<tr><td>".$row['Last Name']."</td>";
echo "<td>".$row['First Name']."</td>";
echo "<td>".$row['Zip 4']."</td>";
echo "<td>".$row['Home Phone']."</td>";
echo '<td><a href="mywebsite/mypage.php?id=' . $row['id'] . '">Bio</a></td></tr>';
  $row = mysql_fetch_array($results);

}

echo "</table><hr>";