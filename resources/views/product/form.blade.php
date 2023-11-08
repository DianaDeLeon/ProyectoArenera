<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripción') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Unidad de Medida') }}
            {{ Form::text('unit_of_measurement', $product->unit_of_measurement, ['class' => 'form-control' . ($errors->has('unit_of_measurement') ? ' is-invalid' : ''), 'placeholder' => 'Unidad de Medida']) }}
            {!! $errors->first('unit_of_measurement', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if ($task == "create")
        <div class="form-group">
            {{ Form::label('image', 'Imagen del producto:', ['class' => 'form-label']) }}
            <div class="input-group">
                <div class="">
                    <span class="input-group-text">Seleccionar archivos</span>
                </div>
                {{ Form::file('image', $product->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '')]) }}
                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        @endif

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>