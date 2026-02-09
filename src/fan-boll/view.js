document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.fan-poll-container');
    
    // Check if they already voted
    if (document.cookie.split('; ').find(row => row.startsWith('voted_ucl='))) {
        showResults(container);
    }

    document.querySelectorAll('.poll-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Set cookie for 24 hours
            document.cookie = "voted_ucl=true; max-age=" + 24*60*60 + "; path=/";
            showResults(container);
        });
    });
});

function showResults(container) {
    container.querySelector('.poll-options').style.opacity = '0.6';
    container.querySelector('.poll-options').style.pointerEvents = 'none';
    container.querySelector('h3').innerText = "Thanks for voting!";
}