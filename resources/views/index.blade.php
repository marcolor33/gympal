@extends('masters.master')

@section('content')

<!--
    <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
-->
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">


<style>
        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
    
        .option{
            cursor:pointer
        }
        .defaultHidden{
            display:none;
        }
</style>
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Template  </h1>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading"> Welcome </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                          <p>Login Function Testing! </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

     @if(Auth::check())
        <div><p>login!</p></div>
    @else 
        <p>{{ Auth::check() }}  Not login!</p>
    @endif

    <input type="button" onclick="history.back()" value="Back">
    <script>
        
        $(document).ready(function(){
            
        });
    </script>

	
@endsection