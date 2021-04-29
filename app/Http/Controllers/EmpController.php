<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use App\Emp;
class EmpController extends Controller {
    public function index(){
        $emp = Emp::paginate(5); 
        return view('employee', ['emp' => $emp]);
        
        
        
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function export($type) {
		//$employees = Emp::all();
		$employees = DB::select('SELECT emp.empId,emp.name, emp.surname,emp.dob, emp.position,emp.salary,emp.start_date,sl.department, man.name AS ManagerName, man.empId AS ManagerEmpId
                            FROM (
                            (
                            emps emp
                            LEFT JOIN department sl ON emp.position = sl.position
                            )
                            LEFT JOIN emps man ON man.position = sl.position
                            )
                            ');
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Employee Number');
        $sheet->setCellValue('B1', 'First Name');
        $sheet->setCellValue('C1', 'Surname');
        $sheet->setCellValue('D1', 'Date of Birth');
        $sheet->setCellValue('E1', 'Age');
        $sheet->setCellValue('F1', 'Position');
        $sheet->setCellValue('G1', 'Start Date');
        $sheet->setCellValue('H1', 'Department');
        $sheet->setCellValue('I1', 'Annual Salary');
        $sheet->setCellValue('J1', 'Bonus');
        $sheet->setCellValue('K1', 'Manager Employee Number');
        $sheet->setCellValue('L1', 'Manager Name');
                  
		$rows = 2;
		foreach($employees as $empDetails){ 
		    $sheet->setCellValue('A' . $rows, $empDetails->empId);
            $sheet->setCellValue('B' . $rows, $empDetails->name);
            $sheet->setCellValue('C' . $rows, $empDetails->surname);
            $sheet->setCellValue('D' . $rows, $empDetails->dob);
            $sheet->setCellValue('E' . $rows,  (date('Y') - date('Y',strtotime($empDetails->dob))));
            $sheet->setCellValue('F' . $rows, $empDetails->position);
            $sheet->setCellValue('G' . $rows, $empDetails->start_date);
            $sheet->setCellValue('H' . $rows, $empDetails->department);
            $sheet->setCellValue('I' . $rows, $empDetails->salary);
            $sheet->setCellValue('J' . $rows, 0.05 *$empDetails->salary);
            $sheet->setCellValue('K' . $rows, $empDetails->ManagerEmpId);
            $sheet->setCellValue('L' . $rows, $empDetails->ManagerName);
            
           
            $rows++;		
		}	   
	    $fileName = "emp.".$type;
		if($type == 'xlsx') {
			$writer = new Xlsx($spreadsheet);
		} else if($type == 'xls') {
			$writer = new Xls($spreadsheet);			
		}		
		$writer->save("export/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        return redirect(url('/')."/export/".$fileName);    
    }
    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        
        $path = $request->file('select_file')->getRealPath();
        
        $data = Excel::load($path)->get();
        
        if($data->count() > 0)
        {
            $rows = $data->toArray();
            foreach($rows as $row)
                {
                    
                    var_dump($row);
                    $insert_data[] = array(
                        'empId'  => $row['employee_number'],
                        'name'   => $row['first_name'],
                        'surname'  => $row['surname'],
                        'dob'   => $row['date_of_birth'],
                        //'position'  => $row['position'],
                        //'start_date'  => $row['date'],
                        'salary'   => $row['annual_salary']
                       
                       
                    );
                }
            
            
           /* if(!empty($insert_data))
            {
                DB::table('emps')->insert($insert_data);
                //App\Models\Flight::updateOrCreate(
            }*/
            
            if(!empty($insert_data)) {
                /*foreach ($insert_data as $array) {
                    DB::table('emps')
                    ->where('empId', $row['employee_number'])
                    ->update($array);
                }*/
                
                Emp::updateOrCreate(
                    [
                        'empId' => $row['employee_number']
                    ],
                    [
                        'empId'  => $row['employee_number'],
                        'name'   => $row['first_name'],
                        'surname'  => $row['surname'],
                        'dob'   => $row['date_of_birth'],
                        //'position'  => $row['position'],
                        //'start_date'  => $row['date'],
                        'salary'   => $row['annual_salary']
                    ]
                    );      
                
                
            }
            
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
