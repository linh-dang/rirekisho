<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Gate;
use PDF;
use App\CV;
use App\Record;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Nicolaslopezj\Searchable\SearchableTrait;

class CVController extends Controller
{

    public function index(Request $request)
    {
        $CVs = CV::all();
        $CVs = CV::paginate(10);

        return view('xCV.CVindex', compact('CVs'));
    }

    public function search(Request $request)
    {

        if (Gate::denies('Visitor')) {
            abort(403);
        }
        $CV = CV::search($request->input('keyword'))->groupBy('id')->get();

        if ($request->has("data-sort")) {
            if ($request->input('data-sort') == "desc") {
                $CV = $CV->sortBy($request->input('data-field'));
            } else $CV = $CV->sortByDesc($request->input('data-field'));
        }
        return View::make('includes.table-result')->with('CVs', $CV);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    public function store($id, Request $request)
    {
    }


    public function show($id)
    {
        //$id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('view-cv', $cv)) {
            abort(403);
        }
        $skills = $cv->Skill;
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVshow')->with('CV', $cv)->with('Records', $Records)
            ->with('skills', $skills);
    }

    public function show2($id)
    {
        //$id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('view-cv', $cv)) {
            abort(403);
        }
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVview')->with('CV', $cv)->with('Records', $Records);
    }
/*
    public function edit2($id)
    {
        // $id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVedit2')->with('CV', $cv)->with('Records', $Records);
    }
*/
    public function edit($id)//Get
    {
        //$id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        $skills = $cv->Skill;
        $Records = $cv->Record;
        $Records = $Records->sortBy("Date");
        return View::make('xCV.CVcreate')->with('CV', $cv)->with('Records', $Records) ->with('skills', $skills);
    }

    public function update($id, UpdateRequest $request)//PUT
    {
        //$id = $id - 14000;
        $cv = CV::findOrFail($id);
        if (Gate::denies('update-cv', $cv->user_id)) {
            abort(403);
        }
        if ($request->has('B_date')) {
            $cv->Birth_date = getDateDate($request->input('B_date'));
        }
        $cv->update($request->all());
    }

    public function getPDF($id, Request $request)
    {
        //TODO: dompdf in Japanese
        $CV = CV::findOrFail($id);
        if (Gate::denies('view-cv', $CV)) {
            abort(403);
        }
        $Records = $CV->Record;
        $Records = $Records->sortBy("Date");
        /*
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Encoding: UTF-8');
        header('Content-type: application/pdf; charset=UTF-8');
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        */
        $html = View::make('invoice.cv')
            ->with('CV', $CV)->with('Records', $Records)->render();
        //$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

       $dompdf = PDF::loadHTML($html);

        return $dompdf->stream("CV.pdf");
    }

}
