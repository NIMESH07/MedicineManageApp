<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet as FacadesPaytmWallet;
use Illuminate\Http\Request;
use App\Medicine;
use App\Coustomers;
use PaytmWallet;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $cus = Coustomers::take(10)->get();
        $mad = Medicine::take(10)->get();
        return view('cbill', compact('cus', 'mad'));
    }
    public function pay()
    {

        $paytmParams = array();

        $paytmParams["body"] = array(
            "mobileNumber" => "8238198895"
        );

        $paytmParams["head"] = array(
            "txnToken"     => "f0bed899539742309eebd8XXXX7edcf61588842333227"
        );

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        // $url = "https://securegw-stage.paytm.in/login/sendOtp?mid=zzeWJO01332401306986&orderId=ORDERID_98765";

        /* for Production */
        $url = "https://securegw.paytm.in/login/sendOtp?mid=zzeWJO01332401306986&orderId=ORDERID_98765";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        print_r($response);
    }
}
