@extends($extend)

@section('content')

<div class="container">
{!! $static->content !!}


<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
<link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
<link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">

@endsection
    
</div>