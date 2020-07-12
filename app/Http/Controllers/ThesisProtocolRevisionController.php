<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThesisProtocolRevision;
use App\ThesisProtocol;
use Auth;

class ThesisProtocolRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $thesis_protocol_revision=new ThesisProtocolRevision;
            $thesis_protocol_revision->title_status_id=$request->title_status_id;
            $thesis_protocol_revision->title_commentary=$request->title_commentary;
            $thesis_protocol_revision->institution_status_id=$request->institution_status_id;
            $thesis_protocol_revision->institution_commentary=$request->institution_commentary;
            $thesis_protocol_revision->scholarship_status_id=$request->scholarship_status_id;
            $thesis_protocol_revision->scholarship_commentary=$request->scholarship_commentary;
            $thesis_protocol_revision->assessor_status_id=$request->assessor_status_id;
            $thesis_protocol_revision->assessor_commentary=$request->assessor_commentary;
            $thesis_protocol_revision->second_assessor_status_id=$request->second_assessor_status_id;
            $thesis_protocol_revision->second_assessor_commentary=$request->second_assessor_commentary;
            $thesis_protocol_revision->summary_status_id=$request->summary_status_id;
            $thesis_protocol_revision->summary_commentary=$request->summary_commentary;
            $thesis_protocol_revision->antecedent_status_id=$request->antecedent_status_id;
            $thesis_protocol_revision->antecedent_commentary=$request->antecedent_commentary;
            $thesis_protocol_revision->general_objective_status_id=$request->general_objective_status_id;
            $thesis_protocol_revision->general_objective_commentary=$request->general_objective_commentary;
            $thesis_protocol_revision->methodology_status_id=$request->methodology_status_id;
            $thesis_protocol_revision->methodology_commentary=$request->methodology_commentary;
            $thesis_protocol_revision->schedule_status_id=$request->schedule_status_id;
            $thesis_protocol_revision->schedule_commentary=$request->schedule_commentary;
            $thesis_protocol_revision->infrastructure_status_id=$request->infrastructure_status_id;
            $thesis_protocol_revision->infrastructure_commentary=$request->infrastructure_commentary;
            $thesis_protocol_revision->art_state_status_id=$request->art_state_status_id;
            $thesis_protocol_revision->art_state_commentary=$request->art_state_commentary;
            $thesis_protocol_revision->expected_results_status_id=$request->expected_results_status_id;
            $thesis_protocol_revision->expected_results_commentary=$request->expected_results_commentary;
            $thesis_protocol_revision->socioeconomic_impact_status_id=$request->socioeconomic_impact_status_id;
            $thesis_protocol_revision->socioeconomic_impact_commentary=$request->socioeconomic_impact_commentary;
            $thesis_protocol_revision->contributions_status_id=$request->contributions_status_id;
            $thesis_protocol_revision->contributions_commentary=$request->contributions_commentary;
            $thesis_protocol_revision->bibliography_status_id=$request->bibliography_status_id;
            $thesis_protocol_revision->bibliography_commentary=$request->bibliography_commentary;
            $thesis_protocol_revision->thesis_protocol_student_id=$request->thesis_protocol_student_id;
            $thesis_protocol_revision->save();
            
            $thesis_protocol=ThesisProtocol::find($request->thesis_protocol_student_id);

            if(
                $thesis_protocol_revision->title_status_id == 1 &&
                $thesis_protocol_revision->institution_status_id == 1 &&
                $thesis_protocol_revision->scholarship_status_id == 1 &&
                $thesis_protocol_revision->assessor_status_id == 1 &&
                $thesis_protocol_revision->second_assessor_status_id == 1 &&
                $thesis_protocol_revision->summary_status_id == 1 &&
                $thesis_protocol_revision->antecedent_status_id == 1 &&
                $thesis_protocol_revision->general_objective_status_id == 1 &&
                $thesis_protocol_revision->methodology_status_id == 1 &&
                $thesis_protocol_revision->schedule_status_id == 1 &&
                $thesis_protocol_revision->infrastructure_status_id == 1 &&
                $thesis_protocol_revision->art_state_status_id == 1 &&
                $thesis_protocol_revision->expected_results_status_id == 1 &&
                $thesis_protocol_revision->socioeconomic_impact_status_id == 1 &&
                $thesis_protocol_revision->contributions_status_id == 1 &&
                $thesis_protocol_revision->bibliography_status_id == 1
            ){
                $thesis_protocol->thesis_protocol_status_id=4;
                $thesis_protocol->save();

                return response()->json([
                    "message" => "Revisión de protocolo de tésis subido correctamente.",
                    "thesis_protocol_status_id" => 4
                ],200);
            }
            else if(
                $thesis_protocol_revision->title_status_id == 3 &&
                $thesis_protocol_revision->institution_status_id == 3 &&
                $thesis_protocol_revision->scholarship_status_id == 3 &&
                $thesis_protocol_revision->assessor_status_id == 3 &&
                $thesis_protocol_revision->second_assessor_status_id == 3 &&
                $thesis_protocol_revision->summary_status_id == 3 &&
                $thesis_protocol_revision->antecedent_status_id == 3 &&
                $thesis_protocol_revision->general_objective_status_id == 3 &&
                $thesis_protocol_revision->methodology_status_id == 3 &&
                $thesis_protocol_revision->schedule_status_id == 3 &&
                $thesis_protocol_revision->infrastructure_status_id == 3 &&
                $thesis_protocol_revision->art_state_status_id == 3 &&
                $thesis_protocol_revision->expected_results_status_id == 3 &&
                $thesis_protocol_revision->socioeconomic_impact_status_id == 3 &&
                $thesis_protocol_revision->contributions_status_id == 3 &&
                $thesis_protocol_revision->bibliography_status_id == 3
            ){
                $thesis_protocol->thesis_protocol_status_id=5;
                $thesis_protocol->save();

                return response()->json([
                    "message" => "Revisión de protocolo de tésis subido correctamente.",
                    "thesis_protocol_status_id" => 5
                ],200);
            }

            else{
                $thesis_protocol->thesis_protocol_status_id=3;
                $thesis_protocol->save();

                return response()->json([
                    "message" => "Revisión de protocolo de tésis subido correctamente.",
                    "thesis_protocol_status_id" => 3
                ],200);
            }          
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
