@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Register a Guest') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('people.store') }}">
                        @csrf

                        

                        <div class="form-group row m-1 ">
                            <label for="arrivalDate" class="col-md-4 col-form-label text-md-right">{{ __('Arrival Date') }}</label>

                            <div class="col-md-6">
                                <input id="arrivalDate" value="{{ date('Y-m-d') }}" type="date" class="form-control @error('arrivalDate') is-invalid @enderror" name="arrivalDate" value="{{ old('arrivalDate') }}" required autocomplete="arrivalDate" autofocus>

                                @error('arrivalDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  m-1">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="false" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row  m-1">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Family Group') }}</label>

                            <div class="col-md-6">
                                <input id="familyGroup" type="text" class="form-control @error('familyGroup') is-invalid @enderror" name="familyGroup" value="{{ old('familyGroup') }}" required autocomplete="false" autofocus>

                                @error('familyGroup')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row  m-1">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control @error('city') is-invalid @enderror">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                           
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row  m-1">
                            <label for="dateofbirth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dateofbirth" type="date" class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" value="{{ old('dateofbirth') }}" required autocomplete="dateofbirth" autofocus>

                                @error('dateofbirth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group row m-1 border-top">
                            <div class="col-md-4">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Address') }}</label>
                            </div>

                            <div class="col-md-8">
                                <div class="row">



                                    <div class="col-md-12">


                                        <select name="city" id="city" class="form-control  m-1 @error('city') is-invalid @enderror">
                                            <option>Select City</option>
                                            @foreach ($cities as $id => $city)
                                            <option value="{{ $id }}">{{ $city }}</option>   
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
                                    <option>Select Cluster</option>
                                    @foreach ($clusters as  $id => $cluster)
                                        <option value="{{ $id }}">{{ $cluster }}</option>   
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
                                    <option>Select block</option>
                                    @foreach ($blocks as  $id => $block)
                                    <option value="{{ $id }}">{{ $block }}</option>   
                                @endforeach
                                </select>

                                @error('block')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input placeholder="Floor #" id="floor" type="number" min="1" max="9" class="form-control  m-1 @error('floor') is-invalid @enderror" name="floor" value="{{ old('floor') }}" required autocomplete="false" autofocus>

                                @error('floor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <input placeholder="Room #" id="room" type="number" min="1" max="9999" class="form-control  m-1 @error('room') is-invalid @enderror" name="room" value="{{ old('room') }}" required autocomplete="false" autofocus>

                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                </div>
                        </div>
                    </div>

                   
                    <div class="form-group row m-1 border-top">
                        <div class="col-md-4">
                        <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Contact Information') }}</label>
                        </div>

                        <div class="col-md-8">
                            <div class="row">





                        <div class="col-md-6">
                            <input placeholder="email" id="floor" type="email" class="form-control  m-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="false" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <input placeholder="Phone #" id="phone" type="text"  class="form-control  m-1 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="false" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            </div>
                    </div>
                </div>



                <div class="form-group row m-1 border-top">
                    <div class="col-md-4">
                    <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Document Information') }}</label>
                    </div>

                    <div class="col-md-8">
                        <div class="row">

                            <div class="col-md-6">
                               
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="passportNumberOption" id="exampleRadios1" value="have" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                      Have a valid Passport
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="passportNumberOption" id="exampleRadios2" value="need">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Need a valid Passport
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="passportNumberOption" id="exampleRadios3" value="na">
                                    <label class="form-check-label" for="exampleRadios3">
                                     Not Applicable
                                    </label>
                                  </div>
                            </div>

                    <div class="col-md-6">
                        <input placeholder="Passport Number" required id="passportNumber" type="text" class="form-control  m-1 @error('passportNumber') is-invalid @enderror" name="passportNumber" value="{{ old('passportNumber') }}" autocomplete="false" autofocus>

                        @error('passportNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

<hr>

                    <div class="col-md-6">
                               
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tazkira" id="tazkira1" value="have" checked>
                            <label class="form-check-label" for="tazkira1">
                              Have a valid Tazkira
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tazkira" id="tazkira2" value="need">
                            <label class="form-check-label" for="tazkira2">
                                Need a valid Tazkira
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="tazkira" id="tazkira3" value="na">
                            <label class="form-check-label" for="tazkira3">
                             Not Applicable
                            </label>
                          </div>
                    </div>

            <div class="col-md-6">
                <input placeholder="Tazkira Number" required id="tazkiraNumber" type="text" class="form-control  m-1 @error('tazkiraNumber') is-invalid @enderror" name="tazkiraNumber" value="{{ old('tazkiraNumber') }}" autocomplete="false" autofocus>

                @error('tazkiraNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

<hr>

            <div class="col-md-12">
                               
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marriageCertificate" id="marriageCertificate1" value="have" checked>
                    <label class="form-check-label" for="marriageCertificate1">
                      Have a valid Marriage Certificate
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marriageCertificate" id="marriageCertificate2" value="need">
                    <label class="form-check-label" for="marriageCertificate2">
                        Need a valid Marriage Certificate
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marriageCertificate" id="marriageCertificate3" value="na">
                    <label class="form-check-label" for="marriageCertificate3">
                     Not Applicable
                    </label>
                  </div>
            </div>




                        </div>
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
