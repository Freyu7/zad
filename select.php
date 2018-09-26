<?php
		
        $userAnswer = $_POST['name']; 
		
     
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
        $connect = new mysqli($host, $db_user, $db_password, $db_name);  //@ wyciszenie błędów

        if($connect->connect_errno != 0){
            throw new Exception(mysqli_connect_errno()); //errno - nr błedu error - opis tegobłedu i szczegóły
        }
        else{						
            
            if($userAnswer ==""){

            $result = @$connect->query("SELECT t.Name, o.Id_offer, o.offer_name, o.Price, o.description, a.city FROM type t, offer o, address a, property p WHERE o.id_offer = p.id_offer and a.id_address = p.id_address and p.id_type=t.id_type ORDER BY ID_property"); 
            }
            else{
                $result = @$connect->query("SELECT t.Name, o.Id_offer, o.offer_name, o.Price, o.description, a.city FROM type t, offer o, address a, property p WHERE o.id_offer = p.id_offer and a.id_address = p.id_address and p.id_type=t.id_type and t.Name ='{$_POST['name']}' ORDER BY ID_property"); 

            }
                
    
            if(!$result) throw new Exception($connect->error);
                else{
                $offer = $result->num_rows;
                $i = 0;
                while($row = $result->fetch_assoc()){
                    
                    //echo $row['offer_name'].'</br>';
                    //unset($_SESSION['error']);
                    echo '
                    
                    <tr>
                        <td>'.$row['Id_offer'].'</td>
                        <td>'.$row['offer_name'].'</td>
                        <td>'.$row['Name'].'</td>
                        <td>'.$row['city'].'</td>							
                        <td>'.$row['Price'].'</td>							
                        <td>   <a href="#demo'.$i.'" class="btn btn-default" data-toggle="collapse">Pokaż opis</a></td>
                    </tr>

                    
                        <tr  style="border-top: 0px ">
                            <td colspan="6" style="border-top: 0px ">
                            <div id="demo'.$i.'" class="collapse">
                            '.trim($row['description']).'
                            </div>
                            </td>
                        </tr>
                   
                    
                ';
                $i++;

                
          
             
                    


                }
                $result->close(); //aby pozbyć się niepotrzebnych wyników zapytania
                echo'	</tbody>
                </table>';

            }

            //echo $login."i haslo ".$pass;
            $connect->close();
        }

        
        }catch(Exception $e){//klasa będzie zawierała info o błędzie
            echo "Błąd serwera! Prosimy spróbować później.";
            echo '</br> Info dev: '.$e;
        }


        ?>	