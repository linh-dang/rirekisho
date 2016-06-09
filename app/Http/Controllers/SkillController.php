<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CV;
use App\Skill;
use Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;


class SkillController extends Controller
{
    
    public function store(Request $request)
    {
        $CV = CV::findOrFail($request->input('id'));
        if (Gate::denies('update-cv', $CV->user_id)) {
            abort(403);
        }
        $type = str_split_unicode($request->input('data-react'),"_");//"2_x"
        $skill = new Skill();
        $skill->skill_type = $type[2];
        $skill->update($request->all());
        $CV->Skill()->save($skill);
        return "2_".$skill->Type;
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $cv = $skill->CV;
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $skill->update($request->all());
        return "2_".$skill->skill_type;
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
    
    //unused methoods
    public function show($id)
    {

    }
    public function edit($id, UpdateRequest $request)
    {

    }
    public function index($type)
    {

    }

    public function create(Request $request)
    {

    }
    
}
