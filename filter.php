<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "casephone");  
      $output = '';  
      $query = "  
           SELECT * FROM orders  
           WHERE orderdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">OrderID</th>  
                     <th width="10%">Unit</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Payment</th>  
                     <th width="20%">Transportation</th> 
                     <th width="15%">Date</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["orderID"] .'</td>  
                          <td>'. $row["orderUnit"] .'</td>  
                          <td>'. $row["orderPrice"] .' ฿</td>  
                          <td>'. $row["orderpay"] .' </td>  
                          <td>'. $row["ordertran"] .'</td> 
                          <td>'. $row["orderdate"] .'</td>   
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
