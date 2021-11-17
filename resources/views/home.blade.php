@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-3">
                            @include('reports.building')
                        </div>
                        <div class="col-md-6">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-md-12 text-center display-6"> B1 </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 1
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 2
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 3
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div style="height:450px; text-alight:center">

                                    <div class="display-2 col-md-4 offset-md-4">Cluster 3</div>
                                    <div class="col-md-4 offset-md-4">@include('reports.floor')</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body row">



                                        <div class="col-md-12 text-center display-6"> E2 </div>


                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 1
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 2
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    Floor 3
                                                    @include('reports.floor')
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @include('reports.building')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
