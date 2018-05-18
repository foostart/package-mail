<!-- mail NAME -->
<div class="form-group">
    <?php $mail_name = $request->get('mail_titlename') ? $request->get('mail_name') : @$mail->mail_name ?>
    <?php $mail_content = $request->get('mail_content') ? $request->get('mail_content') : @$mail->mail_content ?>
    {!! Form::label($name, trans('mail::mail_admin.name').':') !!}
    {!! Form::text($name, $mail_name, ['class' => 'form-control', 'placeholder' => trans('mail::mail_admin.name').'']) !!}
    {!! Form::label($content,trans('mail::mail_admin.content').':') !!}
    {!! Form::textarea($content,$mail_content,
    ['class' => 'form-control', 'placeholder' => trans('mail::mail_admin.add_content').'']) !!}
    
</div>
<!-- /mail NAME -->