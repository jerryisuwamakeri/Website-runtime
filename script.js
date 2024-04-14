document.getElementById('urlForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var url = document.getElementById('urlInput').value;
    
    fetch('/api/check_url.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ url: url })
    })
    .then(response => response.json())
    .then(data => {
        var resultDiv = document.getElementById('result');
        resultDiv.innerHTML = data.message;
        if (data.status === 'success') {
            resultDiv.style.color = 'green';
        } else {
            resultDiv.style.color = 'red';
        }
    })
    .catch(error => console.error('Error:', error));
});
