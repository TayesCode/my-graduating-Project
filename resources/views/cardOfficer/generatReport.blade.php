<style>
    a{
        margin-left:5px;
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
        padding:3px;

    }
    tr:nth-child(even){
        background-color:#ddd;
    }
</style>
<!-- <head>
    <link rel="stylesheet" href="css/layout.css">
</head> -->
<h4>{{__('field.treatedIndividual')}}</h4><hr>
<table>
    <tr>
    <th>{{__('field.memberID')}}</th>
    <th>{{__('field.fName')}}</th>
    <th>{{__('field.mName')}}</th>
    <th>{{__('field.gClinicName')}}</th>
    <th>{{__('field.phone')}}</th>
    <th>{{__('field.dateOfTreatment')}}</th>
    </tr>
    @foreach($treated as $data)
    <tr>
        <td>{{$data->memberID}}</td>
        <td>{{$data->firstName}}</td>
        <td>{{$data->lastName}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->gratitudeclinicID}}</td>
        <td>{{$data->created_at}}</td>
    </tr>
    @endforeach
</table>

