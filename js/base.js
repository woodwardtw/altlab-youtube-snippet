
if(window.attachEvent) {
    window.attachEvent('onload', getVids());
} else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function(evt) {
            curronload(evt);
            getVids(evt);
        };
        window.onload = newonload;
    } else {
        window.onload = getVids;
    }
}


function getVids (){
  vids = document.getElementsByClassName('yt-video');
  console.log(vids);
  for (i = 0; i < vids.length; i++){
  onYouTubeIframeAPIReadyClass(vids[i]);
  }
}


function onYouTubeIframeAPIReadyClass(theVideo) {
    var theId = theVideo.id; //change this to look for div class then pull ID via data parameter 
    var player = new YT.Player(theId, {
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