@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="row">
         
               <h1>Admin Dashboard</h1>
              <div class="col-md-12">
               <table class="table">
                   <thead>
                    <tr>
                         <th>merchent</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach($merchents as $merchent)
                         <tr>
                              <td>{{$merchent->name}}</td>
                         </tr>
                         @endforeach
                   </tbody>
               </table>
              </div>
       
       </div>
    </div>
</div>
@endsection
