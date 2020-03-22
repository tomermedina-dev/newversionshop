<title>Generated QR - {{$valueToGenerate}}</title>
{!! QrCode::size(250)->generate($valueToGenerate); !!}
