@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Choose room
                        </header>
                       
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/selected-room')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="customer_id" value="{{$customer_id}}">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <select name="category_room" id="categoryroom" class="form-control input-lg m-bot15">
                                    	<option value="">--Chọn loại phòng--</option>
                                        @foreach($select_cate_room as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{ $cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" name="selected_room" class="btn btn-info pull-right">Book <i class="fa fa-arrow-right"></i></button>
                                <a href="{{URL::to('/all-customer')}}" class="btn btn-danger pull-left"><i class="fa fa-arrow-left"></i> Back</a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
