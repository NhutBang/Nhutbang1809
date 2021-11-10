@extends('layout')
@section('content')


<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        List of room already booked
    </div>
    
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Customer id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>hour</th>
            <th>pay</th>

          </tr>
        </thead>
        <tbody>
           @foreach($all_book_room as $key => $value)
            <form role="form" action="{{URL::to('/checkout-room')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="room_id" value="{{$value->room_id}}" readonly="true">
             <tr>
             <td><input type="text" name="customer_id" value="{{$value->customer_id}}" readonly="true"></td>
              <td><input type="text" name="room_name" value="{{$value->room_name}}" readonly="true"></td>
              <td><input type="text" name="room_category" value="{{$value->category_name}}" readonly="true"></td>
              <input type="hidden" name="price" value="{{$value->category_room_price}}">
              <td><input type="text" style =" width:100px " name="room_price" value="{{ number_format($value->category_room_price) }}" readonly="true"> đ/12h </td>
              
              <td><input type="text" class="form-control" name="sogio" placeholder="Enter Hour"></td>
              <td>
                  <button type="submit" class="btn btn-default">Charge <i class="fa fa-money text-success text-active"></i></button>
              </td>
            </tr>
           </form>
          
         @endforeach
        </tbody>
      </table>
    </div>
   
  </div>


@endsection