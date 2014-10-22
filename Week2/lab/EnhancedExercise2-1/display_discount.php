<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    
    <?PHP
      //declarations
    $product_description = '';
    $discount_percent = '';
    $list_price = '';
    $discount = '';
    $dicount_price = '';
    $error_message = '';
      
    //get the data from the form
    $product_description = $_POST['product_description'];
    $list_price = $_POST['list_price'];
    $discount_percent = $_POST['discount_percent'];
    
    //error messages if proper input is not done
     if ( empty($product_description) )
         {
        $error_message = 'description is a required field.'; 
         }
    else if ( !is_string ($product_description) )
        {
        $error_message = 'Descriptions must be only letters';
        }
          echo '<p>', $error_message , '</p>';
            
        
      if (!is_numeric($list_price))
     {
         $error_message = 'List price shoulud be numbers only';
     }
     else if(!is_numeric($discount_percent))
     {
         $error_message = 'discount Percent shoulud be numbers only';
     }
        echo '<p>', $error_message , '</p>';
     
     
     
       //if error message exist, EXIT and go to the index page     
     if ($error_message != '')
     {
         include ('index.php');
     exit();
     }
    
    
   
    //calculations
    $dicount = $list_price * ($discount_percent * .01);
    $dicount_price = $list_price - $discount;
    
    //applying currency
    $list_price_formatted = "$".  number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$". number_format($dicount, 2);
    $discount_price_formatted = "$". number_format($dicount_price, 2);      
    
    ?>
       
    <div id="content">
        
        
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />    

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />
        
      
        

        <p>&nbsp;</p>
    </div>
</body>
</html>