$(document).ready(function () {
  var envelope = $("#envelope");
  var btn_open = $("#open");
  var btn_reset = $("#reset");
  var audio = new Audio("love.mp3"); // Replace with your audio file

  envelope.click(function () {
    open();
  });
  btn_open.click(function () {
    open();
  });
  btn_reset.click(function () {
    close();
  });

  function open() {
    envelope.addClass("open").removeClass("close");
    audio.play(); // Play the song
  }
  function close() {
    envelope.addClass("close").removeClass("open");
    audio.pause(); // Pause the song
    audio.currentTime = 0; // Reset song to start
  }
});
