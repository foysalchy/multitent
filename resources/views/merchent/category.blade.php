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
                                   <th>Category</th>
                                   <th>Store</th>
                              </tr>
                        </thead>
                        <tbody>
                              @foreach($categories as $category)
                                   <tr>
                                   
                                        <td>{{$category->category_name}}</td>
                                        <td> {{$category->store->store_name}}</td>
                                   
                                   </tr>
                              @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
         <div class="col-md-6">
          <form class="card" action="{{route('merchant.category.create')}}" method="post">
             <div class="card-body">
               @csrf 
               <div class="form-group">
                    <label for="">Store </label>
                   <select class="form-control" name="store_id" id="">
                    @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->store_name}}</option>
                    @endforeach
                   </select>
               </div>
               <div class="form-group">
                    <label for="">Category name</label>
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
