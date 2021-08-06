@extends('admin/template')
@section('icerik')

    <div class="row-fluid" xmlns="http://www.w3.org/1999/html">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Site Ayarları</h5>
                </div>
                <div class="widget-content nopadding">
                   {!! Form::model($ayarlar,['route'=>['ayarlar.update',1],'method'=>'PUT','files'=>'true','class'=>'form-horizontal'])!!}
                        <div class="control-group">
                            <label class="control-label">Site Başlık</label>
                            <div class="controls">
                                <input type="text" class="span11" name="baslik" value="{{$ayarlar->baslik}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Site Açıklama </label>
                            <div class="controls">
                                <input type="text" class="span11"  name="aciklama" value="{{$ayarlar->aciklama}}" />
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Hakkımızda Kısa Açıklama</label>
                        <div class="controls">
                            <textarea class="span11"  name="hakkimizda" rows="5" />{{$ayarlar->hakkimizda}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Adres</label>
                        <div class="controls">
                            <textarea class="span11"  name="adres" rows="5" />{{$ayarlar->adres}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Telefon</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="telefon"  value="{{$ayarlar->telefon}}" />
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">E-Mail Adresi</label>
                            <div class="controls">
                                <input type="text"  class="span11" name="email"  value="{{$ayarlar->email}}" />
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="facebook"  value="{{$ayarlar->facebook}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="twitter"  value="{{$ayarlar->twitter}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Instagram</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="instagram"  value="{{$ayarlar->instagram}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Pinterest</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="pinterest"  value="{{$ayarlar->pinteres}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Google +</label>
                        <div class="controls">
                            <input type="text"  class="span11" name="google"  value="{{$ayarlar->google}}" />
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">Site Logo</label>
                            <div class="controls">
                                <input type="file"  name="logo" class="span11"  />
                            </div>
                        </div>
                     <div class="form-actions">
                            <button type="submit" class="btn btn-success">Güncelle</button>
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

@endsection