@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Room
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-room')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Type of room:</label>
                                    <select name="cate_room" class="form-control input-lg m-bot15">
                                        @foreach($cate_room as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{ $cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name room:</label>
                                    <input type="text" class="form-control" name="room_name" id="roomname" placeholder="Enter Name Room">
                                </div>
                                                            
                                <div class="form-group">
                                    <label>State:</label>
                                    <select name="room_display" class="form-control input-lg m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Display</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_room" class="btn btn-info">Add</button>
                                 <a href="{{URL::to('/all-room')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>
@endsection