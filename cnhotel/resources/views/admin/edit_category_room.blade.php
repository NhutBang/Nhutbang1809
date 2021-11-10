@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update type of room
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_category_room as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-room/'.$edit_value->category_id)}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Type name:</label>
                                    <input type="text" value="{{$edit_value->category_name}}" class="form-control" name="category_room_name" id="categoryname" placeholder="Enter">
                                </div>
                                <div class="form-group">
                                    <label>Price:</label>
                                    <input type="text" class="form-control" name="category_room_price" id="roomprice" value="{{$edit_value->category_room_price}}">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control" style="resize: none" rows="7" id="categorydesc" name="category_room_desc">{{$edit_value->category_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_category_room" class="btn btn-info">Update</button>
                                <a href="{{URL::to('/all-category-room')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a> 
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
           
        </div>
@endsection