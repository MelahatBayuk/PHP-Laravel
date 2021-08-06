@extends('admin/template')
@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Çeviri Ekle</h5>
                </div>

                <div class="widget-content nopadding">
                {!! Form::open(['route'=>'ceviri.store','method'=>'POST','class'=>'form-horizontal'])!!}

                    <div class="control-group">
                        <label class="control-label">Kelime Grubu</label>
                        <div class="controls">
                            <input type="text" class="span11" name="group" required />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Kelime </label>
                        <div class="controls">
                            <input type="text" class="span11" name="key" required />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Türkçe Çeviri </label>
                        <div class="controls">
                            <input type="text" class="span11" name="tr" required />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">İngilizce Çeviri </label>
                        <div class="controls">
                            <input type="text" class="span11" name="en" required />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Ekle </button>
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
@endsection