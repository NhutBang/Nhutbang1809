@extends('layout')
@section('content')


<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Bill
    </div>

    <div class="container">
      @foreach($checkout_detail as $key => $value)
      <h3 align="center">Room name: {{$value->room_name}}</h3>
      <br>
      <h3 align="center">Customer_id: {{$value->customer_id}}</h3>
      <br>
      <h3 align="center">Type: {{$value->room_category}}</h3>
      <br>
      <h3 align="center">hour: {{$value->number_hours}}</h3>
      <br>
      <h2 style="color: red" align="center">Total: {{number_format($value->total)}} đ</h2>
      @endforeach  
      <a href="{{URL::to('all-book-room')}}">Back</a>
    </div>
    
     
    </div>
   
  </div>


@endsection