<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if(isset($_POST['allocate']))
        {
           $id=$_POST['facultyid'];  
            $sql= "INSERT INTO `pmas`.`request` (`request_id`, `s_id`, `f_id`) VALUES ('', '$user', '$id');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:skill.php');  
                  
        }




if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
	{
		background-image:url(../background.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
</head>
<div>
<body>

 <?php
 header('Location:../Admin.php');
}
elseif($role=="Faculty")    
{
    header('Location:../Admin.php');
?>
    
 <?php
}
else   
{
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
    {
        background-image:radial-gradient( rgb(59, 2, 74),rgb(63, 11, 76),rgb(47, 4, 40));
        background-repeat: no-repeat; 
        background-attachment: fixed;
        background-size: 100% 100%;
               
    }
    .nav a{
        cursor:pointer; border: 3px solid black; padding: 10px; font-size: 20px; text-decoration: none; color: black;border-radius: 25px; 
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
    .nav a:hover{
        background-color: black;
        color: white;
    }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr style="background-color: rgb(255,255,255, 0.5);">
    <th width="74" scope="col">&nbsp;</th>
    <th width="164" scope="col"></a></th>
    <th width="646" scope="col"><h1 style="color: black; font-size: 55px;">Project Managenent System</h1></th>
    <th width="140" scope="col"><font color="black" size="5">
	<?php
    print $role;
    echo "<br/>";
    print $user;
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="00" cellpadding="00" class="nav">
      <tr style="background-color: rgb(255,255,255, 0.5);">
          <th width="7%" scope="col"><h4>&nbsp;</h4></th>
          <th width="13%" scope="col"><a href="project.php">Project</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="skill.php">View Skill Matrix</a></th>
    <th width="11%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="mail.php">Mail</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
<?php
}
?>
</table>
<p>
  <?php
}
?>
    
    
    <div style="background-color: rgb(255,255,255, 0.5); width: 50%; margin-left: 25%; margin-top: 100px; border-radius: 25px; padding:50px;box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;">
        <br/><br/>
    <form method="post" action="skill.php">
        <table align="center" width="40%" style="background-color:rgb(255, 255, 255, 1.0); border-radius:25px;box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;">
        <tr>
            
            <td align="center">
              <br/><br/>  
    <?php
            include '../connection.php';
             $sql="select f_id from faculty";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="faculty">
                 <option selected="selected"><h3>Supervisors</h3></option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select>  <br/><br/>
        <input style="border-radius: 25px;"type="submit" name="asses" value="View Skill Matrix"/><br/><br/>
            </td>
            
        </tr>
    </table>    
         </form>
    
    
    
    <br/><br/><br/>
    
    
    
    
    <form method="post" action="skill.php">
       <div style="background-color: rgb(255, 255, 255, 1.0); width: 80%; margin-left: 10%; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;"> 
    <table width="50%" cellpadding="5" cellspacing="5" border="0" align="center">
    <?php
            if (isset($_POST['asses']))
            {   
                $fid=$_POST['faculty'];          
                echo "<tr>";?>
                <td>Faculty ID</td>
                <td><input type="text" name="facultyid"  readonly value="<?php echo $fid;?>" readonly ></td>
                <?php
                echo "</tr>";
                
                $sql1="select * from faculty where f_id ='$fid' ";
                $rec=mysqli_query($conn, $sql1);
                while ($std= mysqli_fetch_assoc($rec))
                {
                echo "<tr>";
                echo "<td>"."Name"."</td>";
                echo "<td>"?> <input type="text" name="stid" readonly value="<?php echo $std['name'];?>"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Qualification"."</td>";
                echo "<td>"?> <input type="text" name="faqu" readonly value="<?php echo $std['qualification'];?>"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Domain"."</td>";
                echo "<td>"?> <input type="text" name="fad" readonly value="<?php echo $std['domain'];?>"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Research"."</td>";
                echo "<td>"?> <input type="text" name="far" readonly value="<?php echo $std['research'];?>"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Others"."</td>";
                echo "<td>"?> <input type="text" name="fao" readonly value="<?php echo $std['others'];?>"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td>"?> <input type="submit" name="allocate" readonly value="Request For Allocate"/> <?php "</td>";
                echo "</tr>";
                
                }
                
               
            }
    ?>
                
    </table>
        </div>
    </form>
    <br/><br/><br/>
    </div>