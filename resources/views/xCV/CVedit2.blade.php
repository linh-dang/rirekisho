<li>
    <div>
        <table class="table table-striped table-bordered editable-table table-reload" id="1_1"
               style="width: 90%;">
            <thead>
            <tr class="">
                <th colspan="5">Lịch sử công việc</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th>Tên nơi làm việc</th>
                <th style="width:7%;">&nbsp;</th>
            </tr>
            </thead>
            <tbody id="{{$key}}" data-response="1_1_1">
            <?php
            $Work = $Records->filter(function ($item) {
                return $item->getRole() == "Work";
            });
            ?>
            @if(!$Work->count())
                <tr class="no-record">
                    <td colspan="5">
                        <div style="text-align: center;">There are no records to display</div>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($Work as $Record)
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
            <tfoot>
            <?php $r_id = $key;?>
            <tr>
                <td colspan="5" style="height:45px;">
                    <input class="plus-button float_right" type="button" name="increase"
                           value="+ Thêm"/>
                </td>
            </tr>
            <tr class="first last odd" id="{{$r_id}}" data-react="1_1_1"
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
    <div class="warning" id="">

    </div>
</li>
<li>
    <div>
        <table class="table table-striped table-bordered editable-table table-reload" id="1_2"
               style="width: 90%;">
            <thead>
            <tr class="">
                <th colspan="5">Thông tin bằng cấp</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th> Tên bằng cấp</th>
                <th style="width:7%;">&nbsp;</th>
            </tr>
            </thead>
            <tbody id="{{$key}}" data-response="1_2_1">
            <?php
            $Cert = $Records->filter(function ($item) {
                return $item->getRole() == "Cert";
            });
            ?>
            @if(!$Cert->count())
                <tr class="no-record">
                    <td colspan="5">
                        <div style="text-align: center;">There are no records to display</div>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($Cert as $Record)
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


            <tfoot>
            <?php $r_id = $key;?>
            <tr>
                <td colspan="5" style="height:45px;">
                    <input class="plus-button float_right" type="button" name="increase"
                           value="+ Thêm"/>
                </td>
            </tr>
            <tr class="first last odd" id="{{$r_id}}" data-react="1_2_1"
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
    <div class="warning" id="">

    </div>
</li>
<li class="">
    <div class=" float_left" style="width: 100%;">
        <label class="label" for="positions">Vị trí ứng tuyển</label>
        <div class="input">
            <label class="icon-left" for="positions">
                <i class="fa fa-mail-forward "></i>
            </label>
            <!--change editable="Rirekisho" name=field_name  -->
            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="positions"
                   type="text" class="input-left float_left" placeholder="some text"
                   value="{{ $CV->positions }}">
            <!-- s_field_name_$key-->
            <div class="success-status float_left" id="s_positions_{{$key}}" style="display:none;">
                <i class="fa fa-pencil-square-o"></i>
            </div>
        </div>
    </div>
</li>
<li class="">
    <div class=" float_left" style="width: 100%;">
        <label class="label" for="Request">Lời nhắn đến nhà tuyển dụng</label>
        <div class="input">
            <label class="icon-left" for="Request">
                <i class="fa fa-mail-forward "></i>
            </label>
            <!--change editable="Rirekisho" name=field_name  -->
            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Request"
                   type="text" class="input-left float_left" placeholder="some text"
                   value=" {{ $CV->Request }}">
            <!-- s_field_name_$key-->
            <div class="success-status float_left" id="s_Request_{{$key}}" style="display:none;">
                <i class="fa fa-pencil-square-o"></i>
            </div>
        </div>
    </div>

</li>