<html lang="en">
<head>

</head>

  <body>
  
    <?php
        
      
        // API with single stock
        $ListOfStock = "BYSI";
        echo "//API request with single stock: ";
        echo $ListOfStock;
        echo "<br>";
        
        $response_with_single_stock_symbol = file_get_contents('https://api.iextrading.com/1.0/tops/last?symbols=BYSI');
        echo "Response: ";
        echo gettype($response_with_single_stock_symbol);
        echo "<br>";
        $final_single = json_decode($response_with_single_stock_symbol);
        print_r($final_single);
        
        

      

 /*
    
        $ListOfStocks = "ACAD,CRM,BYSI";
        
        echo "//API request with multiple stocks: ";
        echo $ListOfStocks;
        echo "<br>";

       $response_with_multiple_stock_symbol = file_get_contents('https://api.iextrading.com/1.0/tops/last?symbols='.$ListOfStocks); 
       echo "Response: ";
       echo gettype($response_with_multiple_stock_symbol);
       echo "<br>";
       
       $final_multiple = json_decode($response_with_multiple_stock_symbol); 
       print_r($final_multiple);
        
        
       echo "<br>"; echo "<br>"; echo "<br>";
        
       */ 
        

?>


  

</body>
</html>
    
    