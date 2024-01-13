<! Aryana Azodi  >
<style> 
	tr:nth-child(even) {
  		background-color: #D6EEEE;
	}

	table, th, td {
  		border: 2px solid black;
  		border-collapse: collapse;
		text-align: center;
	}		
</style>

<?php 

//before anything else echo the headings of the table.
echo "<table>
        <tr>   		
            <th> first name </th>
            <th> last name </th>
            <th> email address </th>
            <th> phone number </th>
            <th> favorite book </th>
            <th> operating system </th>
        </tr>";

//Checking to see the values from POST are not empty and assigning them to the variables
//Because all the fields are required in the form, checking to see if only one of the 
//the POST values is not empty is sufficent, so we don't need the other statements.
//However, I think it's good coding practice to include all cause it makes more sense.
if (isset($_POST['firstname']) && !empty($_POST['firstname']) &&
    	isset($_POST['lastname']) && !empty($_POST['lastname']) &&
    	isset($_POST['email']) && !empty($_POST['email']) &&
    	isset($_POST['phone']) && !empty($_POST['phone']) &&
    	isset($_POST['book']) && !empty($_POST['book']) &&
    	isset($_POST['OS']) && !empty($_POST['OS'])) {
    
    	
    	$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$email = $_POST['email'];
    	$phone = $_POST['phone'];
    	$book = $_POST['book'];
    	$os = $_POST['OS'];
	
	
	$filename = 'mini6.csv';

	//open csv file. The a+ allows to append and read. If I put w, it would overwrite the file.
	$openedfile = fopen($filename, 'a+');
	if ($openedfile === false) { die("Error opening $filename"); }

	//this is how the data in the csv should look like. Notice the "\n" at the end
	$data = "$firstname, $lastname, $email, $phone, $book, $os\n";

	//append the data to the file
	fwrite($openedfile, $data);

	fclose($openedfile); 
	

	$everything = file($filename); //this is like everything that has been accumlated in the csv file

	//going through each row of everything and putting them in an array assigning the values to each
	//of those variables. The explode splits the things in each row by the commas.
     	foreach ($everything as $row){
        	list($firstname, $lastname, $email, $phone, $book, $os) = explode(',', $row);
        	echo "<tr>
            		<td>$firstname</td>
            		<td>$lastname</td>
            		<td>$email</td>
            		<td>$phone</td>
            		<td>$book</td>
            		<td>$os</td>
        	</tr>";
    }
    
echo "</table>";

}

?>
