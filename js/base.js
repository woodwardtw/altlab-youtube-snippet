function onYouTubeIframeAPIReady() {
    var theVideo = document.getElementById("youtube-player"); //change this to look for div class then pull ID via data parameter 
    var player = new YT.Player('youtube-player', {
        height: theVideo.dataset.height,
        width: theVideo.dataset.width,
        playerVars: {rel: 0},//turn of similar videos 
        events: {
            'onReady': function(e) {
                e.target.cueVideoById({
                    videoId: theVideo.dataset.video,
                    startSeconds: theVideo.dataset.startseconds,
                    endSeconds: theVideo.dataset.endseconds
                });
            }
        }
    });
}