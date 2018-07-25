@extends($extend)

@section('content')

{!! $static->content !!}
<script src="{{ URL::to('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ URL::to('vendor/ckfinder/ckfinder.js')}}"></script>

 <form id="create_static_form" action="{{ route('create_static') }}">
     
    <input type="text" name="static_name" id="static_name"/>
     
    <textarea name="content" id="content"></textarea>
     
     <input type="button" onclick="edit_static_content()" value="submit">

</form>

      



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
    
    
//CKFinder.setupCKEditor( content, "{{ URL::to('vendor/ckfinder/ckfinder.js')}}" );

@if (true)
    
@php

    $dumb = str_replace(array("\r","\n"),"",$static->content);

@endphp
    

var temp = '{!! $dumb !!}';   

    alert(temp);
   CKEDITOR.instances.content.setData(temp); 

@endif

});

    
      
    function create_static_content()
    {
        var temp = CKEDITOR.instances.content.getData().replace('\n','').replace('\r','');
        alert(temp + "clicked");
        
         $.ajax({
                        method     :"POST",
                        url: $('#edit_static_form').attr( 'action' ),
                        data     : {
                            
                            _token : "{{Session::token()}}",
                            content: temp,
                            name: $('#static_name').val();
                            
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