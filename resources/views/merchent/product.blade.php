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
                              <th>Product</th>
                              <th>Store</th>
                         </tr>
                       </thead>
                        <tbody>
                              @foreach($products as $product)
                              <tr>
                              
                                   <td>{{$product->title}}</td>
                                   <td> {{$product->store->store_name}}</td>
                              
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
         <div class="col-md-6">
          <form class="card" action="{{route('merchant.product.create')}}" method="post">
             <div class="card-body">
               @csrf 
               <div class="form-group">
                    <label for="">Store </label>
                    <select onchange="getCategory()" class="form-control" name="store_id" id="store_id">
                         <option value="" disabled selected>Select Store</option>
                         @foreach($stores as $store)
                              <option value="{{$store->id}}">{{$store->store_name}}</option>
                         @endforeach
                   </select>
               </div>
               <div class="form-group">
                    <label for="">Category </label>
                    <select class="form-control" name="category_id" id="category_id">
                         
                   </select>
               </div>
               <div class="form-group">
                    <label for="">Product name</label>
                    <input type="text" name="name" class="form-control">
               </div>
               <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" name="price" class="form-control">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     function getCategory() {
         var storeId = document.getElementById('store_id').value;
      
         // Make AJAX request
         $.ajax({
             url: '/merchant/get-categories/' + storeId,  // Your route for fetching categories
             method: 'GET',
             success: function(response) {
                 var categorySelect = document.getElementById('category_id');
                 categorySelect.innerHTML = '';  // Clear existing options
 
                 // Append new categories
                 response.forEach(function(category) {
                     var option = document.createElement('option');
                     option.value = category.id;
                     option.text = category.category_name;
                     categorySelect.appendChild(option);
                 });
             },
             error: function(xhr, status, error) {
                 alert('Something went wrong. Please try again.');
             }
         });
     }
 </script>
@endsection
