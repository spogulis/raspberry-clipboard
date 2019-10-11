export function copyMessage() {
    
    let message = $('#latestMessage').text();
    const input = document.createElement('input');
    document.body.appendChild(input);
    input.value = message;

    input.focus();
    input.select();

    const isSuccessful = document.execCommand('copy');
    if (!isSuccessful) {
        console.error('Failed to copy text.');
    }

    input.remove();
}

window.copyMessage = copyMessage;