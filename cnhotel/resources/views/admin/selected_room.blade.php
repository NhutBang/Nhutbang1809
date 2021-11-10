@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Choose Room
                        </header>
                     
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-book-room')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="customer_id" value="{{$customer_id}}">
                                <div class="form-group">
                                    <label>Choose room:</label>
                                    <select name="room_id" id="roomid" class="form-control input-lg m-bot15">
                                    	<option value="">--choose room--</option>
                                        @foreach($room_list as $key => $value)
                                        <option value="{{$value->room_id}}">{{ $value->room_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" name="save_book_room" class="btn btn-info pull-right">Book <i class="fa fa-check-circle"></i></button>
                                <a href="{{URL::to('/all-customer')}}" class="btn btn-danger pull-left"><i class="fa fa-arrow-left"></i> Back</a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>

@endsection