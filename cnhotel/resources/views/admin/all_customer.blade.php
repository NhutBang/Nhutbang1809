@extends('layout')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        List of customer
    </div>
    
    <div class="table-responsive">
         <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
       <div class="row">
          <a href="{{URL::to('/add-customer')}}" class="btn btn-primary" style="margin-left: 30px"><i class="fa fa-plus"></i> Add customer</a>
        </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>date of bỉth</th>
            <th>number phone</th>
            <th>adress</th>
            <th>identity id</th>
            <th>action</th>
            <th>book</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_customer as $key => $customer)
            <tr>
              <td>{{ $customer->customer_id }}</td>
              <td>{{ $customer->customer_name }}</td>
              <td>
                <?php
                  if ($customer->customer_sex == 0) {
                    echo 'Nữ';
                  } else{
                    echo 'Nam';
                  }
                ?>
              </td>
              <td>{{ $customer->customer_birth }}</td>
              <td>{{ $customer->customer_phone }}</td>
              <td>{{ $customer->customer_address }}</td>
              <td>{{ $customer->customer_idNo }}</td>
              <td>
              <a href="{{URL::to('edit-customer/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm ('Do you want to delete customer?')" href="{{URL::to('delete-customer/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
            <td>
              <a href="{{URL::to('/book-room/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-check text-success text-active"></i>
              </a>
            </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection