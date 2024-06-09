@extends('clinicalAuditor.clinicalAuditorHomepage')
@section('content')

    <head>
      
        <link rel="stylesheet" href="css/inputForm.css">
        <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> 

    </head>
    <style>
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            {
                width: 100%;
                margin-top: 0;
            }

            input{
                width: 90%;
                margin-top: 12px;
            }
            .editor1{
                    width:50%;
                    float:center;
                }
              
                .size{
                    height: 12px;
                }
        }
    </style>

    <body>
        <div style="padding: 20px">
            <div class="container">
                <div style="padding: 30px">

                    <form action="{{url('/registerAuditResult')}}" method='post'  enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class='alert alert-success'>{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class='alert alert-danger'>{{Session::get('fail')}}</div>
                    @endif      
                    @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="name">{{__('field.gClinicName')}}</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="name" name="nameOfClinic" ><br>
                                <span style='color:red'>@error('nameOfClinic'){{$message}}@enderror</span><br>

                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="name">{{__('field.gClinicID')}}</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="name" name="clinicID" ><br>
                                <span style='color:red'>@error('clinicID'){{$message}}@enderror</span><br>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="audit result">{{__('field.auditResult')}}</label>
                            </div>
                            <div class="col-75">
                            <!-- <textarea name="editor1" id="editor1" rows="4" styel="height=200px;"
                placeholder="This is my textarea to be replaced with CKEditor. " > 
        
                </textarea> 
                <script> 
                    // Replace the <textarea id="editor1"> with a CKEditor 
                    // instance, using default configuration. 
                    CKEDITOR.replace( 'editor1' ); 
                </script>  -->
                                <textarea id="editor1" name="auditResult"  style="height:200px"></textarea><br>
                                <span style='color:red'>@error('auditResult'){{$message}}@enderror</span><br>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="upload">{{__('field.upload')}}</label>
                            </div>
                            <div class="col-75">
                                <input type="file" id="uploadfile" name="fileupload" ><br>
                                <span style='color:red'>@error('uploadfile'){{$message}}@enderror</span><br>

                            </div>
                        </div>
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
<!--
    <!DOCTYPE html> 
    <html> 
        <head>
            <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> 
            <style>
                .editor1{
                    width:50%;
                    float:center;
                }
                form{
                    width:50%;
                    height: 45px;
                }
                .size{
                    height: 12px;
                }
            </style>
        </head> 
        <body> 
            <div class="size">
            <form> 
                <textarea name="editor1" id="editor1" rows="4" 
                placeholder="This is my textarea to be replaced with CKEditor. " > 
        
                </textarea> 
                <script> 
                    // Replace the <textarea id="editor1"> with a CKEditor 
                    // instance, using default configuration. 
                    CKEDITOR.replace( 'editor1' ); 
                </script> 
            </form> 
            </div>
        </body> 
    </html>

-->