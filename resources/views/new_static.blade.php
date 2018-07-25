@extends($extend)

@section('content')

<script src="{{ URL::to('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ URL::to('vendor/ckfinder/ckfinder.js')}}"></script>

 <script src = "{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>



    <style>

        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 0.7em;
        }
 
    </style>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

    <script src = "{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
    <script src = "{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>
    <link rel="stylesheet" href=" {{ URL::to('formValidateLib/animate.min.css') }} ">


	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Static Page</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list_static') }}">所有Static Pages</a></li>
				<li class="breadcrumb-item active">Create Static </li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Content
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
                    <form id="create_static_form" action="{{ route('create_static') }}">
                        <b>url suffix : </b><input label="url suffix" type="text" name="static_name" id="static_name"/>
                        
                        <textarea label="content" name="content" id="content"></textarea>
     
                        <input class="btn btn-default" type="submit" value="save"/>
<!--                         onclick="create_static_content()"-->
                
					
                        </form>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>  



<script>
    
    	$(document).ready(function(){
    var content = CKEDITOR.replace( 'content',
{
   
  filebrowserBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}',
  filebrowserImageBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}?type=Images',
  filebrowserFlashBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}?type=Flash',
  filebrowserUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Files&currentFolder={{ URL::to("vendor/ckfinder/upload")}}',
  filebrowserImageUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Images&currentFolder={{ URL::to("vendor/ckfinder/upload")}}',
  filebrowserFlashUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Flash'
});
            
//            $.validator.addMethod("mRequired", $.validator.methods.required,
//            "必須填寫");
//            
//            jQuery.validator.addClassRules({
//            must:{
//                mRequired : true,
//            },
//        });
    
            
                $("#create_static_form").validate({
                rules : {
                    static_name:{
                        required:true
                        
                    },
                    
                },
                messages:{
                    static_name:{
                        requried:"必須填寫"
                    },
                    

                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'category[]')){
                        error.appendTo("#categoryError");
                    }
                    else if ((element.attr('name') === 'extendCategory')){
                        error.insertAfter(element);
                    }
                    else if ((element.attr('name') === 'gender')){
                        error.appendTo(genderError)
                    }
                    else if ((element.attr('name') === 'groupClass')){
                        error.appendTo(groupClassError)
                    }
                    else if ((element.attr('name') === 'provideClassroom')){
                        error.appendTo(provideClassroomError)
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
               
                submitHandler: function (form) {
                   
                    var temp = CKEDITOR.instances.content.getData().replace('\n','').replace('\r','');
                    alert(temp + "clicked");

                    var temp2 = $('#static_name').val();

                     $.ajax({
                                    method     :"POST",
                                    url: $('#create_static_form').attr( 'action' ),
                                    data     : {

                                        _token : "{{Session::token()}}",
                                        content: temp,
                                        name: temp2

                                    },

                                    success  : function(data) {
                                        console.log("success ajax request!");
                                        console.log(data.success);
                                        if (data.success == true)
                                            {
                                                alert('content updated!');
                                                window.location.replace('{{route("list_static")}}'); 
                                            }

                                        else
                                            alert('failed to update content!');
                                    }
                                 });
                }
            });
            
            
            
        });
    
    
//CKFinder.setupCKEditor( content, "{{ URL::to('vendor/ckfinder/ckfinder.js')}}" );


    function create_static_content()
    {
        var temp = CKEDITOR.instances.content.getData().replace('\n','').replace('\r','');
        //alert(temp + "clicked");
        
        var temp2 = $('#static_name').val();
        
         $.ajax({
                        method     :"POST",
                        url: $('#create_static_form').attr( 'action' ),
                        data     : {
                            
                            _token : "{{Session::token()}}",
                            content: temp,
                            name: temp2
                            
                        },
             
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('content updated!');
                                    window.location.replace('{{route("list_static")}}'); 
                                }
                                                    
                            else
                                alert('failed to update content!');
                        }
                     });
        
        
    }
    

</script>



@endsection