@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List of Guests') }} 
                
               <div class="float-end">
                   <a href="{{  route('categories.create') }}{{ (request('type') ? '?type='.request('type') : '') }}" class="btn btn-primary btn-sm">Add</a>
               </div>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <table class="table table-table">


                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Type') }}</th>
                    </tr>

                    @foreach ($categories as $category)
                        
                    
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td> <a href="{{ route('categories.index')}}?type={{ $category->type }}">{{ $category->type }}</a></td>
                    </tr>
                    @endforeach
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
