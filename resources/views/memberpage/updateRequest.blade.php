@extends('memberpage/index')
@section('content')

    <head>
        <link rel="stylesheet" href="css/inputForm.css">
    </head>

    <body>
        <div style="padding: 20px">
            <div class="container">
             
                <hr>
                <div style="padding: 30px">
                    <form action="{{url('/storeRequest')}}" method  ='post'>
                    @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif      
                    @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="memberID">{{__('field.memberID')}}</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="memberID" name="memberID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="subject">{{__('field.subject')}}</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="subject" name="subject"
                                    >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="description">{{__('field.description')}}</label>
                            </div>
                            <div class="col-75">
                                <textarea id="subject" name="description"  style="height:200px"></textarea>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-25">
                                <label for="extensionId">ExtensionID</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="extension" name="extension-id"
                                    placeholder="enter the subject for the  request">
                            </div>
                        </div> -->
                        <div class="buttonContainer">
                            <input class="btn btn-danger" type="reset" value="{{__('field.reset')}}"> 
                            <input class="btn btn-primary" type="submit" value="{{__('field.register')}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection