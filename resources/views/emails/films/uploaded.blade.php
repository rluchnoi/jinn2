<x-mail::message>
# Film Uploaded
 
Your Film "{{$filmName}}" has been uploaded!
 
<x-mail::button :url="$url">
View Film
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>