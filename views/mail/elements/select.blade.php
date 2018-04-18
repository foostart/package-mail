<!-- CATEGORY LIST -->
<div class="form-group">
    <?php $mail_name = $request->get('mail_titlename') ? $request->get('mail_name') : @$mail->mail_name ?>

    {!! Form::label('category_id', trans('mail::mail_admin.mail_categoty_name').':') !!}
    {!! Form::select('category_id', @$categories, @$mail->category_id, ['class' => 'form-control']) !!}
</div>
<!-- /CATEGORY LIST -->