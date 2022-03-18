<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{-- <title>{{ optional($order->user)->name }}</title> --}}

<style type="text/css">
  * {
      font-family: Verdana, Arial, sans-serif;
  }
  table{
      font-size: medium;
  }
  tfoot tr td{
      font-weight: bold;
      font-size: medium;
  }
  .gray {
      background-color: lightgray
  }
  h1 {
    font-size: 95px;
  }
  h2 {
    font-size: 30px;
  }
</style>

</head>
  <body style="margin-top: 135px;">
      <table width="100%">
        {{-- @if($product->code) --}}
{{--           <tr>
              <td align="center">
                  <img src="data:image/png;base64, {{ base64_encode(\QrCode::format('svg')->size(140)->generate(route('frontend.track.show', $product->code_label))) }} "/>
              </td>
          </tr>
 --}}       {{-- @endif --}}
        <tr>
          <td align="center">
            <h2>
{{ $product->parent->name }}
            </h2>
          </td>
        </tr>
        <tr>
          <td align="center">
            <h2>
{{ $product->color_id ? $product->color->name : '' }}
            </h2>
          </td>
        </tr>
        <tr>
          <td align="center">
            <h2>
{!! $product->size_id ? $product->size->name : '' !!}
            </h2>
          </td>
        </tr>

      </table>

    @for ($i = 0; $i < 4; $i++)
      <table width="100%">
        <tr>
          <td align="center">
            <strong>
              <h1>{{ optional($product->size)->name }}</h1>
            </strong>
          </td>
        </tr>
      </table>
    @endfor 
  </body>
</html>