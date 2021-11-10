@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add customer
                        </header>
                        <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_customer as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-customer/{$edit_value->customer_id}')}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>customer name:</label>
                                    <input type="text" value="{{$edit_value->customer_name}}" class="form-control" name="customer_name" id="customername" placeholder="Enter customer's name">
                                </div>
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <select name="customer_sex" class="form-control input-lg m-bot15">
                                        @if($edit_value->customer_sex == 0)
                                            <option value="0">Female</option>
                                            <option value="1">Male</option>
                                        @else
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>date of birth:</label>
                                    <input type="date" value="{{$edit_value->customer_birth}}" class="form-control" name="customer_birth" id="customerbirth">
                                </div>
                                <div class="form-group">
                                    <label>Number phone:</label>
                                    <input type="text" value="{{$edit_value->customer_phone}}" class="form-control" name="customer_phone" id="customerphone" placeholder="Enter Number">
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" value="{{$edit_value->customer_address}}" class="form-control" name="customer_address" id="customeraddress" placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label>Identity card:</label>
                                    <input type="text" value="{{$edit_value->customer_idNo}}" class="form-control" name="customer_idNo" id="customeridno" placeholder="Enter Identity ID">
                                </div>
                                
                                
                                <button type="submit" name="edit_customer" class="btn btn-info">Update</button>
                                <a href="{{URL::to('/all-customer')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a> 
                                </form>
                            </div>
                           
                            @endforeach
                        </div>
                    </section>

            </div>
           
        </div>
@endsection