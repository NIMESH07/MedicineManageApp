<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use FPDF;
use Illuminate\Support\Facades\Http;

//add for excel
require app_path('MyService/ExcelConfig/Excel/vendor/autoload.php');
require app_path('MyService/ExcelConfig/Excel/vendor/phpoffice/phpspreadsheet/src/Bootstrap.php');

//add for pdf
require app_path('MyService/PDFConfig/FPDI/vendor/setasign/fpdf/fpdf.php');
require_once app_path('MyService/PDFConfig/FPDI/vendor/setasign/fpdi/src/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class MedicineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addmedicineform()
    {
        return view('medicineadd');
    }

    function insermedicinedata(Request $request)
    {
        $mad = new Medicine();
        $mad->name = $request->name;
        $mad->ts = $request->ts;
        $mad->ns = $request->ns;
        $mad->cs = $request->cs;
        $mad->price = $request->price;
        $mad->mrp = $request->mrp;
        $mad->exdate = $request->exdate;
        $mad->orderstatus = "N";
        $mad->save();
        $msg = $request->name;
        session()->flash('msg', "New " . $mad->name . " Medicine Added..");
        return redirect('viewmedicine');
        //return redirect('viewmedicine',compact('msg'));
    }

    function viewmedicine()
    {
        $data = Medicine::paginate(5);
        return view('medicineview', compact('data'));
    }

    function viewmedicinewithid(Request $request)
    {
        $mad = Medicine::find(base64_decode($request->a));
        if ($mad == null) {
            echo "Data Not Found";
            echo "<br>
                You can
            <a href='viewmedicine'>View All Medicine</a>";
        } else {

            return view('updatemadicine', compact('mad'));
        }
    }

    public function medicineupdate(Request $request)
    {
        $affected = Medicine::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'ts' => $request->ts,
                'ns' => $request->ns,
                'cs' => $request->cs,
                'price' => $request->price,
                'mrp' => $request->mrp,
                'exdate' => $request->exdate,
            ]);
        return redirect('viewmedicine');
    }
    public function deletemedicinewithid(Request $request)
    {
        $mad = Medicine::where('id', $request->a)->delete();

        if ($mad == null) {

            //  echo $request->a;
            echo "Data Not Found";
            echo "<a href='viewmedicine'>View All Medicine</a>";
        } else {

            return redirect('viewmedicine');
        }
    }

    public function getExcel(Request $request)
    {

        $medicines = Medicine::all()->toArray();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        // $row =1;
        // foreach($medicines as $medicine){
        //     $char = "A"; // 65
        //     $worksheet->getCell($char.$row)->setValue($medicine['id']);
        //     $char++;
        //     $worksheet->getCell($char.$row)->setValue($medicine['name']);
        //     $char++;
        //     $worksheet->getCell($char.$row)->setValue($medicine['ts']);
        //     $row++;
        // }

        $worksheet->getCell("A1")->setValue("ID");
        $worksheet->getCell("B1")->setValue("Name");
        $worksheet->getCell("C1")->setValue("Ts");
        $worksheet->getCell("D1")->setValue("NS");
        $worksheet->getCell("E1")->setValue("CS");
        $worksheet->getCell("F1")->setValue("Price");
        $worksheet->getCell("G1")->setValue("Mrp");
        $worksheet->getCell("H1")->setValue("DATA");


        $worksheet->fromArray($medicines, NULL, 'A2');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="xyz_demo.xls"');
        $writer->save('php://output');
    }

    public function printmedicinewithid(Request $request)
    {
        $mad = Medicine::find(base64_decode($request->mid));
        $height = 150; // Height of Current Page
        $width = 148; // Width of Current Page
        $pdf = new FPDF('P', 'mm', [$width, $height]); // paper size

        /******  CREATE NEW PAGE & SET FONT SIZE *******/
        $pdf->AddPage(); // create new page
        $pdf->SetFont('Arial', 'B', 20); /*set font to arial, bold, 14pt*/
        $pdf->SetDrawColor(001);

        $pdf->Text(5, 10, 'ID');
        $pdf->Text(20, 10, 'NAME');
        $pdf->Text(55, 10, "Total Stock");

        $pdf->SetFont('Arial', '', 15); /*set font to arial, bold, 14pt*/

        $pdf->Text(5, 20, $mad['id']);
        $pdf->Text(20, 20, $mad['name']);
        $pdf->Text(55, 20, $mad['ts']);
        $pdf->Output('D');
        //return redirect('viewmedicine');
    }

    public function testchart(Request $request)
    {
        $mad = Medicine::take(20)->get();
        //$mad = Medicine::orderBy('ts', 'DESC')->take(20)->get();
        $dataPoints = array();
        foreach ($mad as $item) {
            if ($item->ts > 99) {
                array_push($dataPoints, array("label" => $item->name, "y" => $item->ts, "indexLabel" => "Highest"));
            } else {
                array_push($dataPoints, array("label" => $item->name, "y" => $item->ts));
            }
        }
        //Temp Data
        // $dataPoints = array(
        //     array("label" => "Nimesh", "y" => 1),
        //     array("label" => "Entertainment", "y" => 2),
        //     array("label" => "Lifestyle", "y" => 3),
        //     array("label" => "Business", "y" => 4),
        //     array("label" => "Music & Audio", "y" => 5),
        //     array("label" => "Personalization", "y" => 6),
        //     array("label" => "Tools", "y" => 7),
        //     array("label" => "Books & Reference", "y" => 8),
        //     array("label" => "Travel & Local", "y" => 9),
        //     array("label" => "Puzzle", "y" => 10)
        // );
        // $response = Http::get('http://www.google.com');
        // dd($response->transferStats);
        return view('testchart', compact('dataPoints'));
    }
}
