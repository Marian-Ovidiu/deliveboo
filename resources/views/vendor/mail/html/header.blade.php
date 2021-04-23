<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src={{ asset('images/00_logo.jpg') }} class="logo" alt="Deliveboo Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
