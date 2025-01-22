<style>

#user_id{
  display:none;
}
#contentieu_id{
  display:none;
}
#msg{
  height: 200px; /* Set the height of the div */
  overflow-y: auto;
  overflow-x: scroll;
  scroll-behavior: smooth;
  width: 100%;
}

.message-bubble {
  max-width: 100%;
  min-width: 50%;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 10px;
  clear: both;
  overflow-wrap: break-word;
  position: relative;
  
}

.sender {
  float: right;
  
  background-color: #dcf8c6;
}

.receiver {
  float: left;
  
  background-color: #e2e2e2;
}

.label1 {
  position: absolute;
  bottom: 0px;
  right: 5px;
  font-size: 10px;
  color:red;
  background-color: white;
}
.label2 {
  position: absolute;
  top: -15px;
  left: 5px;
  font-size: 10px;
  color:black;
  width: 100%;
  
}
#caidp_id{
  display: none;
}
</style>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
<table class="table table-striped contentieuTable display">
    <thead>
        <tr>
            <th style="display:none">contentieu_id</th>
            <th>Date</th>
            <th>Action</th>
            <th>Contenu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if($Saisine && $Saisine->contentieu)
        @foreach($Saisine->contentieu as $value)
        <tr>
            <td class="td_idContentieux" style="display:none">{{ $value->id }}</td>
            <td class="td_dateContentieux">{{ $value->dateContentieux }}</td>
            <td class="td_actionContentieu">{{ $value->actionContentieu }}</td>
            <td class="td_argument">
                {!! $value->argument !!}
                @if($value->doccontentieu)
                    <ul class="iframeData">
                    @foreach($value->doccontentieu as $val)
                        <a href="{{ asset('/docContentieu/' .$val->document) }}" class="fichier" target="_blank">{{$val->document}}</a><br>
                    @endforeach
                    </ul>
                @endif
            </td>
            <th> 
                <a href="#" class="editContentieu" id="{{ $value->id }}"> <i class="fa fa-edit"></i></a>
                <a href="#" class="supContentieu" id="{{ $value->id }}"> <i class="fa fa-trash text-danger"></i></a> 
                @if($messages)
                <a href="#" class="msgContentieu" id="{{ $value->id }}" data-toggle="modal" data-target="#exampleModal" onclick="openModal1({{ $value }},{{ $messages }},{{ auth()->id() }})" style="display: none;"> <i class="fa fa-envelope text-success"></i></a> 
                @endif
            </th>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div  class="text-center addArgumentBtn {{ !$Saisine ? "hide" : "" }} "><a class="btn btn-info btn-lg" href="#" title="Ajouter un argumenten réplique"><i class="material-icons">note_add</i> Ajouter une action</a></div>
<script>
  
  function openModal1(contentieu, messages, id) {
  var txt = '';
  for (let i = 0; i < messages.length; i++) {
    if (messages[i].contentieu_id == contentieu.id) {
      if (messages[i].user_id == id) {
        txt += '<div class="message-bubble sender">';
        txt += '<span class="label2">' + messages[i].created_at + '</span>';
        txt += messages[i].message;
        txt += '<br><span class="label1">Vous</span></div>';
      } else {
        txt += '<div class="message-bubble receiver">';
        txt += '<span class="label2">' + messages[i].created_at + '</span>';
        txt += messages[i].message;
        txt += '<br><span class="label1">Organisme</span></div>';
      }
    }
  }

  // Set the innerHTML of 'chat' element after the loop
  var chat = document.getElementById("chat");
  chat.innerHTML = txt;
  var user_id = document.getElementById("user_id");
  user_id.value=id
  var contentieu_id= document.getElementById("contentieu_id");
  contentieu_id.value=contentieu.id
}

</script>

