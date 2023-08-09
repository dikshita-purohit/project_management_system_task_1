<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';


if(isset($_POST['allocate']))
{
           $sid=$_POST['sid']; 
           $fid=$_POST['faid'];
           $proid=$_POST['projectid'];
                      
           if (!empty($sid)|| !empty($fid)||!empty($proid))
           {
              
            $sql= "INSERT INTO `pmas`.`project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES ('$proid', '', '', '$sid', '$fid', '', '', '');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:allocate.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:allocate.php');
        }  
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
    <link rel="stylesheet" type="text/css" href="../css.css">
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
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="nav">
  <tr style="background-color: rgb(255,255,255, 0.5);">
      <th width="5%" scope="col"><h4>&nbsp;</h4></th>
      <th width="12%" scope="col"><a href="student.php">Add Student</a></th>
      <th width="11%" scope="col"><a href="faculty.php">Add Faculty</a></th>
      <th width="11%" scope="col"><a href="stsearch.php">Search Student</a></th>
      <th width="11%" scope="col"><a href="fa_search.php">Search Faculty </a></th>
      <th width="11%" scope="col"><a href="allocate.php">Allocate</a></th>
      <th width="11%" scope="col"><a href="skill.php">Skill Matrix</a></th>
      <th width="11%" scope="col"><a href="report.php">Reports</a></th>
      <th width="11%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
</table>
    <form method="post" action="allocate.php">
      <br/><br/>
       <div style="background-color:  rgb(255,255,255, 0.5);border-radius: 25px; margin-left: 33%; alignment-adjust: central; width: 35%; box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;">
           <table align="center"  width="100%">
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td align="right"><br/><font size="5">Student ID&nbsp;:&nbsp;</font></td>
    <td>
        <br/><br/>
        <?php
            include '../connection.php';
             $sql="select s_id from student";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                 <option >Student</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select> <br/><br/>
    </td>
    <td rowspan="2">&nbsp;</td>
               </tr>
       </div>
       <?php
       if (isset($_POST['chk']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from project where s_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
  <tr>
      <td colspan="2" align="center"><input type="submit" style="width: 10em;  height: 2em; cursor: pointer; border-radius: 10px; font-size: 20px;" name="chk" value="Check For Request" /> <br/><br/>  </td>
    </tr>
       </table>
       </div>
           <br/>
           <div style="background-color:  rgb(255,255,255, 0.5);border-radius: 25px; margin-left: 33%; alignment-adjust: central; width: 35%;box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;">
           <table align="center"  width="100%" cellspacing="05" cellpadding="05">
       <tr>
           <br/><br/>
           <td>&nbsp; <br/></td>
           <td align="right"><br/><font size="5">Student ID&nbsp;:&nbsp;</font></td>
           <td><br/><input  id="in"type="text" name="sid"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Faculty ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="faid"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Project ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="projectid" value=""/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2"><input id="bt" style="width: 6em; cursor:pointer;border-radius: 25px; height: 2em; font-size: 20px;margin: 20px;" type="submit" name="allocate" value="Allocate" />    				
    <td>&nbsp;</td>
  </tr>
</table>
      </div>
  </form>
 <?php
}
elseif($role=="Faculty")    
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
 <?php
}
else   
{
?>
   <?php
   header('Location:../Admin.php');
   ?>
<?php
}
?>
</table>
<?php
}
?>
      


