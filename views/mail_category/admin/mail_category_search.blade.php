
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('mail::mail_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_mail_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('mail_category_name',trans('mail::mail_admin.mail_category_name_label')) !!}
            {!! Form::text('mail_category_name', @$params['mail_category_name'], ['class' => 'form-control', 'placeholder' => trans('mail::mail_admin.mail_category_name')]) !!}
        </div>

        {!! Form::submit(trans('mail::mail_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




