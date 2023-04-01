<?php	
    $row = 1;
    $cart = array();
    
	if (($handle = fopen("../csv/".$_GET['dep'].".csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
        
            if ($row != 0) { 
                array_push($cart, $data[4]);
            }
            
            $row++;
	    }
		fclose($handle);
    }
    print_r(json_encode($cart));
?>

