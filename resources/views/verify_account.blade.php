@extends('masters.coach_home_master')

@section('content')
     <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>
    <!--
    <script src = "{{ URL::to('formValidateLib/inputmask/inputmask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/inputmask/jquery.inputmask.js') }}"></script>
    -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">


<script>
    
  
	$(document).ready(function(){
               $.ajax({
                    method     :"POST",
                    url: "{!! route('verify_account_post',$account->account_id) !!}",
                    data: {
                        
                            _token : "{{ Session::token() }}"
                    },
                    success  : function(data) {
                        console.log("success ajax request!");
                        console.log(data.success);
                        if (data.success == true)
                            {
                                alert('會員帳戶已成功驗證，請登入!');
                                window.location.href = "{!! route('getLogin') !!}";
                            }

                        else
                            {
                                alert('failed to verify ! :'+ data.error);
                                
                            }
                    }
                });
     
  
    })
    

</script>
@endsection
