<?php
                                      include ("db.php");
                                        
                                        if(isset($_POST['IMSsubmit']))
                                        {
                                          $username = $_POST['IMSusername'];
                                          $password = $_POST['IMSpassword'];
                                          
                                          $query = "SELECT * FROM pso_r_user WHERE U_USERNAME = '".$username."' and U_PASSWORD = '".$password."'";

                                          $result = mysqli_query($connection,$query) or die(mysqli_error());
                                          if (mysqli_num_rows($result) > 0)
                                          {
                                           while($row = mysqli_fetch_assoc($result))
                                             {
                                               $user_id = $row['EP_ID'];
                                               $UserName = $row['U_USERNAME'];
                                               $type = $row['U_TYPE'];
                                               $account = $row['U_ID'];
                                               $employee = $row['EP_ID'];
                                               $office = $row['O_ID'];
                                             }
                                             echo 'OK!';

                            
                                          session_start();
                                          

                                          $_SESSION['Logged_In'] = $UserName;
                                          $_SESSION['TYPE'] = $type;
                                          $_SESSION['AccountID'] = $account;
                                          $_SESSION['DEPART'] = $office;
                                          $_SESSION['EmployeeID'] = $employee;


                                          if($_SESSION['TYPE'] == "Property-Custodian")
                                          {
                                            $header ='Location:IMS/IMS-PC/PCmainpage.php? username='.$UserName.'';
                                            header($header);
                                          }
                                          else if($_SESSION['TYPE'] == "Director")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DIR/DMmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Departmental-User")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DEPT/DPmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                          else if($_SESSION['TYPE'] == "Inspection-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-INS/INSmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                           else if($_SESSION['TYPE'] == "Medical-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-MED/MEDmainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                           else if($_SESSION['TYPE'] == "Dental-Officer")
                                          {
                                            
                                            $header ='Location:IMS/IMS-DEN/Dental-Officermainpage.php? username='.$UserName.'';
                                            header($header);
                                          } 
                                         
                                         $query = "INSERT INTO pso_r_users_log (UL_LOGGED_TYPE,EP_ID) VALUES('$type','$employee')";
                                         mysqli_query($connection,$query);
                                          
                                        }
                                else
                                        {
                                            $header ='Location:Portal_.php';
                                            header($header);
                                            $error =  "<label style='color:red ; margin-left:12%; font-weight: 10px; font-size: 15px'>Incorrect Username or Password!</label>";         
                                            }
                                      }
                                ?>