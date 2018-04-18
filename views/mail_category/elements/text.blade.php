<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $mail_category_name = $request->get('mail_titlename') ? $request->get('mail_name') : @$mail->mail_category_name ?>
    {!! Form::label($name, trans('mail::mail_admin.name').':') !!}
    {!! Form::text($name, $mail_category_name, ['class' => 'form-control', 'placeholder' => trans('mail::mail_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->