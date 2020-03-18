@extends('layout.layout')
@section ('content')
<br>
<br>
<br>

<div class="container">
    @include('session.success')
   <h1>List of Staff</h1>
   <div class="float-right">
    <a href="{{ route('staff.create') }}" class="btn btn-info" style="margin-bottom:12px;"> Create New Staff</a>
</div>
   <form action="{{ url('/delete') }}" method="post">
    <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all btncheck" id = "btncheck" data-url="">Delete All</button>
      <input type="hidden" name="_method" value="DELETE">
      @csrf
   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th><input type="checkbox" id="check_all" class="selectall check"></th>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col" colspan ="2">Actions</th>
    </tr>
  </thead>
  <tbody>
     <!-- Default unchecked -->


     <?php $x=1; ?>
     @foreach($staffs as $staff)

         <tr>
            <td><input type="checkbox" class="checkbox selectbox" name="delid[]" value="{{$staff->id}}"></td>
            <td>{{ $x++ }}</td>
            <td>
               {{ $staff->staff_name }}
            </td>
            <td>{{ $staff->staff_email }}</td>
            <td>{{ $staff->staff_phonenumber }}</td>
            <td>{{ $staff->staff_address }}</td>
            <td colspan="2">
                <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-sm btn-primary"> <i class="fas fa-eye"></i>  Details</a>
                <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm btn-success"> <i class="fas fa-edit"></i>  Edit</a>
               <form style="display:inline-block;" method="post" action="{{route('staff.destroy', $staff->id)}}">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt    "></i> Delete</button>
               </form>
            </td>
         </tr>
     @endforeach
  </tbody>

</form>
</table>
<script type="text/javascript">

//if the box checked, then make button active
$(function() {
  var chk = $('.check');
  var btn = $('#btncheck');

  chk.on('change', function() {
    btn.prop("disabled", !this.checked);//true: disabled, false: enabled
  }).trigger('change'); //page load trigger event
});


$('.selectall').click(function(){
    $('.selectbox').prop('checked', $(this).prop('checked'));
})
$('.selectall2').click(function(){
    $('.selectbox').prop('checked', $(this).prop('checked'));
})
$('.selectbox').change(function(){
    var total = $('.selectbox').length;
    var number = $('.selectbox:checked').length;
    if(total == number){
        $('.selectall').prop('checked', true);
    } else{
        $('.selectall').prop('checked', false);
    }
})


</script>

</html></div>
@endsection
