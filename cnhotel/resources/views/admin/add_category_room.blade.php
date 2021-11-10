@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Type Off Room
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
                                <form role="form" action="{{URL::to('/save-category-room')}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Type name:</label>
                                    <input type="text" class="form-control" name="category_room_name" id="categoryname" placeholder="Enter room type name">
                                </div>
                                <div class="form-group">
                                    <label>Price:</label>
                                    <input type="text" class="form-control" name="category_room_price" id="catroomprice" placeholder="Enter price thê room">
                                </div> 
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control" style="resize: none" rows="7" id="categorydesc" name="category_room_desc" placeholder="Enter description room"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>State:</label>
                                    <select name="category_room_status" class="form-control input-lg m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Display</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_room" class="btn btn-info">Add</button>
                                <a href="{{URL::to('/all-category-room')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a> 
                                </form>
                            </div>
                           

                        </div>
                    </section>

            </div>
           
        </div>
@endsection