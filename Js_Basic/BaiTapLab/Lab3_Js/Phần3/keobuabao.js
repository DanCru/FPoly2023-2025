var arr = ['Kéo', 'Búa', 'Bao'];
    
    document.getElementById('rock').addEventListener('click', function() {
        playGame(0);
    });
    
    document.getElementById('paper').addEventListener('click', function() {
        playGame(1);
    });
    
    document.getElementById('scissors').addEventListener('click', function() {
        playGame(2);
    });
    
    function playGame(x) {
        var s = Math.floor(Math.random() * 3);
        var clientChoice = arr[x];
        var serverChoice = arr[s];
        
        var resultText = '';
        
        if (clientChoice === serverChoice) {
            resultText = 'Equal';
        } else if ((clientChoice === 'Búa' && serverChoice === 'Kéo') ||
                   (clientChoice === 'Bao' && serverChoice === 'Búa') ||
                   (clientChoice === 'Kéo' && serverChoice === 'Bao')) {
            resultText = 'You Win!';
            alert("Chúc mừng")
        } else {
            resultText = 'You Lose!';
        }
        
        document.getElementById('result').innerText = `Bạn: ${clientChoice}  | Hệ thống: ${serverChoice}
        
         Kết quả: ${resultText}`;
    }