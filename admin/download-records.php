<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
										<th>Name</th>
                                        <th>Crop Name</th>
											<th>Climate and Soil</th>
											<th>Pre Cultivation</th>
											<th>Seed quantity and spacing</th>
											<th>Intercroping</th>
											<th>Nutrient Management</th>
											<th>Irrigation System</th>
											<th>Weed Control </th>
                                            <th>Pest Control</th>
                                            <th>Disease Control</th>
                                            <th>Harvesting Measures</th>
											
										</tr>
									</thead>

<?php 
$filename="crop list";
$sql = "SELECT * from  addcrop ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$complainNumber= $result->cropname.'</td> 
<td>'.	$MobileNumber= $result->climateandsoil.'</td> 
<td>'.$EmailId= $result->precultivation.'</td> 
<td>'.$Gender= $result->seedquantityandspacing.'</td> 
<td>'.$Age= $result->intercroping.'</td> 
 <td>'.$BloodGroup=$result->nutrientmanagement.'</td>	
  <td>'.$BloodGroup=$result->irrigationsystem.'</td>	 
   <td>'.$BloodGroup=$result->weedcontrol.'</td>	
  <td>'.$BloodGroup=$result->kidcontrol.'</td>	 
  <td>'.$BloodGroup=$result->diseasecontrol.'</td>	 	
  <td>'.$BloodGroup=$result->kidcontrol.'</td>	 	
  <td>'.$BloodGroup=$result->harvestingmeasures.'</td>	 						
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>