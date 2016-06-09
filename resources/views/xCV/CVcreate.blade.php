@extends('xCV.template',['CV' => $CV])
<title>Tạo CV</title>
@section('content')
    <!--div  class="page-title"><h3>Tạo CV mới</h3></div-->
    <?php $key = $CV->id;?>
    <form action="" method="post" class="my-forms" id="j-forms-log" novalidate="novalidate">
        <fieldset id="field-box">
            <label slide-header=true>
                <div class="slide-header"> I. Thông tin cá nhân</div>
            </label>
            <ul slide-toggle=true>

                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Họ </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Last_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Last_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Last_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>

                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Tên </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="First_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->First_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_First_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Tên bằng kana </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i>カナ </i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Furigana_name"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Furigana_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Furigana_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="float_left" style="width: 20%; margin-top:30px;">

                        <div class="float_left">
                            <label for="gender0" class="radio"><input type="radio" id="gender0" editable="Rirekisho"
                                                                      name="Gender" value=0 <?php if (!$CV->Gender) {
                                    echo 'checked';
                                }?> ><i></i>Nữ</label>
                        </div>
                        <div class="float_right">
                            <label for="gender1" class="radio"><input type="radio" id="gender1" editable="Rirekisho"
                                                                      name="Gender" value=1 <?php if ($CV->Gender) {
                                    echo 'checked';
                                }?>><i></i>Nam
                            </label>
                        </div>

                    </div>
                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Ngày sinh(dd-mm-yy) </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-calendar-o"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" type="text" editable="Rirekisho" name="B_date"
                                   class="input-left float_left" style="width: 60%;" placeholder="some text"
                                   value="{{ $CV->Birthday }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_B_date_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Điện thoại</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-phone"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Phone" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Phone }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Phone_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Địa chỉ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Address" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Address }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Address_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Thông tin liên hệ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Contact_information"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Contact_information }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Contact_information_{{$key}}"
                                 style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table table-reload" id="1_0"
                               style="width: 90%;"> <!-- id  = record + school-->
                            <thead>
                            <tr class="">
                                <th colspan="5">School history**</th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Năm</th>
                                <th style="width:13%;">Tháng</th>
                                <th>Tên cơ sở giáo dục</th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="{{$key}}" data-response="1_0_1">
                            <?php
                            $School = $Records->filter(function ($item) {
                                return $item->getRole() == "School";
                            });
                            ?>
                            @if(!$School->count())
                                <tr class="no-record">
                                    <td colspan="5">
                                        <div style="text-align: center;">There are no records to display</div>
                                    </td>
                                </tr>
                            @else
                                <?php $i = 0;?>
                                @foreach ($School as $Record)
                                    <?php $r_id = $Record->id; ?>
                                    <tr id="{{$r_id}}">
                                        <td>{{++$i}}</td>


                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getyear($Record->Date)}}</span>
                                            <input name="Year" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getyear($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{getMonth($Record->Date)}}</span>
                                            <input name="Month" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;"
                                                   value="{{getMonth($Record->Date)}}">
                                        </td>
                                        <td editable="Record">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->Content}}</span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="Content"
                                                   value="{{$Record->Content}}">
                                        </td>
                                        <td class="last">
                                            <input class="float_right plus-button" type="button" name="delete"
                                                   value="Xoá"/>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                            <?php $r_id = $key;?>
                            <tfoot>

                            <tr>
                                <td colspan="5" style="height:45px;">
                                    <input class="plus-button float_right" type="button" name="increase"
                                           value="+ Thêm"/>
                                </td>
                            </tr>
                            <tr class="first last odd" newrow="true" id="{{$r_id}}" data-react="1_0_1"
                                style="display:none;">
                                <td></td>
                                <td>
                                    <input name="Year" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input name="Month" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input type="text" id="cell_input_{{$r_id}}" style="height: 25px;"
                                           name="Content">
                                </td>
                                <td class="last">
                                    <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
                                </td>
                            </tr>

                            </tfoot>
                        </table>

                    </div><!-- End table reload-->

                </li>
            </ul>
            <label slide-header=true class="slide-header"> II. Thông tin tuyển dụng</label>
            <ul slide-toggle=true>
                @include('xCV.CVedit2')
            </ul>
            <label slide-header=true>
                <div class="slide-header"> III. Kĩ năng ứng viên*</div>
            </label>
            <ul slide-toggle=true>

                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="">Giới thiệu bản thân</label>
                        <div class="input">
                            <label class="icon-left" for="">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Self_intro"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Self_intro }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Self_intro_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table table-reload" id="2_0"
                               style="width: 90%;"> <!-- id  =  skill + language -->
                            <thead>
                            <tr class="">
                                <th colspan="5">Skill**</th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Thời gian học </th>
                                <th style="width:13%;">Thời gian làm việc   </th>
                                <th>Tên ngôn ngữ </th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="{{$key}}" data-response="2_0_1">
                            <?php
                            $Lang = $skills->filter(function ($item) {
                                return $item->getRole() == "Language";
                            });
                            ?>
                            @if(!$Lang->count())
                                <tr class="no-record">
                                    <td colspan="5">
                                        <div style="text-align: center;">There are no records to display</div>
                                    </td>
                                </tr>
                            @else
                                <?php $i = 0;?>
                                @foreach ($Lang as $Record)
                                    <?php $r_id = $Record->id; ?>
                                    <tr id="{{$r_id}}">
                                        <td>{{++$i}}</td>
                                        <td editable="Skill">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->study_time}} tháng </span>
                                            <input name="" class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="study_time"
                                                   value=" {{$Record->study_time}}">
                                        </td>
                                        <td editable="Skill">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->work_time}} tháng </span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="work_time"
                                                   value="{{$Record->work_time}}">
                                        </td>
                                        <td editable="Skill">
                                            <span class="jShow" id="cell_{{$r_id}}">{{$Record->name}}</span>
                                            <input class="editbox" id="cell_input_{{$r_id}}"
                                                   style="display:none;height: 25px;" name="name"
                                                   value="{{$Record->name}}">
                                        </td>
                                        <td class="last">
                                            <input class="float_right plus-button" type="button" name="delete"
                                                   value="Xoá"/>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                            <?php $r_id = $key;?>
                            <tfoot>

                            <tr>
                                <td colspan="5" style="height:45px;">
                                    <input class="plus-button float_right" type="button" name="increase"
                                           value="+ Thêm"/>
                                </td>
                            </tr>
                            <tr class="first last odd" newrow="true" id="{{$r_id}}" data-react="1_0_1"
                                style="display:none;">
                                <td></td>
                                <td>
                                    <input name="Year" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input name="Month" type="text" id="cell_input_{{$r_id}}"
                                           style="height: 25px;">
                                </td>
                                <td>
                                    <input type="text" id="cell_input_{{$r_id}}" style="height: 25px;"
                                           name="Content">
                                </td>
                                <td class="last">
                                    <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
                                </td>
                            </tr>

                            </tfoot>
                        </table>

                    </div><!-- End table reload-->

                </li>
            </ul>

        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop