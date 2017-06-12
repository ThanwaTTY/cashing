@extends('layouts.app')

@section('content')
  <script type="text/javascript">

  $(function(){
  	$("#dateInput").datetimepicker({
  		altField: "#timeInput",
  		dateFormat: 'yy-mm-dd',
  		timeFormat: "HH:mm:ss"
  	});
  });

  </script>

<div class="container">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ทำรายการเพิ่ม</button>

    <table class="table table-hover">
    <tr>
      <th>#</th>
      <th>method</th>
      <th>fromBank</th>
      <th>fromAccountNumber</th>
      <th>fromAccountName</th>
      <th>amount</th>
      <th>transferDate</th>
      <th>transferTime	</th>
      <th>toBank</th>
      <th>toAccountNumber</th>
      <th>toAccountName</th>
      <th>transferStatus</th>
      <th>By</th>
      <th>Actions</th>
    </tr>
    @foreach ($cashs as $cash)
    <tr>
      <td>{{ $cash->id }}</td>
      <td>{{ $cash->method }}</td>
      <td>
        @if ($cash->fromBank == 'ธนาคารไทยพาณิชย์')
          <img src="logos/scb.png" alt="" width="75">
        @elseif ($cash->fromBank == 'ธนาคารกรุงเทพ')
          <img src="logos/KTB.jpg" alt="" width="75">
        @else
          {{ $cash->fromBank }}
        @endif
        </td>
      <td>{{ $cash->fromAccountNumber }}</td>
      <td>{{ $cash->fromAccountName }}</td>
      <td>{{ $cash->amount }}</td>
      <td>{{ $cash->transferDate }}</td>
      <td>{{ $cash->transferTime }}</td>
      <td>{{ $cash->toBank }}</td>
      <td>{{ $cash->toAccountNumber }}</td>
      <td>{{ $cash->toAccountName }}</td>
      <td>{{ $cash->transferStatus }}</td>
      <td>{{ $cash->user->name }}</td>{{-- {{ auth()->user()->name }} --}}
      <td>
        <form action="/cash/{{ $cash->id }}" method="post">
          {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <a href="/cash/{{ $cash->id }}/edit" type="Text" class="btn btn-xs btn-default">Edit</a>
        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
        </form>
      </td>
    </tr>
@endforeach


  </table>
<center>{{ $cashs->links() }}</center>



<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">รายการฝาก</h4>
          </div>
          <div class="modal-body">
                    <form method="post" action="/cash">
                      {{ csrf_field() }}
                      <div class="col-xs-6">
                      <div class="form-group">
                        <label for="title">Method</label>
                        <select class="form-control" name="method">
                        <option value=""></option>
                        <option value="ATM">ATM</option>
                        <option value="Internet Banking">Internet Banking</option>
                        <option value="Mobile Banking">Mobile Banking</option>
                        </select>

                        <!--<input type="text" class="form-control" name="method" id="method" placeholder="Method">-->
                      </div>
                      </div>
                      <div class="col-xs-6">
                      <div class="form-group">
                        <label for="fromBank">From Bank</label>
                    <select class="form-control" id="fromBank" name="fromBank">
                        <option value=""></option>
                        <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                        <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                        <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                        <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                        <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                        <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                        <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
                        <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                        <option value="ธนาคารธนชาติ">ธนาคารธนชาติ</option>
                        <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                    </select>
                        <!--<input type="text" class="form-control" name="fromBank" id="fromBank" placeholder="FromBank">-->
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="fromAccountNumber">From Account Number</label>
                        <input type="text" class="form-control" name="fromAccountNumber" id="fromAccountNumber" placeholder="345-1-12345-6">
                      </div>
                      <div class="form-group">
                        <label for="fromAccountName">From Account Name</label>
                        <input type="text" class="form-control" name="fromAccountName" id="fromAccountName" placeholder="นายสมมุติ คงมี">
                      </div>
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="1000">
                      </div>
                      <div class="col-xs-6">
                      <div class="form-group">
                        <label for="dateInput">Date</label>
                        {{--<input type="text" class="form-control" name="dateadd" id="datepicker" placeholder="Date">--}}
                        <input type="text" class="form-control" name="transferDate" id="dateInput" value="" placeholder="Date"/>
                      </div>
                      </div>
                      <div class="col-xs-6">
                      <div class="form-group">
                        <label for="timeInput">Time</label>
                        {{--<input type="text" class="form-control" name="dateadd" id="datepicker" placeholder="Date">--}}
                        <input type="text" class="form-control" name="transferTime" id="timeInput" value="" placeholder="Time"/>
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="toBank">To Bank</label>
                        <select class="form-control" id="toBank" name="toBank">
                        <option value=""></option>
                        <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                        <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                        <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                        <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                        <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                        <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                        <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
                        <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                        <option value="ธนาคารธนชาติ">ธนาคารธนชาติ</option>
                        <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                        </select>
                        <!--<input type="text" class="form-control" name="toBank" id="toBank" placeholder="To Bank">-->
                      </div>
                      <div class="form-group">
                        <label for="toAccountNumber">To Account Number</label>
                        <input type="text" class="form-control" name="toAccountNumber" id="toAccountNumber" placeholder="345-1-12345-6">
                      </div>
                      <div class="form-group">
                        <label for="toAccountName">To Account Name</label>
                        <input type="text" class="form-control" name="toAccountName" id="toAccountName" placeholder="นายรอรับ เงินโอน">
                      </div>
                      <div class="form-group">
                        <label for="transferStatus">transfer Status</label>
                      <select class="form-control" name="transferStatus" id="transferStatus">
                          <option value=""></option>
                          <option value="Waiting">Waiting</option>
                          <option value="Approved">Approved</option>
                          <option value="Rejected">Rejected</option>
                      </select>
                        <!--<input type="text" class="form-control" name="transferStatus" id="transferStatus" placeholder="transferStatus">-->
                      </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
    </div>
    <!-- End Modal -->

  </div>{{-- end content --}}

@endsection
