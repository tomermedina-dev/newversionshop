<!-- <title>Generated QR - {{$valueToGenerate}}</title> -->
<a title="Click to view on fullscreen" target="_blank" href="/admin/qr/generate/{{$valueToGenerate}}">
  <div class="nv-generator-container" style="margin:auto;position: absolute;left: 25%;">
    <?php
      $valueToGenerate = str_replace('-', '/',$valueToGenerate);
     ?>
    {!! QrCode::size(950)->generate($valueToGenerate); !!}
  </div>
</a>
