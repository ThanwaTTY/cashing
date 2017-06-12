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
  <form method="post" action="/cash/{{ $cash->id }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Method</label>
<select class="form-control" name="method">
<option value="{{ $cash->method }}">{{ $cash->method }}</option>
<option value="ATM">ATM</option>
<option value="Internet Banking">Internet Banking</option>
<option value="Mobile Banking">Mobile Banking</option>
</select>

      <!--<input type="text" class="form-control" name="method" id="method" placeholder="Method">-->
    </div>
    <div class="form-group">
      <label for="fromBank">From Bank</label>
<select class="form-control" id="fromBank" name="fromBank">
<option value="{{ $cash->fromBank }}">{{ $cash->fromBank }}</option>
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
    <div class="form-group">
      <label for="fromAccountNumber">From Account Number</label>
      <input type="text" class="form-control" name="fromAccountNumber" id="fromAccountNumber" placeholder="345-1-12345-6" value="{{ $cash->fromAccountNumber }}">
    </div>
    <div class="form-group">
      <label for="fromAccountName">From Account Name</label>
      <input type="text" class="form-control" name="fromAccountName" id="fromAccountName" placeholder="นายสมมุติ คงมี" value="{{ $cash->fromAccountName }}">
    </div>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="text" class="form-control" name="amount" id="amount" placeholder="1000" value="{{ $cash->amount }}">
    </div>
    <div class="form-group">
      <label for="dateInput">Date</label>
      {{--<input type="text" class="form-control" name="dateadd" id="datepicker" placeholder="Date">--}}
      <input type="text" class="form-control" name="transferDate" id="dateInput" value="{{ $cash->transferDate }}" placeholder="Date"/>
    </div>
    <div class="form-group">
      <label for="timeInput">Time</label>
      {{--<input type="text" class="form-control" name="dateadd" id="datepicker" placeholder="Date">--}}
      <input type="text" class="form-control" name="transferTime" id="timeInput" value="{{ $cash->transferTime }}" placeholder="Time"/>
    </div>
    <div class="form-group">
      <label for="toBank">To Bank</label>
      <select class="form-control" id="toBank" name="toBank">
      <option value="{{ $cash->toBank }}">{{ $cash->toBank }}</option>
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
      <input type="text" class="form-control" name="toAccountNumber" id="toAccountNumber" placeholder="345-1-12345-6" value="{{ $cash->toAccountNumber }}">
    </div>
    <div class="form-group">
      <label for="toAccountName">To Account Name</label>
      <input type="text" class="form-control" name="toAccountName" id="toAccountName" placeholder="นายรอรับ เงินโอน" value="{{ $cash->toAccountName }}">
    </div>
    <div class="form-group">
      <label for="transferStatus">transfer Status</label>
<select class="form-control" name="transferStatus" id="transferStatus">
<option value="{{ $cash->transferStatus }}">{{ $cash->transferStatus }}</option>
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


@endsection
