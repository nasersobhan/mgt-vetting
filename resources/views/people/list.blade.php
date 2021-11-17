@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List of Guests') }} ({{ $people->total()  }})
                
               <div class="float-end">
                <a href="{{  route('people.export', request()->all()) }}"  class="btn btn-primary btn-sm"><i class="fas fa-file-excel"></i> Export ({{ $people->total()  }})</a>
                   <a href="{{  route('people.create') }}"  class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add</a>
               </div>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                <div class="well border p-2 m-2">
                    <h3>Search:</h3>
                <form method="GET" action="{{ route('people.index') }}">
                    @csrf


                        
                    <div class="form-group row m-1">
                      

                        <div class="col-md-12">
                            <div class="row">



                                <div class="col-md-6">


                                    <select name="city" id="city" class="form-control  m-1 @error('city') is-invalid @enderror">
                                        <option value="">Select City</option>
                                        @foreach ($cities as $id => $city)
                                        <option {{ request('city') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $city }}</option>   
                                    @endforeach
                                    </select>
    
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        <div class="col-md-6">
                            <select name="cluster" id="cluster" class="form-control  m-1 @error('cluster') is-invalid @enderror">
                                <option value="">Select Cluster</option>
                                @foreach ($clusters as  $id => $cluster)
                                    <option {{ request('cluster') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $cluster }}</option>   
                                @endforeach
                            </select>
                            @error('cluster')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-6">


                            <select name="block" id="block" class="form-control  m-1 @error('block') is-invalid @enderror">
                                <option value="">Select block</option>
                                @foreach ($blocks as  $id => $block)
                                <option {{ request('block') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $block }}</option>   
                            @endforeach
                            </select>

                            @error('block')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input placeholder="Floor #" value="{{ request('floor') }}" id="floor" type="number" min="1" max="9" class="form-control  m-1 @error('floor') is-invalid @enderror" name="floor" value="{{ old('floor') }}" autocomplete="false" autofocus>

                            @error('floor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <input placeholder="Room #" value="{{ request('room') }}" id="room" type="number" min="1" max="9999" class="form-control  m-1 @error('room') is-invalid @enderror" name="room" value="{{ old('room') }}" autocomplete="false" autofocus>

                            @error('room')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


{{-- 
                        <div class="col-md-6">


                            <select name="passportNumber" id="passportNumber" class="form-control  m-1 @error('passportNumber') is-invalid @enderror">
                                <option value="">Passport</option>
                               
                                <option value="Need">Need Passport</option>   
                                <option value="Not Applicable">Not Applicable</option> 
                                <option value="have">Have Passport</option>   
                            </select>

                            @error('passportNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}


                        <div class="col-md-6">


                            <select name="inneed" id="inneed" class="form-control  m-1 @error('inneed') is-invalid @enderror">
                                <option value="">Need</option>
                               
                                <option {{ request('inneed') == 'passport' ? 'selected' : '' }}  value="passport">Need Passport</option>   
                                <option {{ request('inneed') == 'marriage' ? 'selected' : '' }} value="marriage">Need Marriage Certificate</option> 
                                <option {{ request('inneed') == 'covid19' ? 'selected' : '' }} value="covid19">Need Covid-19 Vaccine</option>  
                                <option {{ request('inneed') == 'uaebio' ? 'selected' : '' }} value="uaebio">Need UAE Biometric</option>  
                                <option {{ request('inneed') == 'interview' ? 'selected' : '' }} value="interview">Need Embassy Interview</option>  
                                <option {{ request('inneed') == 'flight' ? 'selected' : '' }} value="flight">Flight Out</option>  
                            </select>

                            @error('inneed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-md-6">


                            <select name="caseType" id="inneed" class="form-control  m-1 @error('inneed') is-invalid @enderror">
                                <option value="">Case (All)</option>
                                
                                
                                @foreach ($caseType as $case)
                                <option {{ request('caseType') == $case ? 'selected' : '' }} value="{{ $case }}">{{$case}}</option>   
                                @endforeach
                                <option value="Unknow">Unknow</option>
                            </select>

                            @error('inneed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            </div>
                    </div>


                    <div class="float-end">
                        <button type="submit"  class="btn btn-primary btn-sm">Search</button>
                    </div>
                </div>


                </form>
                </div>

                    <table class="table table-table">


                        <tr>
                            <th>{{ __('Name') }}</th>

                            <th>{{ __('Passport') }}</th>
                        
                            <th>{{ __('Destination') }}</th>
                            <th>{{ __('Case Type') }}</th>

                            <th>{{ __('covid-19 Vaccine') }}</th>
                            <th>{{ __('UAE Biometric') }}</th>
                            <th>{{ __('Interview') }}</th>
                        </tr>
    
                        @foreach ($people as $person)
                            
                        
                        <tr>
                            <td>     {!! ($person->gender == 'male' ? '<i class="fas fa-male"></i>' : '<i class="fas fa-female"></i>') !!}  <a href="{{ route('people.show' , ['person' => $person->id])}}">{{ $person->fullname }}</td>
                            <td> 
                                @if($person->passportNumber  == 'Need')
                                <span class="text-danger"><i class="far fa-circle"></i> Required </span>

                                @elseif($person->passportNumber  == 'Not Applicable')
                                <span class="text-secondery"><i class="far fa-circle"></i> NA </span>
                                @else
                                <span class="text-success"><i class="fas fa-circle"></i> {{ $person->passportNumber  }} </span>
                                @endif
                          
                            </td>


                            <td> {{ $person->destinationCountry }}</a></td>
                            <td> 
                                
                                @if($person->caseApproved)
                                <span class="text-success">{{ $person->caseType }} <i class="fas fa-check-circle"></i></span>
                                @else
                                <span class="text-danger">{{ $person->caseType }} <i class="fas fa-times-circle"></i></span>
                                @endif

                            </td>


                            <td>
                                
                                
                                {!! $person->covid19VaccineDate ? '<span class="text-success"><i class="fas fa-circle"></i> Done </span>'  : '<span class="text-danger"><i class="far fa-circle"></i> Required </span>' !!}
                            
                            
                            </td>
                            <td>
                                {!! $person->uaeBiometricDate ? '<span class="text-success"><i class="fas fa-circle"></i> Done </span>'  : '<span class="text-danger"><i class="far fa-circle"></i> Required </span>' !!}
                            
                            </td>
                           
                            <td> 
                                {!! $person->interviewDate ? '<span class="text-success"><i class="fas fa-circle"></i> Done </span>'  : '<span class="text-danger"><i class="far fa-circle"></i> Required </span>' !!}
                            
                            </td>
                        </tr>
                        @endforeach
                     </table>

                     {{ $people->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
