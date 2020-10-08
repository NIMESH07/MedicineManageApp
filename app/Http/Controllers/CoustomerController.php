<?php

namespace App\Http\Controllers;

require app_path('MyService/PDFConfig/FPDI/vendor/setasign/fpdf/fpdf.php');
require_once app_path('MyService/PDFConfig/FPDI/vendor/setasign/fpdi/src/autoload.php');
require_once 'C:\xampp\htdocs\laravel\MedicineManageApp\vendor\autoload.php';

use App\Coustomers;
use App\Mail\TestMail;
use FPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\HttpClientKernel;

class CoustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addcoustomerform()
    {
        return view('coustomeradd');
    }
    public function insertcoustomerdata(Request $REQUEST)
    {
        // $validatedData = $REQUEST->validate([
        //     'mobno' => 'required|max:10|min:10',
        //     'add' => 'required|max:100|min:10',
        // ]);

        $rules = [
            'name' => 'required',
            'mobno' => 'required|max:10|min:10',
            'add' => 'required|max:100|min:10',
            'img' => 'image',
        ];

        $messages = [
            'mobno.min' => 'The Mobile Number need atleast 10 digit.',
            'img.image' => 'The file under validation must be an image (jpeg, png, bmp, gif, svg, or webp)',
        ];

        $validator = Validator::make($REQUEST->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //store image in storage->image folser in projet folder
        $imagename = NULL;
        if ($REQUEST->hasFile('img')) {
            $imagename = $REQUEST->img->getClientOriginalName();
            $REQUEST->img->storeAs('public', $imagename);
        }


        $cus = new Coustomers();
        $cus->name = $REQUEST->name;
        $cus->mobile_no = $REQUEST->mobno;
        $cus->address = $REQUEST->add;
        $cus->imgname = $imagename;
        $cus->status = TRUE;
        $cus->save();
        session()->flash('msg', $REQUEST->name . " Name is Added");
        return redirect('addcustomer');
    }
    public function viewcoustomer()
    {
        $data = Coustomers::orderBy('id', 'DESC')->paginate(5);
        return view('coustomerview', compact('data'));
    }

    public function cviewdemo()
    {
        $data = Coustomers::paginate(10);
        return view('coustomerdemo', compact('data'));
    }

    public function viewcoustomerwithid(Request $REQUEST)
    {
        $cus = Coustomers::find(base64_decode($REQUEST->a));
        if ($cus == null) {
            echo "Data Not Found";
            echo "<br>
                You can
            <a href='coustomerview'>View All Coustomer</a>";
        } else {

            return view('updatecoustomer', compact('cus'));
        }
    }

    public function customerupdate(Request $REQUEST)
    {
        Coustomers::where('id', $REQUEST->id)
            ->update([
                'name' => $REQUEST->name,
                'mobile_no' => $REQUEST->mobno,
                'address' => $REQUEST->add,
                'status' => TRUE
            ]);
        return redirect('coustomerview');
    }

    public function deletewithid(Request $REQUEST)
    {
        $iname = Coustomers::where('id', $REQUEST->a)->get('imgname');
        Storage::delete('public/' . $iname[0]['imgname']);
        $cus =  Coustomers::where('id', $REQUEST->a)->delete();

        if ($cus == null) {

            //  echo $request->a;
            echo "Data Not Found";
            echo "<a href='viewmedicine'>View All Medicine</a>";
        } else {
            return redirect()->back();
        }
    }

    public function pacd()
    {
        $i = asset('storage/nimesh.jpg');
        $mad = Coustomers::all();
        if ($mad->count() != 0) {
            $count = 0;
            $height = 150; // Height of Current Page
            $width = 148; // Width of Current Page
            $y = 27;

            $pdf = new FPDF('P', 'mm', [$width, $height]); // paper size

            /******  CREATE NEW PAGE & SET FONT SIZE *******/
            $pdf->AddPage(); // create new page
            $pdf->SetFont('Arial', 'B', 25); /*set font to arial, bold, 14pt*/
            $pdf->SetDrawColor(001);

            /******  SET Logo *******/
            $pdf->Image('storage/nlogo.jpg', 5, 5, 15, 15, 'JPG', 'http://127.0.0.1:8000', '', true, 150, '', false, false, 1, false, false, false);
            $pdf->Text(21, 15, "Nimesh");
            $pdf->Line(1.5, 21, 148 - 1.4, 21);


            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Text(5, $y, 'Name');
            $pdf->Text(55, $y, 'Mobile_no');
            $pdf->Text(85, $y, "Address");
            $pdf->Line(1.5, $y + 1, 148 - 1.4, $y + 1);
            /*set font to arial, bold, 14pt*/

            foreach ($mad as $item) {
                if ($count == 17) {
                    $count = 0;
                    $y = 27;
                    $pdf->AddPage(); // create new page
                    $pdf->SetFont('Arial', 'B', 25); /*set font to arial, bold, 14pt*/
                    $pdf->SetDrawColor(001);

                    /******  SET Logo *******/
                    $pdf->Image('storage/nlogo.jpg', 5, 5, 15, 15, 'JPG', 'http://127.0.0.1:8000', '', true, 150, '', false, false, 1, false, false, false);
                    $pdf->Text(21, 15, "Nimesh");
                    $pdf->Line(1.5, 21, 148 - 1.4, 21);


                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Text(5, $y, 'Name');
                    $pdf->Text(55, $y, 'Mobile_no');
                    $pdf->Text(85, $y, "Address");
                    $pdf->Line(1.5, $y + 1, 148 - 1.4, $y + 1);
                }
                $count = $count + 1;
                $y = $y + 7;
                $pdf->SetFont('Arial', '', 12);
                $FDD_LINE = 30;
                $pdf->SetLineWidth(0.2);
                $pdf->SetDash(1, 1); // dash size, dash gap size
                $pdf->Line(1.5, $y + 1, 148 - 1.4, $y + 1); //line(start-x,start-y,end-x,end-y);
                $pdf->Text(5, $y, $item['name']);
                $pdf->Text(55, $y, $item['mobile_no']);
                $pdf->SetFont('Arial', '', 8);
                $pdf->Text(85, $y, $item['address']);


                $pdf->Text(132, 149, "Page No." . $pdf->PageNo());
            }
            Storage::delete('public/nlogo.png');
            $pdf->Output('D', "All Coustmer Details.pdf");
        } else {
            session()->flash('msg', "No Coustmer Found");
            return redirect('coustomerview');
        }
    }
    public function sendmail(Request $request)
    {
        $details = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        Mail::to($request->mail)->send(new TestMail($details));
        session()->flash('msg', $request->mail . " to send Mail sussessfully");
        return redirect('showmail');
    }

    public function Addnewc(Request $request)
    {
        //this funcution is use for insert customer data intable Using AJAX
        $cus = new Coustomers();
        $cus->name = $request->name;
        $cus->mobile_no = $request->mobile_no;
        $cus->address = $request->address;
        $cus->status = True;
        $cus->save();
        return response()->json($cus);
        //hello git
    }
}
