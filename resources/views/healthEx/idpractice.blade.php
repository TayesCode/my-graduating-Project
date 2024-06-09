

<table>
  <tr>
   <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.lName')}}</th>
 
    <th>{{__('field.photo')}}</th> 
    
   
</tr>
<tr>
    <th colspan='3' style='text-align:center'>{{__('field.membershipID')}}<b> <i>{{$data->memberID}}</i></b></th>
</tr>
  <tr>
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    <td>
        <img style='height:50px;' src="../storage/images/{{$data->photo}}" alt="image doesn't exist">
</td>

  </tr>
</table>