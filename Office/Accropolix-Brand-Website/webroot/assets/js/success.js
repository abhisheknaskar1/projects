const tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '400px', // Adjust the height as needed
        width: '500', // Adjust the width as needed
        videoId: 'Dn0PWPyT4BQ',
        playerVars: {
            'autoplay': 1,
            'controls': 0,
            'loop': 1,
            'mute': 1, // Start with the video muted
            'playlist': 'Dn0PWPyT4BQ', // Loop video
            'enablejsapi': 1,
            'modestbranding': 1, // Hide YouTube logo and title
            'rel': 0,
            'showinfo': 0
        },
        events: {
            'onReady': onPlayerReady
        }
    });
}
 
function onPlayerReady(event) {
    document.getElementById('mute-toggle').addEventListener('click', function () {
        if (player.isMuted()) {
            player.unMute();
            document.getElementById('mute-toggle').textContent = 'Mute';
        } else {
            player.mute();
            document.getElementById('mute-toggle').textContent = 'Unmute';
        }
    });
}