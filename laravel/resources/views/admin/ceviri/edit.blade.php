@extends('admin/template')
@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Kelime Düzenle: {{$kelime->key}}</h5>
                </div>

                <div class="widget-content nopadding">
                 {!! Form::model($kelime,(['route'=>['ceviri.update',$kelime->id],'method'=>'PUT','class'=>'form-horizontal'])) !!}
                    <div class="control-group">
                        <label class="control-label">Kelime Grubu</label>
                        <div class="controls">
                            <input type="text" class="span11" name="group" required value="{{$kelime->group}}" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kelime </label>
                        <div class="controls">
                            <input type="text" class="span11" name="key" required value="{{$kelime->key}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Türkçe Çeviri </label>
                        <div class="controls">
                            <input type="text" class="span11" name="tr" required value="{{$turkce}}" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">İngilizce Çeviri </label>
                        <div class="controls">
                            <input type="text" class="span11" name="en" required value="{{$ingilizce}}" />
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Çeviri Güncelle</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>

    </div>

@endsection

@section('css')

@endsection

@section('js')
    <script src="/admin/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>