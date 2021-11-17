@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Information: {{ $person->fullname }}</div>

                <div class="card-body">
                    @include('people.personDetials')

                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Case Update: {{ $person->fullname }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('people.editCaseSave', ['id' => $person->id, 't'=>'s']) }}">
                        @csrf



                  

                    <div class="form-group row  m-1">
                        <label for="arrivalDate" class="col-md-4 col-form-label text-md-right">{{ __('Enter') }}</label>


                        <div class="col-md-2">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled id="arrivalDateOption" checked>
                      
                              </div>
                            
               
                           
                        </div>

                        <div class="col-md-6">
                            
                         
                                <input class="form-control @error('arrivalDate') is-invalid @enderror" name="arrivalDate"  autocomplete="false" type="date" name="arrivalDate" value="{{ $person->arrivalDate}}">
                             
                              

                            @error('arrivalDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    
                    <div class="form-group row  m-1">
                        <label for="caseApproved" class="col-md-4 col-form-label text-md-right">{{ __('Covid-19 Vaccine') }}</label>


                        <div class="col-md-2">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="covid19VaccineDateOption" {{ $person->covid19VaccineDate ? 'checked' : ''}}>
                              </div>
                        </div>


                        <div class="col-md-6">
                     
                            <input id="covid19VaccineDate"  class=" {{ $person->covid19VaccineDate ? '' : 'd-none'}} form-control @error('covid19VaccineDate') is-invalid @enderror" name="covid19VaccineDate"  autocomplete="false" type="date" name="covid19VaccineDate" value="{{ $person->covid19VaccineDate}}">

                            @error('covid19VaccineDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>




                    <div class="form-group row  m-1">
                        <label for="uaeBiometricDate" class="col-md-4 col-form-label text-md-right">{{ __('UAE Biometric') }}</label>

                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="uaeBiometricDateOption" {{ $person->uaeBiometricDate ? 'checked' : ''}}>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <input id="uaeBiometricDate"  class=" {{ $person->uaeBiometricDate ? '' : 'd-none'}} form-control @error('uaeBiometricDate') is-invalid @enderror" name="uaeBiometricDate"  type="date" name="uaeBiometricDate" value="{{ $person->uaeBiometricDate}}">

                            @error('uaeBiometricDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row  m-1">
                        <label for="interviewDate" class="col-md-4 col-form-label text-md-right">{{ __('Interview') }}</label>

                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="interviewDateOption" {{ $person->interviewDate ? 'checked' : ''}}>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <input id="interviewDate"  class=" {{ $person->interviewDate ? '' : 'd-none'}} form-control @error('interviewDate') is-invalid @enderror" name="interviewDate"  type="date" name="interviewDate" value="{{ $person->interviewDate}}">

                            @error('interviewDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row  m-1">
                        <label for="leaveDate" class="col-md-4 col-form-label text-md-right">{{ __('Flight') }}</label>

                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="leaveDateOption" {{ $person->leaveDate ? 'checked' : ''}}>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <input id="leaveDate"  class=" {{ $person->leaveDate ? '' : 'd-none'}} form-control @error('leaveDate') is-invalid @enderror" name="leaveDate"  type="date" name="leaveDate" value="{{ $person->leaveDate}}">

                            @error('leaveDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
           
                        <div class="form-group row  m-1 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
