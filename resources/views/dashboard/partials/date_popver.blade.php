<i class="fa fa-clock-o"></i>
{{ago($object->created_at)}}
<b class="text-danger">-</b>
<span dir="ltr" class="calibri"> {{$object->created_at ? $object->created_at->format('H:i') : ''}} </span>
<b class="text-danger">-</b>
<span dir="ltr" class="calibri"> {{date_picker_date($object->created_at, '-')}} </span>
