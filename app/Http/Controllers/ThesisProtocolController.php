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
            $thesis_protocol=new ThesisProtocol;
            $thesis_protocol->thesis_protocol_student_id=Auth::id();
            $thesis_protocol->thesis_protocol_title=$request->thesis_protocol_title;
            $thesis_protocol->thesis_protocol_institution=implode(",", $request->thesis_protocol_institution);
            $thesis_protocol->thesis_protocol_scholarship=implode(",", $request->thesis_protocol_scholarship);
            $thesis_protocol->thesis_protocol_assessor=implode(",", $request->thesis_protocol_assessor);
            $thesis_protocol->thesis_protocol_summary=$request->thesis_protocol_summary;
            $thesis_protocol->thesis_protocol_antecedent=$request->thesis_protocol_antecedent;
            $thesis_protocol->thesis_protocol_general_objective=$request->thesis_protocol_general_objective;
            $thesis_protocol->thesis_protocol_methodology=$request->thesis_protocol_methodology;
            $thesis_protocol->thesis_protocol_schedule=$request->thesis_protocol_schedule;
            $thesis_protocol->thesis_protocol_infrastructure=$request->thesis_protocol_infrastructure;
            $thesis_protocol->thesis_protocol_art_state=$request->thesis_protocol_art_state;
            $thesis_protocol->thesis_protocol_expected_results=$request->thesis_protocol_expected_results;
            $thesis_protocol->thesis_protocol_socioeconomic_impact=$request->thesis_protocol_socioeconomic_impact;
            $thesis_protocol->thesis_protocol_contributions=$request->thesis_protocol_contributions;
            $thesis_protocol->thesis_protocol_bibliography=$request->thesis_protocol_bibliography;
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
