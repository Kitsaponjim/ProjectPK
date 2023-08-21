<?php 



    if(isset($_POST['btnSave'])){
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];


        $sToken = "0NA1SopjSkT0NFs9JAocfyCUMebzdO3FH5S5nTSfsHT";
        $sMessage = "มีรายการแจ้งซ่อม \n";

        $sMessage .= "User Name : " . $email . "\n";
        $sMessage .= "Full Name : " . $fullname . "\n";


        
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 



        if($result) {
            $_SESSION['success'] = "บันทึกข้อมูลสำเร็จ";
            header("location: index.php");

        }else{
            $_SESSION['error'] = "บันทึกข้อมูลไม่สำเร็จ";
            header("location: index.php");
        }


    }




?>
