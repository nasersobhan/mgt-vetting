<?php

namespace App\Exports;

use App\Models\people;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeopleExport implements FromCollection,WithHeadings,WithMapping
{

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function map($bulk): array
    {
        return [
            $bulk->fullname,
            ucwords($bulk->gender),
            $bulk->dateofbirth,
            $bulk->getCity->name .', '.  $bulk->getCluster->name .', '.  $bulk->getBlock->name .', Floor:'.  $bulk->floor .' Room:'. $bulk->room,
            $bulk->phone,
            $bulk->email,
            $bulk->passportNumber,
            $bulk->marriageCertificate,
            // \Date::dateTimeToExcel($bulk->created_at),
            // \Date::dateTimeToExcel($bulk->updated_at),
        ];
    }



    public function headings():array{
        return[
            'Full Name',
            'Gender',
            'Date of Birth',
            'Address',
            'Phone',
            'Email',
            'Passport',
            'Marriage Certificate'
        ];
    } 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $people = new people;
        $people = $people->with('getCluster','getBlock','getCity')->select('fullname','gender','dateofbirth','cluster','block','city','floor','room','phone','email','passportNumber','marriageCertificate');
      
        // if($this->filters['city']){
        //     $people = $people->where('city', '=', $this->filters['city']);
        // }
        // if(request('cluster')){
        //     $people = $people->where('cluster', '=', request('cluster'));
        // }
        // if(request('block')){
        //     $people = $people->where('block', '=', request('block'));
        // }

        // if(request('floor')){
        //     $people = $people->where('floor', '=', request('floor'));
        // }

        // if(request('room')){
        //     $people = $people->where('room', '=', request('room'));
        // }

        // if(request('familygroup')){
        //     $people = $people->where('familyGroup', '=', request('familygroup'));
        // }

        // if(request('caseType')){
        //     $people = $people->where('caseType', '=', request('caseType'));
        // }

        if(isset($this->filters['passportNumber'])){

            $passportNumber = $this->filters['passportNumber'];
            if($passportNumber){
    
    
                $passQuery = $passportNumber;
                if($passQuery == 'have'){
                    $people = $people->where('passportNumber', '!=', "need")->where('passportNumber', '!=', "Not Applicable");
                }else
                    $people = $people->where('passportNumber', '=', $passQuery);
            }
            unset($this->filters['passportNumber']);
        }
    
        if(isset($this->filters['inneed'])){

     
        $passQuery = $this->filters['inneed'];

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
    
        unset($this->filters['inneed']);
    }

  
        $poeple = $people->where($this->filters);
        return $people->orderBy('arrivalDate','asc')->get();
    }

    // public function query()
    // {
    //     //return people::query();
    //     /*you can use condition in query to get required result*/
    //   // dd(people::query()->where($this->filters));
    //      return people::query()->where($this->filters);
    // }

    }