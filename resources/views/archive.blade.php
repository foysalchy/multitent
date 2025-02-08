@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h4><b>Product</b></h4>
            <div class="row">
                @foreach ($products as $item)
                    
                    <div class="col-md-3">
                        <div class="card">
                            <img src="" alt="" width="100%" height="160px">
                            <p> {{$item->title}}</p>
                            <p>TK. {{$item->price}}</p>
                        </div>
                    </div>
               
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
