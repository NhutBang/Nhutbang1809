@extends('layout')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        List of room
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">active</option>
          <option value="1">delete</option>
          <option value="2">edit</option>
        </select>
        <button class="btn btn-sm btn-default">apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">find</button>
          </span>
        </div>
      </div>
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
          <a href="{{URL::to('/add-room')}}" class="btn btn-primary" style="margin-left: 30px"><i class="fa fa-plus"></i> Add room</a>
        </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Room Name</th>
           
            <th>Type</th>
            <th>State of room</th>
            <th>Display</th>
            <th style="width:30px;">Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_room as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->room_name }}</td>
           
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->room_status }}</td>
            <td><span class="text-ellipsis">
                <?php
                    if($pro->room_display == 0){
                ?>

                <a href="{{URL::to('/unactive-room/'.$pro->room_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                    } else{
                ?>
                <a href="{{URL::to('/active-room/'.$pro->room_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                    }
                ?>

            </span></td>
            <td>
              <a href="{{URL::to('edit-room/'.$pro->room_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm ('Do you want to delete?')" href="{{URL::to('delete-room/'.$pro->room_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
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