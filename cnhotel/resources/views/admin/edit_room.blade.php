@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Room
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_room as $key => $pro)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-room/'.$pro->room_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>List of room:</label>
                                    <select name="cate_room" class="form-control input-lg m-bot15">
                                        @foreach($cate_room as $key => $cate)
                                            @if($cate->category_id == $pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{ $cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{ $cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room name:</label>
                                    <input type="text" class="form-control" name="room_name" id="roomname" value="{{$pro->room_name}}">
                                </div>
                                

                                <div class="form-group">
                                    <label>Room State:</label>
                                    <input type="text" class="form-control" id="roomstatus" name="room_status" value="{{$pro->room_status}}"></input>
                                </div>
                                <button type="submit" name="add_room" class="btn btn-info">Edit</button>
                                <a href="{{URL::to('/all-room')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a> 
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
           
        </div>
@endsection