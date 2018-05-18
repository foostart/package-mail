<!--ADD MAIL-->
<!--<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_mail.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('mail::mail_admin.mail_add_button')}}
        </a>
    </div>
</div>-->
<!--/END ADD MAIL-->

@if( ! $mails->isEmpty() )
<table class="table table-hover" id="tbEmail">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('mail::mail_admin.order') }}</td>
            <th style='width:10%'>{{ trans('mail::mail_admin.mail_id') }}</th>
            <th style='width:50%'>{{ trans('mail::mail_admin.mail_name') }}</th>
            <th style='width:20%'>
                <span class='lb-delete-all'>
                    {{ trans('mail::mail_admin.operations') }}
                </span>
                <div class="coldelete" style="display: none;">
                    {!! Form::submit(trans('mail::mail_admin.delete'), array("class"=>"btn btn-danger pull-right delete btn-delete-all del-trash", 'name'=>'del-trash')) !!}
                    {!! Form::submit(trans('mail::mail_admin.delete'), array("class"=>"btn btn-warning pull-right delete btn-delete-all del-forever", 'name'=>'del-forever')) !!}
                </div>
            </th>
            <!--DELETE-->
            <th style='width:5%'>
                <span class="del-checkbox pull-right">
                    <input type="checkbox" id="selecctall" onchange="CheckedAllCheckBox()" />
                    <label for="del-checkbox"></label>
                </span>
            </th>


        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $mails->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($mails as $mail)
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td>{!! $mail->mail_id !!}</td>
            <td>{!! $mail->mail_name !!}</td>
            <td>
                <!-- EDIT BUTTON -->
                <a href="{!! URL::route('admin_mail.edit', ['id' => $mail->mail_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <!-- /END EDIT BUTTON -->

                <!-- DELETE BUTTON -->
                <a href="{!! URL::route('admin_mail.delete',['id' =>  $mail->mail_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <!-- /END DELETE BUTTON -->

                <!-- SEND MAIL BUTTON -->
                @if(!!empty($mail->mail_confirm))
                <a href="{!! URL::route('admin_mail.mail_prepare',['id' =>  $mail->mail_id, '_token' => csrf_token()]) !!}" class="margin-left-5 mailPrepare"><i class="fa fa-paper-plane fa-2x"></i></a>
                @endif
                <!-- /END SEND MAIL BUTTON -->

                <!--DELETE-->
            <td>
                <span class='box-item pull-right'>
                    <input type="checkbox" id="<?php echo $mail->mail_id ?>" name="ids[]" onchange="checkedCheckBox()" value="{!! $mail->mail_id !!} ">
                    <label for="box-item"></label>
                </span>
            </td>
    <span class="clearfix"></span>
</td>

</tr>
@endforeach
</tbody>
</table>
@else
<span class="text-warning">
    <h5>
        {{ trans('mail::mail_admin.message_find_failed') }}
    </h5>
</span>
@endif
<div class="paginator">
    {!! $mails->appends($request->except(['page']) )->render() !!}
</div>
<script>
    function CheckedAllCheckBox() {
        var checkboxes = $('#tbEmail').find(':checkbox');
        var isCheckedAll = $("#selecctall:checked").length;
        if (isCheckedAll) {
            $(".coldelete").show();
        } else {
            $(".coldelete").hide();
        }
        for (var i = 1; i < checkboxes.length; i++) {
            checkboxes[i].checked = isCheckedAll;
        }
    }
    function checkedCheckBox() {
        var check = $("input[name='ids[]']:checked").length;
        if (check) {
            $(".coldelete").show();
        } else {
            $(".coldelete").hide();
        }
    }
</script>