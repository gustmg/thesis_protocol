<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThesisProtocol;
use Auth;

class ThesisProtocolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            if(Auth::user()->user_type==1){ //Student
                $thesis_protocol=ThesisProtocol::where('thesis_protocol_student_id', Auth::id())->get();

                return response()->json([
                    "thesis_protocol" => $thesis_protocol
                ], 200);
            }
            else if(Auth::user()->user_type==2){ //Evaluator
                $thesis_protocols=ThesisProtocol::where('thesis_protocol_evaluator_id', Auth::id())->get();
                return response()->json([
                    "thesis_protocols" => $thesis_protocols
                ], 200);
            }
            else if(Auth::user()->user_type==3) { //Admin
                $thesis_protocols=ThesisProtocol::all();
                return response()->json([
                    "thesis_protocols" => $thesis_protocols
                ], 200);
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $thesis_protocol=new ThesisProtocol;
            $thesis_protocol->thesis_protocol_student_id=Auth::id();
            $thesis_protocol->save();

            return response()->json([
                "message" => "Protocolo de tésis subido correctamente.",
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thesis_protocol= ThesisProtocol::findOrFail($id);
        if(Auth::user()->user_type==1){
            return response()->json([
                "thesis_protocol" => $thesis_protocol
            ],200);
        }

        return view('thesis_protocols.evaluate', ['thesis_protocol' =>$thesis_protocol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $thesis_protocol= ThesisProtocol::find($id);

            if(isset($request->thesis_protocol_title)){
                $thesis_protocol->thesis_protocol_title=$request->thesis_protocol_title;
            }
            if(isset($request->thesis_protocol_institution_name)){
                $thesis_protocol->thesis_protocol_institution_name=$request->thesis_protocol_institution_name;
            }
            if(isset($request->thesis_protocol_institution_department)){
                $thesis_protocol->thesis_protocol_institution_department=$request->thesis_protocol_institution_department;
            }
            if(isset($request->thesis_protocol_institution_address)){
                $thesis_protocol->thesis_protocol_institution_address=$request->thesis_protocol_institution_address;
            }
            if(isset($request->thesis_protocol_institution_phone)){
                $thesis_protocol->thesis_protocol_institution_phone=$request->thesis_protocol_institution_phone;
            }
            if(isset($request->thesis_protocol_scholarship_institution)){
                $thesis_protocol->thesis_protocol_scholarship_institution=$request->thesis_protocol_scholarship_institution;
            }
            if(isset($request->thesis_protocol_scholarship_type)){
                $thesis_protocol->thesis_protocol_scholarship_type=$request->thesis_protocol_scholarship_type;
            }
            if(isset($request->thesis_protocol_scholarship_vigency)){
                $thesis_protocol->thesis_protocol_scholarship_vigency=$request->thesis_protocol_scholarship_vigency;
            }
            if(isset($request->thesis_protocol_assessor_name)){
                $thesis_protocol->thesis_protocol_assessor_name=$request->thesis_protocol_assessor_name;
            }
            if(isset($request->thesis_protocol_assessor_academic_degree)){
                $thesis_protocol->thesis_protocol_assessor_academic_degree=$request->thesis_protocol_assessor_academic_degree;
            }
            if(isset($request->thesis_protocol_assessor_phone)){
                $thesis_protocol->thesis_protocol_assessor_phone=$request->thesis_protocol_assessor_phone;
            }
            if(isset($request->thesis_protocol_assessor_institution)){
                $thesis_protocol->thesis_protocol_assessor_institution=$request->thesis_protocol_assessor_institution;
            }
            if(isset($request->thesis_protocol_assessor_adscription_department)){
                $thesis_protocol->thesis_protocol_assessor_adscription_department=$request->thesis_protocol_assessor_adscription_department;
            }
            if(isset($request->thesis_protocol_assessor_address)){
                $thesis_protocol->thesis_protocol_assessor_address=$request->thesis_protocol_assessor_address;
            }
            if(isset($request->thesis_protocol_assessor_job_phone)){
                $thesis_protocol->thesis_protocol_assessor_job_phone=$request->thesis_protocol_assessor_job_phone;
            }
            if(isset($request->thesis_protocol_second_assessor_name)){
                $thesis_protocol->thesis_protocol_second_assessor_name=$request->thesis_protocol_second_assessor_name;
            }
            if(isset($request->thesis_protocol_second_assessor_academic_degree)){
                $thesis_protocol->thesis_protocol_second_assessor_academic_degree=$request->thesis_protocol_second_assessor_academic_degree;
            }
            if(isset($request->thesis_protocol_second_assessor_phone)){
                $thesis_protocol->thesis_protocol_second_assessor_phone=$request->thesis_protocol_second_assessor_phone;
            }
            if(isset($request->thesis_protocol_second_assessor_institution)){
                $thesis_protocol->thesis_protocol_second_assessor_institution=$request->thesis_protocol_second_assessor_institution;
            }
            if(isset($request->thesis_protocol_second_assessor_adscription_department)){
                $thesis_protocol->thesis_protocol_second_assessor_adscription_department=$request->thesis_protocol_second_assessor_adscription_department;
            }
            if(isset($request->thesis_protocol_second_assessor_address)){
                $thesis_protocol->thesis_protocol_second_assessor_address=$request->thesis_protocol_second_assessor_address;
            }
            if(isset($request->thesis_protocol_second_assessor_job_phone)){
                $thesis_protocol->thesis_protocol_second_assessor_job_phone=$request->thesis_protocol_second_assessor_job_phone;
            }
            if(isset($request->thesis_protocol_second_assessor_justification)){
                $thesis_protocol->thesis_protocol_second_assessor_justification=$request->thesis_protocol_second_assessor_justification;
            }
            if(isset($request->thesis_protocol_summary)){
                $thesis_protocol->thesis_protocol_summary=$request->thesis_protocol_summary;
            }
            if(isset($request->thesis_protocol_antecedent)){
                $thesis_protocol->thesis_protocol_antecedent=$request->thesis_protocol_antecedent;
            }
            if(isset($request->thesis_protocol_general_objective)){
                $thesis_protocol->thesis_protocol_general_objective=$request->thesis_protocol_general_objective;
            }
            if(isset($request->thesis_protocol_methodology)){
                $thesis_protocol->thesis_protocol_methodology=$request->thesis_protocol_methodology;
            }
            if(isset($request->thesis_protocol_schedule)){
                $thesis_protocol->thesis_protocol_schedule=$request->thesis_protocol_schedule;
            }
            if(isset($request->thesis_protocol_infrastructure)){
                $thesis_protocol->thesis_protocol_infrastructure=$request->thesis_protocol_infrastructure;
            }
            if(isset($request->thesis_protocol_art_state)){
                $thesis_protocol->thesis_protocol_art_state=$request->thesis_protocol_art_state;
            }
            if(isset($request->thesis_protocol_expected_results)){
                $thesis_protocol->thesis_protocol_expected_results=$request->thesis_protocol_expected_results;
            }
            if(isset($request->thesis_protocol_socioeconomic_impact)){
                $thesis_protocol->thesis_protocol_socioeconomic_impact=$request->thesis_protocol_socioeconomic_impact;
            }
            if(isset($request->thesis_protocol_contributions)){
                $thesis_protocol->thesis_protocol_contributions=$request->thesis_protocol_contributions;
            }
            if(isset($request->thesis_protocol_bibliography)){
                $thesis_protocol->thesis_protocol_bibliography=$request->thesis_protocol_bibliography;
            }
            if(isset($request->thesis_protocol_evaluator_id)){
                $thesis_protocol->thesis_protocol_evaluator_id=$request->thesis_protocol_evaluator_id;
            }
            if(isset($request->thesis_protocol_status_id)){
                $thesis_protocol->thesis_protocol_status_id=$request->thesis_protocol_status_id;
            }
            
            $thesis_protocol->save();

            return response()->json([
                "thesis_protocol" => $thesis_protocol,
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
