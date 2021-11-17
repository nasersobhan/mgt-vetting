<?php

namespace App\Http\Controllers;

use App\Models\people;
use App\Models\updates;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Exports\PeopleExport;
// use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $people = new people;
        if(request('city')){
            $people = $people->where('city', '=', request('city'));
        }
        if(request('cluster')){
            $people = $people->where('cluster', '=', request('cluster'));
        }
        if(request('block')){
            $people = $people->where('block', '=', request('block'));
        }

        if(request('floor')){
            $people = $people->where('floor', '=', request('floor'));
        }

        if(request('room')){
            $people = $people->where('room', '=', request('room'));
        }

        if(request('familyGroup')){
            $people = $people->where('familyGroup', '=', request('familyGroup'));
        }

        if(request('caseType')){
            $people = $people->where('caseType', '=', request('caseType'));
        }
        if(request('passportNumber')){


            $passQuery = request('passportNumber');
            if($passQuery == 'have'){
                $people = $people->where('passportNumber', '!=', "need")->where('passportNumber', '!=', "Not Applicable");
            }else
                $people = $people->where('passportNumber', '=', $passQuery);
        }
        


        if(request('inneed')){


            $passQuery = request('inneed');
            switch ($passQuery) {
                case 'passport':
                    $people = $people->where('passportNumber', '=', 'need');
                    break;
                case 'marriage':
                    $people = $people->where('marriageCertificate', '=', 'need');
                    break;
                case 'covid19':
                    $people = $people->whereNull('covid19VaccineDate');
                    break;
                case 'uaebio':
                    $people = $people->whereNull('uaeBiometricDate');
                    break;
                case 'interview':
                    $people = $people->whereNull('interviewDate');
                    break;
                case 'flight':
                    $people = $people->whereNull('leaveDate')->whereNotNull('interviewDate')->whereNotNull('uaeBiometricDate')->whereNotNull('covid19VaccineDate');
                    break;
            }

        }

        $people = $people->orderBy('arrivalDate','asc')->paginate(
            $perPage = 25, $columns = ['*'], $pageName = 'people'
        );
        $clusters = categories::where(['type' => 'cluster'])->pluck('name','id');
        $blocks = categories::where(['type' => 'block'])->pluck('name','id');
        $cities = categories::where(['type' => 'city'])->pluck('name','id');
        $caseType = categories::where(['type' => 'caseType'])->pluck('name','id');
        return view('people.list', ['people' => $people, 'clusters' => $clusters, 'blocks' => $blocks, 'cities' => $cities, 'caseType' => $caseType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clusters = categories::where(['type' => 'cluster'])->pluck('name','id');
        $blocks = categories::where(['type' => 'block'])->pluck('name','id');
        $cities = categories::where(['type' => 'city'])->pluck('name','id');
        return view('people.create', ['clusters' => $clusters, 'blocks' => $blocks, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      

        $data = $request->except('_method', '_token','tazkira' , 'passportNumberOption');


        $data['uid'] = Auth::id();
        $data = people::create($data);
        updates::create([
            'title' => 'Account Created',
            'desciption' => 'Account Created',
            'uid' => $data->uid,
            'pid' => $data->id
        ]);
        return redirect()->route('people.index')->with(['status' => 'Saved Successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function show(people $people)
    {
        //

       
        $person = $people->with(['getCluster','getBlock', 'getCity'])->find(request('person'));
 
        $related = people::where('familyGroup', $person->familyGroup)->where('id','<>',$person->id)->get();

        return view('people.view', ['person' => $person, 'related' => $related]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(people $people)
    {
        $person = people::find(request('person'));
        $clusters = categories::where(['type' => 'cluster'])->pluck('name','id');
        $blocks = categories::where(['type' => 'block'])->pluck('name','id');
        $cities = categories::where(['type' => 'city'])->pluck('name','id');
        // dd($people);
        return view('people.edit', ['person'=> $person,'clusters' => $clusters, 'blocks' => $blocks, 'cities' => $cities]);
    }

    public function editCase(){
        $person = people::find(request('id'));
        $caseTypes = categories::where(['type' => 'caseType'])->pluck('name','id');
        return view('people.editCase', ['person' => $person,'caseTypes' => $caseTypes]); 
    }

    public function editStep(){
        $person = people::find(request('id'));
        return view('people.editStep', ['person' => $person]); 
    }

    public function editCaseSave(){
        $person = people::find(request('id'));
        if(request('t')=='c'){
            $person->destinationCountry = request('destinationCountry');
            $person->caseType = request('caseType');
            $person->caseApproved = request('caseApproved');
            $person->caseDetials = request('caseDetials');
        }
       
        if(request('t')=='s'){
            $person->arrivalDate = request('arrivalDate');
            $person->leaveDate = request('leaveDate');
            $person->covid19VaccineDate = request('covid19VaccineDate');
            $person->interviewDate = request('interviewDate');
            $person->uaeBiometricDate = request('uaeBiometricDate');
        }
       // dd($person);
        $person->save();

        return redirect()->route('people.show',['person' => $person->id])->with(['status'=>'Successfully Updated']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, people $people)
    {
        $person = people::find(request('person'));
        $data = $request->except('_method', '_token','tazkira' , 'passportNumberOption');


        $data['uid'] = Auth::id();
        $data = $person->update($data);
        updates::create([
            'title' => 'Account Update',
            'desciption' => 'Account Created',
            'uid' => $person->uid,
            'pid' => $person->id
        ]);
        return redirect()->route('people.show', ['person' => $person->id])->with(['status' => 'Saved Successfuly!']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\people  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(people $people)
    {
        //
    }


    public function export()
    {
        // dd(request()->all());
        return Excel::download(new PeopleExport(request()->except('_method', '_token')), 'students.xlsx');
    }
}
