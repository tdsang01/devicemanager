<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Họ tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'readonly']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mật khẩu:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'type'=>'password']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Số điện thoại:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Chức vụ:') !!}
    <select name="role" class="form-control">
        @foreach($roles as $role)
        <option @if(($role->id) === ($members->roles->id)) selected @endif value="{!! $role->id !!}">{!! $role->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Sửa', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('members.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
