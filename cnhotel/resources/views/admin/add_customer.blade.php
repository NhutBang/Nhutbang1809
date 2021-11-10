@extends('layout')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Customer
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
                                <form role="form" action="{{URL::to('/save-customer')}}" method="post">
                                    {{ csrf_field()}}
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="customer_name" id="customername" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <select name="customer_sex" class="form-control input-lg m-bot15">
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date of birth:</label>
                                    <input type="date" class="form-control" name="customer_birth" id="customerbirth">
                                </div>
                                <div class="form-group">
                                    <label>Number phone:</label>
                                    <input type="text" class="form-control" name="customer_phone" id="customerphone" placeholder="Enter number phone">
                                </div>
                                <div class="form-group">
                                    <label>address:</label>
                                    <input type="text" class="form-control" name="customer_address" id="customeraddress" placeholder="enter address">
                                </div>
                                <div class="form-group">
                                    <label>Identity card:</label>
                                    <input type="text" class="form-control" name="customer_idNo" id="customeridno" placeholder="Enter Identity card">
                                </div>
                                
                                
                                <button type="submit" name="add_category_room" class="btn btn-info">Add</button>
                                <a href="{{URL::to('/all-customer')}}" class="btn btn-danger pull-right"><i class="fa fa-arrow-left"></i> Back</a> 
                                </form>
                            </div>
                           

                        </div>
                    </section>

            </div>
           
        </div>
@endsection