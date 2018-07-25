@extends($extend)

@section('content')

    <div class="container">

        <style>

            label.error {
                color: #f33;
                padding: 0;
                margin: 2px 0 0 0;
                font-size: 12px;
            }

            input.btn{
                border-radius: 28px;
                padding: 12px 12px 12px 12px;
                font-size: 12px
            }
        </style>


        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"/>
        <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">


        <script src="{{ URL::to('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ URL::to('formValidateLib/jquery.validate.js') }}"></script>


        <script src="{{ URL::to('formValidateLib/jquery.mask.js') }}"></script>
        <script src="{{ URL::to('formValidateLib/additional-methods.js') }}"></script>
        <script src="{{ URL::to('formValidateLib/localization/messages_zh_TW.min.js') }}"></script>

        <br/>
        <br/>

        <div class="row defaultHidden" id="success">
            <div class="col-lg-12">
                <div class="panel panel-success" style="border-color: #FEC339;">
                    <div class="panel-heading" style="background-color: #FEC339; border-color: #FEC339; color: black;"> 付款完成 </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div style="text-align: center;">
                                    <br/>
                                    <img src="../public/images/pay_success.png" height="10%" width="10%"/>
                                    <h1> 完成網上付款 </h1>
                                    <br/>
                                    <div style="font-size: 16px">
                                        <p>多謝支持Gympal，閣下已經成功付款</p>
                                        <br/>
                                        <p>閣下將會收到確認通知電郵，並請保存交易紀錄</p>
                                        <br/>
                                        <p>如有任何問題，可致電熱線或發送電郵與我們同事聯絡</p>

                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                    </div>

                                    <input type="button" class="btn"
                                           onclick='location.href="{{route("home")}}";' value="返回主頁"/>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
    
