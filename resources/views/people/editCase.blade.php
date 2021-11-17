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
                    <form method="POST" action="{{ route('people.editCaseSave', ['id' => $person->id, 't'=>'c']) }}">
                        @csrf


                        <div class="form-group row  m-1">
                            <label for="destinationCountry" class="col-md-4 col-form-label text-md-right">{{ __('Destination Country') }}</label>

                            <div class="col-md-6">
                                <input id="destinationCountry" type="text" value="{{ $person->destinationCountry }}" class="form-control @error('destinationCountry') is-invalid @enderror" name="destinationCountry" value="{{ old('destinationCountry') }}" required autocomplete="false" autofocus>

                                @error('destinationCountry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>








                        <div class="form-group row m-1 border-top">
                            <div class="col-md-4">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Case Type') }}</label>
                            </div>

                            <div class="col-md-8 mt-1">
                             


                                        <select name="caseType" id="caseType" class="form-control @error('caseType') is-invalid @enderror">
                                            <option>Select caseType</option>
                                            @foreach ($caseTypes as  $case)
                                            <option {{ $case == $person->caseType ? 'selected' : '' }} value="{{ $case }}">{{ $case }}</option>   
                                        @endforeach
                                        </select>
        
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 
                        </div>
                    </div>

                    <div class="form-group row  m-1">
                        <label for="caseApproved" class="col-md-4 col-form-label text-md-right">{{ __('Approved') }}</label>

                        <div class="col-md-6">
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="caseApproved" id="flexRadioDefault1" {{ $person->caseApproved ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Yes
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" value="0" type="radio" name="caseApproved" id="flexRadioDefault2" {{ $person->caseApproved ? '' : 'checked'}}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  No
                                </label>
                              </div>


                            @error('caseApproved')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row  m-1">
                        <label for="caseNumber" class="col-md-4 col-form-label text-md-right">{{ __('Detials') }}</label>

                        <div class="col-md-6">
                           
                            <textarea rows="5" id="caseDetials" name="caseDetials" class="form-control @error('caseDetials') is-invalid @enderror">{{$person->caseDetials}}</textarea>
                            @error('caseDetials')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

           
                        <div class="form-group row  m-1 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
