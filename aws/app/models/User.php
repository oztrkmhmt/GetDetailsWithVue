<?php
class User {

    private $url = REQUEST_URL;
    private $detailsURL = LOGINDETAILS_URL;
    private $customerDetailsURL = CUSTOMERDETAILS_URL;
    private $kimlikTipi = kimliktipi;
    private $kimlikNo = kimlikno;
    private $producturl = PRODUCTS_URL;
    private $productId = productid;
    private $policyType = policytype;
    private $policyTypeN = policyTypeN;

    public function __construct() {
        
    }

    // Get User Hash Code
    public function GetUserHashCode() {

        $hashcode = array("username" => $_POST['username'], "password" => $_POST['password']);
        $hashcode_string = json_encode($hashcode);
        $ch = curl_init($this->url);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hashcode_string);
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $userDetail = (json_decode($result, true));
        $_SESSION['userDetail'] = $userDetail;
    }

    // Get User Details
    public function GetLoginDetails($data) {

        $userDetails = array("username" => $data['username'], "hashcode" => $_SESSION['userDetail']['hashCode']);
        $userDetails_string = json_encode($userDetails);
        $ch = curl_init($this->detailsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $userDetails_string);
        $resultUserDetails = curl_exec($ch); //execute
        curl_close($ch);
        $details = (json_decode($resultUserDetails, true));
        $_SESSION['logindetails'] = $details;
    }

    // Get User Details
    public function GetCustomerDetails($data) {

        $customerDetails = array("kimliktipi" => $this->kimlikTipi, "kimlikno" => $this->kimlikNo);
        $customerDetails_string = json_encode($customerDetails);
        $ch = curl_init($this->customerDetailsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $customerDetails_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $resultCustomerDetails = curl_exec($ch); //execute
        curl_close($ch);
        $ctDetailResult = (json_decode($resultCustomerDetails, true));
        $_SESSION['customerDetails'] = $ctDetailResult;
    }

    // Get Product Details Abonman
    public function GetProductDetailsAbonman($data) {

        $productAbonman = array("username" => $data['username'], "productid" => $this->productId, "policytype" => $this->policyType);
        $productAbonman_string = json_encode($productAbonman);
        $ch = curl_init($this->producturl);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $productAbonman_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $productDetail = (json_decode($result, true));
        $_SESSION['productDetail'] = $productDetail;
    }

    // Get Product Details Kati
    public function GetProductDetailsN($data) {

        $productKati = array("username" => $data['username'], "productid" => $this->productId, "policytype" => $this->policyTypeN);
        $productKati_string = json_encode($productKati);
        $ch = curl_init($this->producturl);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $productKati_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode'], "Content-Type : application/x-www-form-urlencoded"));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $productDetail = (json_decode($result, true));
        $_SESSION['productDetail'] = $productDetail;
    }
}
