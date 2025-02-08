@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h4><b>All Categories</b></h4>
            <div class="row">
                @foreach ($categories as $item)
                    
               
                <div class="col-md-2">
                    <a class="card card-body" href="{{ route('store.category.product', ['store' => getCurrentStore()->domain, 'slug' => $item->slug]) }}">{{$item->category_name}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
