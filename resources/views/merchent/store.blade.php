@extends('layouts.backend')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
       <div class="row">
          <div class="col-md-12">
               @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

          </div>
          <div class="col-md-6 card">
              <div class="card-body">
                    <table class="table">
                        <thead>
                              <tr>
                                   <th>store</th>
                                   <th>action</th>
                              </tr>
                        </thead>
                        <tbody>
                         @foreach($stores as $store)
                              <tr>
                                  
                                   <td>{{$store->store_name}}</td>
                                   <td><a target="_blank" href="http://{{$store->domain}}.localhost:8000">view</a></td>
                                
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
         <div class="col-md-6">
          <form class="card" action="{{route('merchant.store.create')}}" method="post">
             <div class="card-body">
               @csrf 
               <div class="form-group">
                    <label for="">store name</label>
                    <input type="text" name="name" class="form-control">
               </div>
               <div class="form-group mt-2">
                    <input type="submit" value="submit" class="btn btn-primary">
               </div>
             </div>
              
          </form>
         </div>
       </div>
    </div>
</div>
@endsection
