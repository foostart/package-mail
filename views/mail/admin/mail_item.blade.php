
@if( ! $mails->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('mail::mail_admin.order') }}</td>
            <th style='width:10%'>Mail ID</th>
            <th style='width:50%'>Mail title</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.operations') }}</th>
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
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $mail->mail_id !!}</td>
            <td>{!! $mail->mail_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_mail.edit', ['id' => $mail->mail_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_mail.delete',['id' =>  $mail->mail_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
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