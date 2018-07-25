@extends($extend)

@section('content')


<script src="{{ URL::to('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ URL::to('vendor/ckfinder/ckfinder.js')}}"></script>

<script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>


	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Static Page</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin_home') }}">後台首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_home') }}">所有Static Pages</a></li>
				<li class="breadcrumb-item active">{!! $static->name !!} </li>
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
                     <form id="edit_static_form" action="{{ route('edit_static',$static->name) }}">
     
     
                            <textarea name="content" id="content"></textarea>
     
                         <a class="btn btn-default" onclick="edit_static_content()">save</a>

                    </form>
					
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

<h1>Preview</h1>

{!! $static->content !!} 







<script>
    
    	$(document).ready(function(){
            
    CKEDITOR.editorConfig = function(config)
    {
//        config.height = '3000px';
        config.extraPlugins = 'youtube';
        config.toolbar = [      
    
        { name: 'others', items: [ 'Youtube' ] },       
    ];
        
    }
    var content = CKEDITOR.replace( 'content',
{
   
  filebrowserBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}',
  filebrowserImageBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}?type=Images',
  filebrowserFlashBrowseUrl : '{{ URL::to("vendor/ckfinder/ckfinder.html")}}?type=Flash',
  filebrowserUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Files&currentFolder={{ URL::to("vendor/ckfinder/upload")}}',
  filebrowserImageUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Images&currentFolder={{ URL::to("vendor/ckfinder/upload")}}',
  filebrowserFlashUploadUrl : '{{ URL::to("vendor/ckfinder/core/connector/php/connector.php")}}?command=QuickUpload&type=Flash'
});
    
    
//CKFinder.setupCKEditor( content, "{{ URL::to('vendor/ckfinder/ckfinder.js')}}" );

@if (true)
    
@php

    $dumb = str_replace(array("\r","\n"),"",$static->content);

@endphp
    

var temp = '{!! $dumb !!}';   
//
//    alert(temp);
   CKEDITOR.instances.content.setData(temp); 

@endif

});

    
      
    function edit_static_content()
    {
        var temp = CKEDITOR.instances.content.getData().replace('\n','').replace('\r','');
//        alert(temp + "clicked");
        
         $.ajax({
                        method     :"POST",
                        url: $('#edit_static_form').attr( 'action' ),
                        data     : {
                            
                            _token : "{{Session::token()}}",
                            content: temp,
                            
                        },
             
                        success  : function(data) {
                            console.log("success ajax request!");
                            console.log(data.success);
                            if (data.success == true)
                                {
                                    alert('content updated!');
                                    window.location.reload(); 
                                }
                                                    
                            else
                                alert('failed to update content!');
                        }
                     });
        
        
    }
    

</script>



@endsection