@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-4">
         

            <div class="card">
                <div class="card-header">{{ __('Steps') }}     <a href="{{ route('people.editStep',['id' => $person->id])}}" class="float-end" ><i class="fas fa-edit"></i></a></div>

                <div class="card-body">


                    <table class="table table-table">
                        <tr>
                            <th>Registed</th>
                            <td><span class="text-success"><i class="fas fa-check-circle"></i></span></td>
                        </tr>


                        <tr>
                            <th>Documents</th>
                            <td>
                                
                                {!! $person->passportNumber ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            
                            </td>
                        </tr>

                        <tr>
                            <th>Vaccine</th>
                            <td>
                                
                                {!! $person->covid19VaccineDate ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            
                            </td>
                        </tr>

                        <tr>
                            <th>UAE Biometric</th>
                            <td>
                                {!! $person->uaeBiometricDate ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Interview</th>
                            <td>
                                {!! $person->interviewDate ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            
                            </td>
                        </tr>

                        <tr>
                            <th>Flight</th>
                            <td>
                                {!! $person->leaveDate ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
<br>

            <div class="card">
                <div class="card-header">{{ __('Case') }} 
                
                    <div class="float-end">
                        <a href="{{ route('people.editCase',['id' => $person->id])}}"class=""><i class="fas fa-edit"></i></a>
                    </div>
                </div>

                <div class="card-body">


                    <table class="table table-table">
                        <tr>
                            <th>Destination</th>
                            <td>{{ $person->destinationCountry }}</td>
                        </tr>


                        <tr>
                            <th>Case Type</th>
                            <td>{{ $person->caseType }}</td>
                        </tr>

                        <tr>
                            <th>Approved</th>
                            <td>
                            
                                {!! $person->caseApproved ? '<span class="text-success"><i class="fas fa-check-circle"></i></span>'  : '<span class="text-danger"><i class="far fa-circle"></i></span>' !!}
                            
                            
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Case Detials</th>
                        
                        </tr>
                        <tr>
                           
                            <td colspan="2">{!! nl2br($person->caseDetials) !!}</td>
                        </tr>
                    </table>

                </div>

            </div>


        </div>


      
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Guests') }} 
                
           
                    <a href="{{ route('people.edit',['person' => $person->id])}}" class="float-end" ><i class="fas fa-edit"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                  @include('people.personDetials')


                
                </div>
            </div>



            <br>


            <div class="card">
                <div class="card-header">{{ __('Location') }} </div>

                <div class="card-body">


                    <table class="table table-table">
                        <tr>
                            <th>City</th>
                            <th>Cluster</th>
                            <th>Block</th>
                            <th>Floor</th>
                            <th>Room #</th>
                            
                        </tr>

                        <tr>
                            <td>{{ $person->getCity->name }}</td>
                            <td>{{ $person->getCluster->name }}</td>
                            <td>{{ $person->getBlock->name }}</td>
                            <td>{{ $person->floor }}</td>
                            <td>{{ $person->room }}</td>
                        </tr>

                 
                    </table>

                </div>

            </div>

            <br>

            <div class="card">
                <div class="card-header">{{ __('Related Family') }} </div>

                <div class="card-body">


                    <table class="table table-table">


                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Passport</th>
                      
                            
                        </tr>

                        @foreach ($related as $family)
                            
                     

                        <tr>
                            <td> <a href="{{ route('people.show', ['person' => $family->id ]) }}">{{ $family->fullname }}</a></td>
                            <td>{{ $family->dateofbirth }}</td>
                            <td>{{ $family->passportNumber }}</td>
                    
                        </tr>
                        @endforeach
                 
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
