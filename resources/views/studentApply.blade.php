@extends('masters.guest_master')

@section('content')
    <!--/* JQuery was added in the master*/-->
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


    <link href="{{ URL::to('css/modern-business.css') }}" rel="stylesheet">


    <style>
        input.btn{
            border-radius: 28px;
            padding: 12px 12px 12px 12px;
            font-size: 12px
        }
        label.error{
            color: #f33;
            padding: 0;
            margin: 2px 0 0 0;
            font-size: 12px;
        }
        .defaultHidden{
            display:none;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> 學生登記 </h1>
        </div>
    </div>
        <div style="text-align: center;">
                <img src="../public/images/sa_intro.jpg" height="100%" width="80%" />
        </div>
       <!-- Declaration Form -->
        <div class="row" id ="declarationFormRow">
       <!--  <div style="text-align: center;">
             <img src="../public/images/ca_intro.jpg" height="100%" width="80%" />
        </div> -->
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading"> 聲明 </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id ="declarationForm" role="form">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="50" cols="100" disabled="disabled">
Gympal Limited應用程式/網站所提供的資料只作參考。Gympal Limited會保持信息是最新、正確的。Gympal Limited將不負責因教練或導師資料不更新出現的任何問題；Gympal Limited將不會確認每一單預訂個案。對於在我們的網站上顯示教練或導師相關的附加信息，Gympal Limited建議您聯繫該教練或導師了解。Gympal Limited對任何損失將不會有任何責任包括（但不限於業務或利潤損失造成的損害）侵權而產生的其他方式或任何行動或作為使用本網站引申的問題。當使用者通過其他網站／機構進入Gympal Limited時請確保該網站／機構是正確的。Gympal Limited將一律不負責因其他相關網站導致客戶的任何的損失。
以下乃閣下須就Gympal Limited提供使用gympal.com.hk網站（簡稱「此網站」）及其提供之服務需要遵守之條款和規則。在方格勾上「我接受」，即表示你同意接受這些條款和規則之約束。Gympal Limited可隨時修訂條款內容，修訂條款會在此網站內張貼。新修訂條款將於張貼七天後自動生效。因此，閣下該定期檢視Gympal Limited對該等條款所作出之更改。倘於該等條款作出任何更改後，閣下仍繼續使用本網站或本網站提供的服務，則表示接納該等更改。此合約於二零一七年五月三十一日經修訂。

1. 定義
    1.1 詞彙之定義
以下詞彙在此合約中具下列定義：
「個案確認(confirm)／接受個案」指此網站職員如在電郵或電話對話中表明「個案已經confirm／確認」，如教練或導師沒有提出反對，從電郵或電話結束以後的一刻開始，個案已被視為「已確
認／confirm／已接受／已接納」
「教練或導師／學生/ Gympal Limited三方關係」指教練或導師與學生之關係為服務合作關係，其間只為獨立合作聘約，並不存在僱傭關係；教練或導師與此網站亦只存在服務提供者與服務使用者之關係，雙方沒有任何僱傭關係 ，服務亦與「職業介紹」完全無關
「會員合約 」指此網站的任何一部分所示指引、指南、內容、條款、說明，均為會員合約之一部分，此網站有權依據合約收取費用，成功登記即代表教練或導師同意所有條款
「公司商業註冊及對不法行為之追究」指此網站提供服務公司Gympal Limited，是香港特區政府之依法註冊公司，跟據香港特別行政區法例對網上行業／電貿（e-commerce）的規管及法律行駛，網際商業與其他實業皆受到相同法律之約束及保障
「教練登記」指會員教練或導師於此網站上進行登記，法律上與實體合約無異
「欺騙行為」指會員教練或導師虛報資料登記／行騙／與學生或串聯行騙
「Gympal」指由Gympal Limited提供服務之www.gympal.com.hk網站

    1.2 性別及數目
除非內文另有規定，有關此合約之條款之提述乃指此合約的條款，表明單數的字眼亦包括複數，反之亦然；表明個人之字眼亦包括公司及未註冊組織；表示男性的字眼亦包括女性及中性性別。

    1.3 標題
此合約中的標題只為方便閱讀而設，並非此合約內容的一部份，絕不會影響對此合約或其任何部份的解釋。

2. 提供服務
    2.1使用
任何人士欲以教練或導師身份使用此網站的服務，必須先登記為會員。

2.2 登記成為會員
用戶向Gympal提供所有需要資料及網上填妥表格，按下「確認」鍵後即成為會員。Gympal保留拒絕任何會員申請而不作任何解釋的權利。

3. Gympal Limited的職責
Gympal Limited只限於為教練或導師及或學生進行相互配對，以使教練或導師可以向學生提供私人或小組運動指導服務之網上交易平台。Gympal Limited明確聲明並沒有預先與學生或家長進行面談或家訪，而且學生或家長對教練或導師在道德、學術、修養、教學質素及質量等之合法性、合適性或其他合理性和原則，並不在Gympal Limited控制範圍之內；再者，Gympal Limited明確聲明教練或導師的人生安全或其他個人利益得失，亦非Gympal Limited控制範圍之內。Gympal Limited概不接納或承擔有關教練或導師和學生或家長之間之任何法律責任。Gympal Limited概不擔保學生或家長長期使用教練或導師，教練或導師如使用此網站服務，須自行評估風險或其他個人利益得失。所有人士必須留意與未屆合法年齡人士、提供虛假理由或沒有訂約的行為能力的人士進行交易所涉及的風險。若學生或家長與教練或導師之間出現任何糾紛或因使用服務而引起任何糾紛，與該等糾紛有關或因而引起的所有責任、索償、索求、賠償金（實質或間接），不論屬何性質，已知及未知、懷疑與否、已公開及未公開者，Gympal Limited一概毋須負上有關法律責任。

4. 有關教練或導師中介服務之條款
倘閣下，作為教練或導師，確認接納Gympal Limited之個案後，必須盡力依照Gympal Limited所發出的指示，上堂務必準時到達及依時完成，不可在沒有學生或家長同意的情況下刪減時間。
教練或導師如沒有提供正確資料，或因沒有提供正確資料而教練或導師個案服務被終止，Gympal Limited可以拒絕為其提供服務，亦有可以收取所衍生之行政費用。教練或導師如被證實，或Gympal Limited認為或發現教練或導師極有可能與學生或家長串聯進行任何欺騙行為，包括並不限於在教練或導師仍然為學生提供有關服務之時，其任何一方向Gympal Limited謊報服務經已終止，Gympal Limited會立即終止有關教練或導師的會員資格，並要求有關人士於五天內清繳有關全部費用；即使其後學生或家長決定終止有關人士之服務，有關人士仍須繳付全數服務費用。Gympal Limited會保留一切刑事及民事追究之權利，並不會容忍任何欺騙行為出現。

5. 保障私隱政策
Gympal Limited現行的保障私隱政策已載入本文，並構成本合約之一部份。閣下透過註冊成為用戶以及登入使用服務，即受該等政策所載之條款約束，並同意以該等政策所載之形式使用、披露
及轉讓閣下之個人資料。
倘發現用戶出現以下行為，則Gympal Limited有權暫停或終止用戶資格而毋須支付賠償：
(a) 違反本合約所列出之條件及條款，或
(b)（透過定罪、和解、保險或託管調查或其他方式）而從事與此網站有關之欺騙行為。
Gympal Limited擁有絕對及不受約束之權力，拒絕或刪除用戶所提供之任何資料，而毋須向任何一方發出通知或作出賠償。在無損此項權利下，倘教練或導師所提供之任何資料一旦刊登或繼續刊登，會導致Gympal Limited須為第三者負上任何法律責任，或令Gympal Limited觸犯任何有效司法管轄區的任何法律或規則或第三者的權益，則Gympal Limited擁有權拒絕或修改任何所提供之資料。
Gympal Limited擁有絕對及不受約束的權利，撤回任何服務條件而不向教練或導師發出任何通知或作出任何賠償。在無減損此權利下，倘發生下列情況，Gympal Limited有權撤回服務：

(a) 該教練或導師提供有個人資料有極大可能不全正確；
(b) 教練或導師被發現違反本合約列出的條件及條款，或其戶口被Gympal Limited根據此合約的條款勒令暫停；
(c) Gympal Limited因任何原因無法核實或證實教練/導師或學生/家長提供的任何資料。

6. 概不保證
Gympal Limited按「現狀」基準提供此網站服務。Gympal Limited之僅有責任已在此合約中列出。除在此合約中清楚列出之事項外，Gympal Limited不會作出任何明確或隱含之保證或條件。Gympal Limited不能保證此網站所設之功能以及所提供之服務將會不受干擾或無誤，或問題將獲修正或此網站或其伺服器將無病毒或其他有害元素。Gympal Limited並不就用戶或用戶使用此網站之後果作保證或任何聲明。提供予用戶之付款機制以及輔助性處理付款設施，乃僅便於用戶使用，而Gympal Limited概不就該等設施提供任何明確或隱含之保證。在任何情況下，Gympal Limited概不就用戶來自或因任何誤差及／或錯誤及／或錯誤扣除或計入信用卡賬戶之錯誤月結單以及任何故障、失靈、中斷、停工時間、干擾、計算錯誤、延誤、失準、損失或數據訛誤或任何其他有關付款渠道設施失靈而蒙受或產生之任何損失、賠償、成本或開支負上責任。所有用戶在使用此網站服務時，須遵守所有適用法律、規程、條例和守則。除非特別聲明，所有通知均以電子郵件或電話形式發出，及就用戶而言，倘通知已透過用戶於登記時向Gympal Limited提供的電郵地址或其他由該用戶指定的電郵地址或透過在此網站張貼通知，則已被視作發出通知。Gympal Limited有權以各種形式，包括電郵、郵寄等會訊，如希望不再接收，必須之前電郵通知我們，我們在處理會回覆確實；日後會員如需要再次接收，必須再行電郵通知Gympal Limited。Gympal Limited擁有這份會員合約的最終解釋權。

7. 條款的獨立性
倘根據任何具司法管轄權的法院所實際引用的適用法例，此合約中的任何條款屬違法或無法實施，此等條款將與合約分開及視作無效論，而絕不影響此合約的其餘條款。然而，在有關法律容許的情況下，若有關法律條文可獲寬免，各方須同意其獲寬免，以便此合約的有關條款能夠有效、具約束力及得以實施。倘閣下利用Gympal Limited系統或任何程序或伺服器漏動，竊取任何資料，閣下須負上一切法律責任。
報行管轄的法律及司法機構
(a) 本合約受香港特別行政區法律管轄，並依香港特別行政區法律詮釋。
(b) 與此網站之使用有關或因此而起的任何法律行動或訴訟，任何有關一方須願受香港特別行政區法院的司法管轄權管轄；任何一方不得以有關訴訟被帶到任何不相稱的法院為理由而提出反對。
(c) 上文所述願受香港特別行政區法院司法管轄權的管轄並不會影響其他任何一方於任何司法範圍提起訴訟的權利；而於任何司法範圍提起訴訟亦不表示其他任何一方不能於其他任何司法範圍提起訴訟。

8. 收費
使用服務中收費列於「收費須知」中，而該收費說明乃已納入本合約中，並視為構成合約的一部份。Gympal Limited保留隨時更改有關收費的權利，而新收費將於指定日期生效（生效日期將為網頁刊登經修訂收費表後的七天內）。所有用戶必須於每次使用服務前查核收費表。收費按以下方法繳付：倘用戶為個人，則須透過銀行轉賬或信用卡網上付款。倘若任何用戶不準時繳費，Gympal Limited有權暫停該用戶的會員資格及暫停提供服務，直至到用戶繳費為止。該用戶須在Gympal Limited要求下付尚欠金額的利息，按每月2%之利率繳付日息，從繳費到期日起計算，直至付款為止。此款項為逾期繳費的算定損失賠償，並非罰款。另外，Gympal Limited有權在客戶過期未有繳款之十天後加收總結欠再加上10%的罰款；如Gympal Limited最終交由香港特別行政區合法收賬公司及由律師發出相關信件代行收取，用戶除了需繳付有關服務費用、利息及相關罰款之同時，用戶並必須繳付一切因其欠款所衍生之收賬公司之服務費用或佣金、律師及法律事務費用。除非另有所指，所有收費均以港幣為單位。所有適用之稅項，以及在閣下使用GympalLimited所帶來的收入而衍生之稅務情況，一概由閣下負責。Gympal Limited可全權酌情決定隨時增加、刪減或更改部份或全部服務。</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="agreeDeclarationBox" value="check"/> 本人已參閱以上學生條款，並同意Gympal的私隱政策、使用條款及收費須知；本人保證填妥資料正確無誤。<br>
                                        <labal class = "error" id = "dcError"></labal>
                                    </div>
                                    <div class="form-group" tyle="text-align: center;">
                                        <div style="text-align: center;">
                                            <input class="btn" type="submit" name="" value="同意" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- BasicInformation Form -->
    <div class="row defaultHidden" id = "BasicInformationFormRow">
    <!-- <div style="text-align: center;">
                <img src="../public/images/sa_intro.jpg" height="100%" width="80%" />
        </div> -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 基本資料 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class = "defaultHidden" id = "BasicInformationForm" role="form" action="studentRegister" method="post">
                                <p><b>個人資料</b></p>
                                <div class="form-group">
                                    登入電郵<input class = "must form-control" type="text" id ="loginEmail" name ="loginEmail"/><label class="error" id="loginEmailError"></label><br>
                                    登入密碼<input class = "must form-control" type="password" id="loginPassword" name ="loginPassword"><br>
                                    確認密碼<input class = "must form-control" type="password" id="confirmPassword" name ="confirmPassword"><br>
                                    顯示名稱<input class = "must form-control" type="text" id="username" name ="username"><br>
                                    英文姓名<input class = "form-control" type="text" id="engName" name ="engName"><br>
                                    中文姓名<input class = "form-control" type="text" id="chinName" name ="chinName"><br>
                                    身份證號碼<input class = "must form-control" type="text" id="HKID" name ="HKID"><br>
 <!--                                </div>
                                <div class="form-group"> -->
                                    住宅地址<input class = "must form-control" type="text" name ="address"><br>
                                    <!-- Should use select here -->
                                    住宅區域
                                    <select class="mustChoose form-control" name="district">
                                        <option value ="default">--請選擇--</option>
                                        <option value="" disabled><p><b>---香港島---</b></p></option>
                                        @foreach ($hkDistricts as $hkDistrict)
                                            <option  value="{!!$hkDistrict->district_id!!}"/> {!! $hkDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---九龍區---</b></p></option>
                                        @foreach ($knDistricts as $knDistrict)
                                            <option value="{!!$knDistrict->district_id!!}"/> {!! $knDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---新界區---</b></p></option>
                                        @foreach ($ntDistricts as $ntDistrict)
                                            <option  value="{!!$ntDistrict->district_id!!}"/> {!! $ntDistrict->name_chin !!} </option>
                                        @endforeach
                                        <option value="" disabled><p><b>---其他地區---</b></p></option>
                                        @foreach ($otherDistricts as $otherDistrict)
                                            <option  value="{!!$otherDistrict->district_id!!}"/> {!! $otherDistrict->name_chin !!} </option>
                                        @endforeach
                                        <!--<input type="checkbox" name="area[]" value="1"/> 中半山，薄扶林 <br>-->
                                    </select>
                                </div>
                                <div class="form-group">
                                    電話號碼<input class = "must form-control" type="text" id="teleno" name ="teleno"><br>
                                    出生日期<input class = "must form-control" type="text" id="birthday" name ="birthday"><br>
                                </div>
                                <div class="form-group">
                                    性別 &nbsp;&nbsp;
                                    <input class ="must" type="radio" name = "gender" value="male"/>男 &nbsp &nbsp &nbsp<input class ="must" type="radio" name = "gender" value="female"/>女 <span id="genderError"> </span><br />
                                </div>
                                <div class="from-group">
                                    認識Gympal的途徑<br>
                                    <select class="mustChoose form-control" id="howToKnowGympal" name="howToKnowGympal" >
                                        <option value="default">--請選擇--</option>
                                        <option value="existingCustomer">舊有用戶，再次尋找教練</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="searchEngine">搜尋器(Google/Yahoo)</option>
                                        <option value="forum">討論區</option>
                                        <option value="friendsOrFamily">朋友家人</option>
                                        <option value="media">傳媒報導</option>
                                        <option value="poster">傳單海報</option>

                                    </select>
                                    <br>
                                </div>
                    
                        
                                <div class="form-group">
                                    <div style="text-align: center;">
                                        <input class="btn" type ="submit" value ="完成登記"/>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="success">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading"> 登記完成 </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div style="text-align: center;">
                                        <img src="../public/images/reg_success.png" height="10%" width="10%" />
                                        <h1> 完成學生登記 </h1>
                                        <div style="font-size: 16px">
                                            <p>歡迎您加入Gympal！</p>
                                            <p>閣下學生登記已成功申請</p>
                                            <p>會員確認電郵已經發送，請查看您的登記電郵並開通您的會員帳號</p>
                                            <p>成功登入後，閣下可以申請個案或在教練資料庫尋找您喜歡的教練</p>
                                            <br>
                                        </div>
                                        <div style="font-size: 14px">
                                            <p>注意，如果您沒有收到我們系統發送的"會員確認電郵"，請您：</p>
                                            <p>1) 先看看垃圾郵件箱/雜件箱，"會員確認電郵"有可能被電郵系統移至該處</p>
                                            <p>2) 嘗試更換另外一個電郵地址</p>
                                        </div>
                                        <input type="button" class="btn" onclick='location.href="{{route("home")}}";' value="返回主頁" />
                                </div>
                                <!-- <h1> Placeholder for Banner </h1>
                                登記完成, 可以在學生留言區申請個案, 或可致電我們熱線 <h6>XXXXXXXX</h6> 與我們同事與我們同事聯絡. 請<a href="{{ route('studentApply')}}">按此</a>返回.
                                登記完成, 可以在學生留言區申請個案, 或可致電我們熱線 <h6>XXXXXXXX</h6> 與我們同事與我們同事聯絡. 請<a href="{{route('home')}}">按此</a>返回. -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="fail">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading"> 資料有誤 </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            登記資料不符合格式或資料有誤, 請<a href="javascript:backPage()">按此</a>返回重新核對資料.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function backPage(){
            $('#fail').hide();
            $('#fail').animateCss('slideInRight');
            $('#BasicInformationFormRow').show();
            $('#BasicInformationForm').show();
            $('#BasicInformationFormRow').animateCss('slideInLeft');
        }


        function getWordsLength(words){
            var matches = words.match(/[\u00ff-\uffff]|\S+/g);
            return matches ? matches.length : 0;

        }
        
        $( function() {
            $( "#birthday" ).datepicker({
              dateFormat:"yy/mm/dd",
              yearRange: "-100:+0",
              changeMonth: true,
              changeYear: true
            });
        });

        $.fn.extend({
            animateCss: function (animationName, cb) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                this.addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                    if(cb){
                        cb();
                    }
                });
            }
        });

        $.validator.addMethod('daterange', function(value, element, arg) {
                if (this.optional(element) && !value) {
                    return true;
                }

                var d = new Date();
                var deadline = d.getFullYear()+"/12/31";
                var startDate = Date.parse(arg[0]);
                var endDate = Date.parse(deadline);
                var enteredDate = Date.parse(value);


                if (isNaN(enteredDate)) {
                    return false;
                }

                return ( (isNaN(startDate) || (startDate <= enteredDate)) &&
                         (isNaN(endDate) || (enteredDate <= endDate)));


               }, $.validator.format("請填寫有效日期"));

         $.validator.addMethod("wordsMax",
           function(value, element, params) {
              var count = getWordsLength(value);
              if(count <= params[0]) {
                 return true;
              }
           },
           $.validator.format("最多 300 個字")
        );
        $.validator.addMethod("mRequired", $.validator.methods.required,
            "必須填寫");

        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);}
            ,"格式錯誤");

        $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg != value;}
            ,"必須選擇");

        jQuery.validator.addClassRules({
            must:{
                mRequired : true,
            },
        });
        
        jQuery.validator.addClassRules({
            mustChoose:{
                valueNotEquals:"default"
            }
        });


        $("#loginPassword").mask('ZZZZZZZZZZZZZZZZ', {
            placeholder: "密碼須由英文字母及數字組合組成，長度為8 - 16",
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9]/, optional: true
                }
            }
        });
        $("#HKID").mask("Z000000L",
            {
                placeholder: "請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                translation: {
                    'Z': {
                        pattern: /[a-zA-Z0-9]/, optional: true
                    },
                    'L': {
                        pattern: /[A0-9]/, optional: true
                    }
                }
            }
        );
        $("#teleno").mask("00000000", {placeholder: ""});
        $("#birthday").mask("0000/00/00", {placeholder: "請輸入有效的日期 (YYYY/MM/DD)"});
        $(document).ready(function(){

            $('#fail').hide();
            $('#success').hide();

            $("#declarationForm").submit(function(e) {
                e.preventDefault();
            }).validate({
                rules : {
                    'agreeDeclarationBox':{
                        required: true,
                    }
                },
                messages:{
                    'agreeDeclarationBox':{
                        required: "請細閱並同意私隱政策、使用條款及收費須知",
                    }
                },
                errorPlacement: function(error, element) {
                    if((element.attr('name') === 'agreeDeclarationBox')){
                        error.insertAfter("#dcError");
                    }
                },
                submitHandler: function (form) {
                    $('#declarationFormRow').animateCss('slideOutRight', function(){
                            $('#declarationFormRow').hide();
                            $('#declarationForm').hide();
                            $('#BasicInformationFormRow').show();
                            $('#BasicInformationForm').show();
                            $('#BasicInformationFormRow').animateCss('slideInLeft');
                            // $('#BasicInformationForm').animateCss('slideInLeft');
                        }
                    );

                    return false
                }
            });


            $("#BasicInformationForm").validate({
                rules : {
                   
                    'loginEmail':{
                        email:true,
                    },
                    'loginPassword':{
                        regex: "^(?=.*[A-Za-z])(?=.*?[0-9]).{8,16}$"
                    },
                    confirmPassword:{
                        equalTo:"#loginPassword"
                    },
                    engName:{
                        regex:"^[a-zA-Z ]*$",
                        maxlength: 24,
                        required:{
                        depends: function(element){
                            return $("#chinName").val()=='';
                            }
                        }
                    },
                    chinName:{
                        regex:"^[\u4E00-\u9FA5]*$",
                        maxlength:8,
                        required:{
                        depends: function(element){
                             return $("#engName").val()=='';
                            }
                        }
                    },
                    teleno:{
                        regex:"^(?=.*?[0-9]).{8,}$"
                    },
                    username:{
                        maxlength: 24
                    },
                    address:{
                       // regex:"^[-'0-9A-Za-z,/ \u4e00-\u9eff]{1,150}$",
                       wordsMax:['80']
                    },
                    birthday:{
                        dateISO: true,
                        daterange:["1800/01/01"]
                    },
                    HKID:{
                        regex:"^([A-Z]{1})([0-9]{6})([A0-9])$"
                    },
                },
                messages:{
                   
                    'loginEmail':{
                        email:"請輸入有效的電子郵件"
                    },
                    loginPassword:{
                        regex:"密碼須由英文字母及數字組合組成，長度為8 - 16"
                    },
                    confirmPassword:{
                        equalTo:"與已填寫密碼不相同"
                    },
                    engName:{
                       required:"請填寫中文或英文名字",
                        regex:"請填寫有效英文名稱",
                        maxlength: "請填寫最多24位有效英文名稱"
                    },
                    chinName:{
                        required:"請填寫中文或英文名字",
                        regex:"請填寫有效中文名稱",
                        maxlength: "請填寫最多8位有效中文名稱"
                    },
                    HKID:{
                        regex:"請輸入所有英文字母及數字，無須輸入括號。例如你的香港身份證號碼是 A123456(7)，則輸入A1234567",
                        mRequired:"請輸入身份證號碼"
                    },
                     address:{
                       // regex:"請輸入位有效地址",
                       wordsMax: "請填寫最多80字有效地址"
                    },
                    district:{
                        valueNotEquals:"請選擇有效地區"
                    },
                    teleno:{
                        regex:"請填寫有效電話號碼"
                    },
                    gender:{
                        mRequired:"必須選擇"
                    },
                    username:{
                       maxlength:"請輸入最長24位有效名稱"
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
                    /*
                    $('#BasicInformationFormRow').animateCss('slideOutRight', function(){
                            $('#BasicInformationFormRow').hide();
                            $('#BasicInformationForm').hide();
                        }
                    );
                    */
                    $('#BasicInformationFormRow').hide();
                    $('#BasicInformationForm').hide();
                    $.ajax({
                        method     :"POST",
                        dataType:"json",
                        url: $('#BasicInformationForm').attr( 'action' ),
                        data     : $('#BasicInformationForm').serialize().replace(/%5B%5D/g, '[]'),
                        success  : function(data) {
                            $('#success').show();
                            $('#success').animateCss('slideInLeft');
                            // $('#success').animateCss('slideInLeft');
                            console.log("success ajax request!");
                            console.log(data);
                        },
                        error: function(err){
                            if(err.responseJSON.errors.loginEmail){
                                $('#BasicInformationFormRow').show();
                                $('#BasicInformationForm').show();
                                $('#loginEmailError').html("電郵已被登記，請重新輸入");
                                $('#loginEmailError').show();
                            }
                            else{
                                $('#fail').show();
                                $('#fail').animateCss('slideInLeft');
                            }
                        }
                    });

                    return false 
                }
            });

        });

    </script>


@endsection