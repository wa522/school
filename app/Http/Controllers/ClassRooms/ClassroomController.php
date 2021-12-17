<?php


namespace App\Http\Controllers\ClassRooms;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    private $validation;

    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $My_Classes = Classroom::all();
      $Grades = Grade::all();
      return view('pages.My_Class.My_Classes', compact('My_Classes', 'Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
//      $this->validate($request, [
//
//          'Name' => 'required',
//          'Name_class_en' => 'required'
//
//          ],
//
//          [
//
//            'Name.required' => trans('validation.required'),
//            'Name_class_en.required' => trans('validation.required'),
//
//      ]);

      $List_Classes = $request->List_Classes;
      try {

          foreach ($List_Classes as $List_Class) {

              $My_Classes = new Classroom();

              $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];

              $My_Classes->Grade_id = $List_Class['Grade_id'];

              $My_Classes->save();

          }

          toastr()->success(trans('messages.success'));
          return redirect()->route('Classrooms.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
