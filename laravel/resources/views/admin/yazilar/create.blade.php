@extends('admin/template')
@section('icerik')

    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>İçerik Ekle</h5>
                </div>

                <div class="widget-content nopadding">
                    {!! Form::open(['route'=>'yazilar.store','method'=>'POST','class'=>'form-horizontal','files'=>'true'])!!} <!--dosya işlemine iizin vermek için file kullanıldı-->
                    <div class="control-group">
                        <label class="control-label"> Kategori Seçin</label>
                        <div class="controls">
                            <select name="kategori" class="span11">

                                <option value="" selected> Kategori Seçin</option>
                              @foreach($kategoriler as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->baslik}}</option>
                                      @endforeach



                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">İçerik Başlık</label>
                        <div class="controls">
                            <input type="text" class="span11" name="baslik"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">İçerik Açıklama </label>
                        <div class="controls">
                            <textarea name="icerik" class="span11"></textarea>
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">Slider İçinde Göster</label>
                            <div class="controls">
                                <select name="slider" class="span11">

                                    <option value="goster">Goster</option>
                                    <option value="gosterme">Gosterme</option>
                                </select>
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">İçerik Resmi</label>
                        <div class="controls">
                            <input type="file" class="span11" name="resim"  />
                        </div>
                    </div>
                        <div class="control-group">
                            <label class="control-label">İçerik Video</label>
                            <div class="controls">
                                <textarea name="video" class="span11"></textarea>
                            </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">İçerik Ekle </button>
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