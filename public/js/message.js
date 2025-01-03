// Connect to the Socket.IO server
const socket = io('http://localhost:3000');


document.getElementById('messageForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    let message = document.getElementById('reponse').value;
    let user_id = document.getElementById('user_id').value;
    let contentieu_id = document.getElementById('contentieu_id').value;
    //alert(contentieu_id)
    // Emit the 'new_message' event to the Socket.IO server with the message
    socket.emit('new_message', { user_id, contentieu_id ,message });

    // Clear input field after sending message
    document.getElementById('reponse').value = '';
   
});

// Listen for incoming messages from the server
socket.on('new_message', (data) => {
    //alert('Received message:', data);
    var chatDiv = document.getElementById('msg');
    // Assuming 'chatDiv' is the container for displaying messages
    console.log(data)
    const currentUserId = document.getElementById('user_id').value;
    
    const caidp = document.getElementById('caidp_id').value;
    if(currentUserId==data.user_id){
        const messageBubble = document.createElement('div');
    messageBubble.classList.add('message-bubble', 'sender');
    messageBubble.textContent = data.message;

    const spanLabel = document.createElement('span');
    spanLabel.classList.add('label1');
    spanLabel.textContent = 'Vous';

    messageBubble.appendChild(spanLabel);
    chatDiv.appendChild(messageBubble);
    }else{
        const messageBubble = document.createElement('div');
    messageBubble.classList.add('message-bubble', 'receiver');
    messageBubble.textContent = data.message;

    const spanLabel = document.createElement('span');
    spanLabel.classList.add('label1');
    if(caidp==1){
        spanLabel.textContent = 'Organisme'; 
    }else{
        spanLabel.textContent = 'Caidp';
    }
    

    messageBubble.appendChild(spanLabel);
    chatDiv.appendChild(messageBubble);
    }
    

    // Create a message element
    

    // Scroll to the bottom of the chat container to show the latest message
    chatDiv.scrollTop = chatDiv.scrollHeight;
    chatDiv.animate({scrollTop: scroll.scrollHeight});
    console.log(chatDiv);
});

