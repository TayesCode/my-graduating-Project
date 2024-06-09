

<h4>{{__('field.membershipID')}}</h4><hr>
<style>
    a{
        margin-left:20px;
        border-radius:20px;
    }
    table{
        font-family:arial,sans-serif;
        border-collapse:collapse;
        width:100%;
        margin:20px;
        border-radius:30px;
    }
    td,th{
        border:1px solid #ddd;
        text-align:left;
        padding:8px;

    }
    tr:nth-child(even){
        background-color:#ddd;
    }
</style>
<table>

<tr>
    <th colspan='3' style='text-align:center'><b>{{__('field.membershipNo')}} <i>{{$data->memberID}}</i></b></th>
</tr>

<tr > 
   
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th> 
    <th>{{__('field.photo')}}</th> 
    
   
</tr>

  <tr>
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    <td>
        <img style='width:100px;' src="{{public_path("storage/images/".$data->photo)}}" alt="{{$data->photo}}">
</td>

  </tr>

     @foreach($result as $data)
    <tr >
    
    <td>{{$data->firstName}}</td>
    <td>{{$data->middleName}}</td>
    
    <td>
    <img style='width:100px;' src="{{public_path("storage/images/".$data->photo)}}" alt="image doesn't exist">
    </td>
    
    </tr> 
    @endforeach
  
</table>



